<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    
    // List all the anime in watchlist table
    public function watchlist()
    {
        $watchlist = Watchlist::paginate(10);

        return view('anime.watchlist', ['watchlist' => $watchlist]);
    }

}
