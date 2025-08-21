<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    
    public function watchlist()
    {
        $animes = Watchlist::paginate(10);

        return view('index', ['animes' => $animes]);
    }

}
