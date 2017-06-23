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
            'category_id' => 1,
            "views" => 567
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
            'category_id' => 2,
	        'views' => 209
        ]);

        $post2->tags()->sync([1]);

	    $post3 = Post::create([
		    'published' => 1,
		    'locale' => 'fr_FR',
		    'image' => 'yolo.jpg',
		    'title' => 'Article N°3',
		    'content' => 'Contenu article 3',
		    'slug' => 'article-n-3',
		    'summary' => 'Résumé article 3',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 1,
		    "views" => 12
	    ]);

	    $post3->tags()->sync([1, 2]);

	    $post4 = Post::create([
		    'published' => 1,
		    'locale' => 'fr_FR',
		    'image' => 'yolo.jpg',
		    'title' => 'Article N°4',
		    'content' => 'Contenu article 4',
		    'slug' => 'article-n-4',
		    'summary' => 'Résumé article 4',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 1,
		    "views" => 1009
	    ]);

	    $post4->tags()->sync([1, 2]);

	    $post5 = Post::create([
		    'published' => 1,
		    'locale' => 'fr_FR',
		    'image' => 'yolo.jpg',
		    'title' => 'Article N°5',
		    'content' => 'Contenu article 5',
		    'slug' => 'article-n-5',
		    'summary' => 'Résumé article 5',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 1,
		    "views" => 107
	    ]);

	    $post5->tags()->sync([1, 2]);

	    $post6 = Post::create([
		    'published' => 1,
		    'locale' => 'fr_FR',
		    'image' => 'yolo.jpg',
		    'title' => 'Le 4L Trophy partenaire de Yalla!',
		    'content' => '4L Trophy',
		    'slug' => 'trophy-partenaire',
		    'summary' => '4l Trophy est partenaire',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 1,
		    "views" => 457
	    ]);

	    $post6->tags()->sync([1, 2]);

	    $post7 = Post::create([
		    'published' => 1,
		    'locale' => 'fr_FR',
		    'image' => 'yolo.jpg',
		    'title' => 'Evenement fundraising à Paris',
		    'content' => 'Event fundraising',
		    'slug' => 'event-paris',
		    'summary' => 'Résumé event paris fundraising',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 1,
		    "views" => 19
	    ]);

	    $post7->tags()->sync([1, 2]);

	    $post8 = Post::create([
		    'published' => 1,
		    'locale' => 'fr_FR',
		    'image' => 'yolo.jpg',
		    'title' => 'Les enfants à Bamako ont trouvé des dons',
		    'content' => 'Le contenu de l\'article sur les enfants à Bamako',
		    'slug' => 'article-n-8',
		    'summary' => 'Enfants ecole de bamako',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 1,
		    "views" => 988
	    ]);

	    $post8->tags()->sync([1, 2]);
    }
}
