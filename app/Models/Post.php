<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Genre;
use App\Models\PostGenre;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use Sortable;


    /**
     * fillable
     *
     * @var array
     */
    // protected $fillable = ['image', 'title', 'slug', 'desc', 'time', 'genre'];


    public $sortable = [
        'id','title','time',
    ];

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true

            ]
        ];
    }
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($post) {
            $post->slug = SlugService::createSlug($post, 'slug', $post->title);
        });
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function genres():BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'post_genres','post_id','genre_id');
    }

}
