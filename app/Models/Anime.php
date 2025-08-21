<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    /** @use HasFactory<\Database\Factories\AnimeFactory> */
    use HasFactory;

    protected $fillable = [
        'mal_id', 'title', 'image_url', 'score', 'synopsis', 'episodes', 'type'
    ];

    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }
}
