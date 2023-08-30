<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Post;

class PostGenre extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
    // public function posts()
    // {
    //     return $this->belongsToMany(Post::class, 'post_genre', 'genre_id', 'post_id');
    // }

    // public function genres()
    // {
    //     return $this->belongsToMany(Genre::class, 'post_genre', 'post_id', 'genre_id');
    // }
