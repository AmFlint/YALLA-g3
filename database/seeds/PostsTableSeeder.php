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
            'image' => 'compresse.jpg',
            'title' => 'Fest-noz solidaire le 29 octobre à Poullaouen',
            'content' => 'Yalla! Pour les Enfants vous convie le samedi 29 octobre à un fest-noz de levée de fonds dont les entiers bénéfices reviendront à son école d’Aley, située au Liban, à quelques kilomètres de Beyrouth.

Vous pourrez y apprécier les talents des musiciens et chanteurs, Marie-Hélène Baron, Laurent Bigot, Yann Boulanger, Jean-Daniel Bourdonnay, Pierre Crépillon, Annie Ebrel, Ifig Flatrès, Marie-Laurence Fustec, Riwal Fustec, Yann Goasdoué, Maurice Guillou, Jean-Paul Guyomarc’h, Jean Herrou, Brigitte Le Corre, Yann Le Corre, Bruno Le Manach, Marie-Noëlle Le Mapihan, Pierre-Yves Le Panse, François Perennes, Iffig Poho, Christian Rivoalen, qui s’engagent bénévolement pour soutenir Yalla! Pour les Enfants.

Cette fête traditionnelle bretonne où règnent la bonne humeur, la convivialité, la gaieté fait écho au dialogue interculturel mené par Yalla ! Pour les Enfants qui entend réunir au travers de projets culturels communs la communauté d’accueil libanaise et la communauté syrienne en exil pour construire une paix durable. Avec la participation active de : Maryam Samaan, Cyrille Flejou, AFPS Centre Bretagne, la mairie de Poullaouen, Le Télégramme, Ouest-France, Radio Montagne Noire, Radio Kreiz Breizh, Radio Bleu Breizh Izel',
            'slug' => 'fest-noz-solidaire-le-29-octobre-a-poullaouen',
            'summary' => 'Yalla! Pour les Enfants vous convie le samedi 29 octobre à un fest-noz de levée de fonds dont les entiers bénéfices reviendront à son école d’Aley, située au Liban, à quelques kilomètres',
            'media_id' => 1,
            'card' => 'summary',
            'meta_robots' => 0,
            'category_id' => 1,
            'alt' => 'Yolo image representant alt',
            "view" => 567
        ]);

        $post1->tags()->sync([1, 2]);

        $post1->views()->sync([1, 2, 3, 4]);

        $post2 = Post::create([
            'published' => 1,
            'locale' => 'fr',
            'image' => 'yallapourlesenfantsweb.jpg',
            'title' => 'Assemblée Générale de Yalla ! Pour les Enfants jeudi 29 septembre 2016 à 19h, à Paris',
            'content' => 'Chers adhérents, chers amis,

Nous vous invitons à l’Assemblée Générale de Yalla ! Pour les Enfants, qui se tiendra le jeudi 29 septembre 2016 à 18h30 à « La Trockette », 125, rue du Chemin Vert 75011 Paris, métro Père Lachaise.

L’ordre du jour sera le suivant :

Rapport moral,
Rapport financier,
Présentation du budget prévisionnel,
Information sur la relation bancaire avec la Société Générale,
Présentation du projet de l’école d’Aley et du programme « apprends-moi Maman »,

Appel à bénévolat :

1 / Recrutement d’une personne venant collaborer à la communication de Yalla !
2 / Recrutement d’une personne pouvant répondre aux appels à projet des bailleurs de fonds,
3/ Recrutement d’une personne apportant une aide aux travaux administratifs,
Questions diverses,

Les documents ayant servi à l’élaboration de cette Assemblée Générale sont consultables, sur RDV au siège de l’association pendant tout le mois d’octobre.

Nous vous remercions de nous faire part de votre participation en nous renvoyant les informations suivantes :

Madame, Monsieur

Participera à l’Assemblée Générale du jeudi 29 septembre 2016

Ne participera pas à l’Assemblée Générale du jeudi 29 septembre 2016*

Donne pouvoir à :

 

*veuillez barrer la mention inutile

 

Bien cordialement,
Mary Lemeland-Mellionec,
Présidente',
            'slug' => 'article-n-2',
            'summary' => 'Chers adhérents, chers amis, Nous vous invitons à l’Assemblée Générale de Yalla ! Pour les Enfants, qui se tiendra le jeudi 29 septembre 2016 à 18h30 à « La Trockette », 125, rue du Chemin Vert',
            'card' => 'summary_large',
            'media_id' => '2',
            'meta_robots' => 1,
            'category_id' => 2,
	        'alt' => 'Yolo image representant alt',
	        'view' => 209
        ]);

        $post2->tags()->sync([1]);

        $post2->views()->sync([5, 6, 7, 8]);

	    $post3 = Post::create([
		    'published' => 1,
		    'locale' => 'fr',
		    'image' => 'guerre.jpg',
		    'title' => 'Pétition « Ban Ki-moon : STOPPONS LA GUERRE EN SYRIE »',
		    'content' => 'Nous relayons l’appel citoyen adressé au Secrétaire Général des Nations Unies Ban Ki-moon. Pour vous aussi signer cette pétition, cliquez ici.

« Nous citoyens du monde, demandons aujourd’hui, l’arrêt immédiat des bombardements en Syrie et la protection des zones civiles, ainsi que l’aide d’urgence aux populations durement touchées par cette guerre génocidaire.
Parce qu’il n’est plus humainement possible pour nous, d’assister en spectateurs impuissants au massacre de cette population. Nous nous unissons ce jour pour hurler notre désaccord et notre volonté de voir cesser de telles atrocités.
Nous demandons à Monsieur Ban Ki-moon, Secrétaire Général de l’ONU, de porter notre message auprès des représentants des nations du monde, afin de faire stopper immédiatement les bombardement en Syrie. »',
		    'slug' => 'petition-petitionban-ki-moon-stoppons-la-guerre-en-syrie',
		    'summary' => 'Nous relayons l’appel citoyen adressé au Secrétaire Général des Nations Unies Ban Ki-moon. Pour vous aussi signer cette pétition, cliquez ici.',
		    'card' => 'summary',
		    'alt' => 'Yolo image representant alt',
		    'meta_robots' => 0,
		    'category_id' => 1,
		    "view" => 12
	    ]);

	    $post3->tags()->sync([1, 2]);

	    $post3->views()->sync([9, 10]);

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

	    $post4->views()->sync([11, 12]);

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

	    $post5->views()->sync([13, 14]);

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
        $post6->views()->sync([14, 15]);

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
        $post7->views()->sync([16, 17]);

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
        $post8->views()->sync([18, 19]);
    }
}
