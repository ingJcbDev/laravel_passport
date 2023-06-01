<?php

use Illuminate\Database\Seeder;
// Fachada DB
use Illuminate\Support\Facades\DB;
// Modelo del Post
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
        [
            [
                'title' => 'Titulo 1',
                'content' => 'Test content oooo ooooo ',
                'color' => 'rojo',
                'phone' => '3117039516',
                'author' => 'jonier',
                'author_age' => 31
            ],
            [
                'title' => 'Titulo 2',
                'content' => 'Test content oooo ooooo 2',
                'color' => 'rojo 2',
                'phone' => '3117039516',
                'author' => 'jonier2',
                'author_age' => 32
            ],
            [
                'title' => 'Titulo 3',
                'content' => 'Test content oooo ooooo 3',
                'color' => 'rojo 3',
                'phone' => '3117039516',
                'author' => 'jonier3',
                'author_age' => 33
            ],
        ];
        DB::table('posts')->insert($data);
    }
}
