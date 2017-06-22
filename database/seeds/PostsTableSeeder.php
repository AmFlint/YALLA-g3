<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post1 = Post::create([
            'published' => 1,
            'locale' => 'fr_FR',
            'image' => 'yolo.jpg',
            'title' => 'Article N°1',
            'content' => 'Contenu article 1',
            'slug' => 'article-n-1',
            'summary' => 'Résumé article 1',
            'card' => 'summary',
            'meta_robots' => 0,
            'category_id' => 1
        ]);

        $post1->tags()->sync([1, 2]);

        $post2 = Post::create([
            'published' => 1,
            'locale' => 'fr_FR',
            'image' => 'test.jpg',
            'title' => 'Article N°2',
            'content' => 'Contenu article 2 test',
            'slug' => 'article-n-2',
            'summary' => 'Résumé article 2',
            'card' => 'summary_large',
            'meta_robots' => 1,
            'category_id' => 2
        ]);

        $post2->tags()->sync([1]);
    }
}
