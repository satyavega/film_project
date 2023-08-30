<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;


class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('genres')->insert([

        //     [
        //         'id' => '1',
        //         'name' => 'Action',
        //     ],
        //     [
        //         'id' => '2',
        //         'name' => 'Adventure',
        //     ],
        //     [
        //         'id' => '3',
        //         'name' => 'Comedy',
        //     ],
        //     [
        //         'id' => '4',
        //         'name' => 'Drama',
        //     ],
        //     [
        //         'id' => '5',
        //         'name' => 'Fantasy',
        //     ],
        //     [
        //         'id' => '6',
        //         'name' => 'Romance',
        //     ],
        //     [
        //         'id' => '7',
        //         'name' => 'Slice of Life',
        //     ],
        //     [
        //         'id' => '8',
        //         'name' => 'Mystery',
        //     ],
        //     [
        //         'id' => '9',
        //         'name' => 'Horror',
        //     ],
        //     [
        //         'id' => '10',
        //         'name' => 'c',
        //     ],
        //     [
        //         'id' => '11',
        //         'name' => 'Supernatural',
        //     ],
        //     [
        //         'id' => '12',
        //         'name' => 'Sci-Fi',
        //     ],
        //     [
        //         'id' => '13',
        //         'name' => 'Sports',
        //     ],
        //     [
        //         'id' => '14',
        //         'name' => 'Music',
        //     ],
        //     [
        //         'id' => '15',
        //         'name' => 'Isekai',
        //     ],
        //     [
        //         'id' => '16',
        //         'name' => 'Harem',
        //     ],
        //     [
        //         'id' => '17',
        //         'name' => 'Ecchi',
        //     ],
        //     [
        //         'id' => '18',
        //         'name' => 'Historical',
        //     ],
        //     [
        //         'id' => '19',
        //         'name' => 'Demons',
        //     ],
        //     [
        //         'id' => '20',
        //         'name' => 'Shoujo',
        //     ],
        //     [
        //         'id' => '21',
        //         'name' => 'Shounen',
        //     ],
        //     [
        //         'id' => '22',
        //         'name' => 'Martial Arts',
        //     ],
        //     [
        //         'id' => '23',
        //         'name' => 'Thriller',
        //     ],


        // ]);
        $genres = [
            ['name' => 'Action', 'slug' => 'action'],
            ['name' => 'Adventure', 'slug' => 'adventure'],
            ['name' => 'Comedy', 'slug' => 'comedy'],
            ['name' => 'Drama', 'slug' => 'drama'],
            ['name' => 'Fantasy', 'slug' => 'fantasy'],
            ['name' => 'Romance', 'slug' => 'romance'],
            ['name' => 'Slice of Life', 'slug' => 'slice-of-life'],
            ['name' => 'Mystery', 'slug' => 'mistery'],
            ['name' => 'Supernatural', 'slug' => 'supranatural'],
            ['name' => 'Horror', 'slug' => 'horror'],
            ['name' => 'Psychological', 'slug' => 'psychological'],
            ['name' => 'Sci-Fi', 'slug' => 'sci-fi'],
            ['name' => 'Sports', 'slug' => 'sports'],
            ['name' => 'Music', 'slug' => 'music'],
            ['name' => 'Shounen', 'slug' => 'shounen'],

        ];

        Genre::insert($genres);
    }
}
