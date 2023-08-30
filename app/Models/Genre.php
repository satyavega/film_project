<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\PostGenre;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_genres', 'genre_id', 'post_id');
    }
    protected $guarded = [
        'id',
    ];

}
