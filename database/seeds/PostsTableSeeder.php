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
            'locale' => 'fr',
            'image' => 'nps1.jpg',
            'title' => 'Article N°1',
            'content' => 'Contenu article 1',
            'slug' => 'article-n-1',
            'summary' => 'Résumé article 1',
            'media_id' => 1,
            'card' => 'summary',
            'meta_robots' => 0,
            'category_id' => 1,
            'alt' => 'Yolo image representant alt',
            "view" => 567
        ]);

        $post1->tags()->sync([1, 2]);

        $post1->views()->sync([1, 2]);

        $post2 = Post::create([
            'published' => 1,
            'locale' => 'fr',
            'image' => 'nps2.jpg',
            'title' => 'Article N°2',
            'content' => 'Contenu article 2 test',
            'slug' => 'article-n-2',
            'summary' => 'Résumé article 2',
            'card' => 'summary_large',
            'media_id' => '2',
            'meta_robots' => 1,
            'category_id' => 2,
	        'alt' => 'Yolo image representant alt',
	        'view' => 209
        ]);

        $post2->tags()->sync([1]);

        $post2->views()->sync([3]);

	    $post3 = Post::create([
		    'published' => 1,
		    'locale' => 'fr',
		    'image' => 'nps3.jpg',
		    'title' => 'Article N°3',
		    'content' => 'Contenu article 3',
		    'slug' => 'article-n-3',
		    'summary' => 'Résumé article 3',
		    'card' => 'summary',
		    'alt' => 'Yolo image representant alt',
		    'meta_robots' => 0,
		    'category_id' => 1,
		    "view" => 12
	    ]);

	    $post3->tags()->sync([1, 2]);

	    $post3->views()->sync([4,5]);

	    $post4 = Post::create([
		    'published' => 1,
		    'locale' => 'en',
		    'image' => 'nps4.jpg',
		    'title' => 'Article N°4',
		    'content' => 'Contenu article 4',
		    'slug' => 'article-n-4',
		    'alt' => 'Yolo image representant alt',
		    'summary' => 'Résumé article 4',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 3,
		    "view" => 1009
	    ]);

	    $post4->tags()->sync([4]);

	    $post4->views()->sync([5,6]);

	    $post5 = Post::create([
		    'published' => 1,
		    'locale' => 'en',
		    'image' => 'nps5.jpg',
		    'title' => 'Article N°5',
		    'content' => 'Contenu article 5',
		    'slug' => 'article-n-5',
		    'alt' => 'Yolo image representant alt',
		    'summary' => 'Résumé article 5',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 3,
		    'media_id' => 3,
		    "view" => 107
	    ]);

	    $post5->tags()->sync([3, 5]);

	    $post5->views()->sync([7]);

	    $post6 = Post::create([
		    'published' => 1,
		    'locale' => 'ar',
		    'image' => 'nps6.jpg',
		    'title' => 'Le 4L Trophy partenaire de Yalla!',
		    'content' => '4L Trophy',
		    'alt' => 'Yolo image representant alt',
		    'slug' => 'trophy-partenaire',
		    'summary' => '4l Trophy est partenaire',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 4,
		    "view" => 457
	    ]);

	    $post6->tags()->sync([6]);

	    $post7 = Post::create([
		    'published' => 1,
		    'locale' => 'ar',
		    'image' => 'nps1.jpg',
		    'alt' => 'Yolo image representant alt',
		    'title' => 'Evenement fundraising à Paris',
		    'content' => 'Event fundraising',
		    'slug' => 'event-paris',
		    'summary' => 'Résumé event paris fundraising',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 4,
		    "view" => 19
	    ]);

	    $post7->tags()->sync([6, 7]);

	    $post8 = Post::create([
		    'published' => 1,
		    'locale' => 'fr',
		    'image' => 'nps2.jpg',
		    'alt' => 'Yolo image representant alt',
		    'title' => 'Les enfants à Bamako ont trouvé des dons',
		    'content' => 'Le contenu de l\'article sur les enfants à Bamako',
		    'slug' => 'article-n-8',
		    'summary' => 'Enfants ecole de bamako',
		    'card' => 'summary',
		    'meta_robots' => 0,
		    'category_id' => 1,
		    "view" => 988
	    ]);

	    $post8->tags()->sync([1, 2]);
    }
}
