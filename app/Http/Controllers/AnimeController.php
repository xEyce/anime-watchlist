<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;
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
            'animes' => $allAnimes,
            'genreName' => ''
        ]);

        
    }


    public function fetchTopByGenre(Request $request)
    {
    $genreId = $request->input('genre');
    $request->session()->put('selected_genre', $genreId);

    if (!$genreId) {
        return redirect()->route('index')
            ->with('error', 'Please select a genre.');
    }

    $genreNames = [
        1 => "Action",
        22 => "Romance",
        24 => "Sci-fi"
    ];

    $genreName = $genreNames[$genreId] ?? '';

    $totalPages = 2; // 25 * 4 = 100
    $perPage = 25;
    $allAnimes = [];

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
            return redirect()->route('index')
                ->with('error', 'Failed to fetch anime from Jikan API.');
        }

        $allAnimes = array_merge($allAnimes, $json['data']);

        sleep(1); // prevent API rate limiting
    }

    return view('index', [
            'animes' => $allAnimes,
            'genreName' => $genreName,
            'genreId' => $genreId
        ]);
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

    // Add the selected anime to anime table
    public function addToWatchlist(Request $request)
    {
        $user = Auth::user();

        // Save anime in anime table if not exists
        $anime = Anime::firstOrCreate(
            ['mal_id' => $request->mal_id],
            [
                "title" => $request->title,
                "image_url" => $request->image_url,
                "score" => $request->score,
                "synopsis" => $request->synopsis,
                "episodes" => $request->episodes,
                "type" => $request->type,
            ]
        );

        // Save to this user's watchlist only
        $exists = Watchlist::where('user_id', $user->id)
                        ->where('anime_id', $anime->id)
                        ->exists();

        if (!$exists) {
            Watchlist::create([
                'user_id' => $user->id,
                'anime_id' => $anime->id,
            ]);
        } else{
            return redirect()->back()->with("error", "Already in your watchlist");
        }

        return redirect()->back()->with("success", "Anime added to your watchlist");
    }


    public function removeToWatchlist($id)
    {
        $anime = Anime::findOrFail($id);
        $anime->delete();

        return redirect()->route('anime.watchlist')->with('success', 'Anime Deleted!');
    }

    


}

