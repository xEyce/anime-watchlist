<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    /** @use HasFactory<\Database\Factories\WatchlistFactory> */
    use HasFactory;

    protected $fillable = [
        'anime_id'
    ];

    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
