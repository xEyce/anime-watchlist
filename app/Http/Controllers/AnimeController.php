<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AnimeController extends Controller
{
    //
    public function index()
    {
        
        $totalPages = 2; // 25 * 4 = 100
        $perPage = 25;
        $allAnimes = [];

        for ($page = 1; $page <= $totalPages; $page++) {
            $response = Http::get('https://api.jikan.moe/v4/top/anime', [
                'page' => $page,
                'limit' => $perPage
            ]);

            $json = $response->json();

            if (!isset($json['data'])) {
                return back()->with('error', 'Failed to fetch anime from Jikan API.');
            }

            // Merge results into single array
            $allAnimes = array_merge($allAnimes, $json['data']);

            sleep(1); // avoid hitting API rate limits
        }


        // Pass the array to a Blade view
        return view('index', [
            'animes' => $allAnimes
        ]);

        
    }


    public function fetchTopByGenre($genreId)
{
    // Clear old anime data first
    Anime::truncate();

    $totalPages = 4; // 25 * 4 = 100
    $perPage = 25;

    for ($page = 1; $page <= $totalPages; $page++) {
        $response = Http::get('https://api.jikan.moe/v4/anime', [
            'genres' => $genreId,
            'order_by' => 'score',
            'sort' => 'desc',
            'limit' => $perPage,
            'page' => $page
        ]);

        $json = $response->json();

        if (!isset($json['data'])) {
            Log::error('Jikan API error', $json);
            return redirect()->route('animes.index')
                ->with('error', 'Failed to fetch anime from Jikan API.');
        }

        foreach ($json['data'] as $animeData) {
            Anime::updateOrCreate(
                ['mal_id' => $animeData['mal_id']], // Unique column
                [
                    'title' => $animeData['title'],
                    'synopsis' => $animeData['synopsis'] ?? '',
                    'image_url' => $animeData['images']['jpg']['image_url'] ?? null,
                    'type' => $animeData['type'] ?? null,
                    'episodes' => $animeData['episodes'] ?? null,
                    'score' => $animeData['score'] ?? null,
                ]
            );
        }

        sleep(1); // prevent API rate limiting
    }

    return redirect()->route('animes.index')
        ->with('success', 'Top 100 anime for this genre updated!');
}

    // View Details of selected anime
    public function viewDetails($id)
    {
        // Fetch anime details from Jikan API by MAL ID
        $response = Http::get("https://api.jikan.moe/v4/anime/{$id}");

        if ($response->failed()) {
            abort(404, "Anime not found");
        }

        $anime = $response->json('data'); // The anime details

        return view('anime.view', ['anime' => $anime]);
    }

    // List all anime added to watchlist
    public function watchlist()
    {
        $animes = Anime::paginate(10);

        return view('anime.watchlist', ['animes' => $animes]);
    }

    public function addToWatchlist(Request $request)
    {
        // First check if the anime already exists in database
        $anime = Anime::firstOrCreate(
            ['mal_id' => $request->mal_id], // unique identifier
            [
                "title" => $request->title,
                "image_url" => $request->image_url,
                "score" => $request->score,
                "synopsis" => $request->synopsis,
                "episodes" => $request->episodes,
                "type" => $request->type,
            ]
        );

        // Now save to watchlist (if not already there)
        $exists = Watchlist::where('anime_id', $anime->id)->exists();
        if (!$exists) {
            Watchlist::create([
                'anime_id' => $anime->id,
            ]);
        }

        return redirect()->back()->with("success", "Anime added to watchlist");
    }

    public function removeToWatchlist()
    {

    }

    


}

