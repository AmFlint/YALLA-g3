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
            'meta_description' => 'Yalla! pour les enfants vous convie le samedi 29 octobre à un fest-noz de levée de fonds pour l\'école d\'Aley, située au Liban',
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
            'summary' => 'Chers adhérents, chers amis, Nous vous invitons à l’Assemblée Générale de Yalla ! Pour les Enfants, qui se tiendra le jeudi 29 septembre 2016',
            'card' => 'summary_large',
            'media_id' => '2',
            'meta_robots' => 1,
            'meta_description' => 'Chers adhérents, chers amis, Nous vous invitons à l’Assemblée Générale de Yalla ! Pour les Enfants, qui se tiendra le jeudi 29 septembre 2016 à 18h30 à « La Trockette », 125, rue du Chemin Vert',
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
            'meta_description' => 'Nous relayons l’appel citoyen adressé au Secrétaire Général des Nations Unies Ban Ki-moon. Pour vous aussi signer cette pétition, cliquez ici.',
            'category_id' => 1,
		    "view" => 12
	    ]);

	    $post3->tags()->sync([1, 2]);

	    $post3->views()->sync([9, 10]);

	    $post4 = Post::create([
		    'published' => 1,
		    'locale' => 'en',
		    'image' => 'yallapourlesenfantsweb.jpg',
		    'title' => 'Recruiting Manager for Yalla! Center in Aley (ASAP)',
		    'content' => '<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><span style="box-sizing: border-box; color: #000000;"><strong style="box-sizing: border-box;">Mission: Director of Yalla! Center in Aley</strong></span></p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><span style="box-sizing: border-box; color: #000000;">Starting date : October 1<span style="box-sizing: border-box; font-size: 10.5px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">st</span>, 2016</span></p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><u style="box-sizing: border-box;">The Association:</u></p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><strong style="box-sizing: border-box;">Yalla! Pour Les Enfants</strong>&nbsp;is an independent, impartial and secular association established under French law in July 2013 by a group of French citizens concerned by the lack of education opportunities for Syrian refugee children in Lebanon. Yalla! seeks to enhance capacities of existing education initiatives within the Syrian and Lebanese communities by supporting Syrian teachers, providing classrooms and enhancing teaching capacities.&nbsp;<strong style="box-sizing: border-box;">Yalla! Learning Center in Aley is a bridge for the Syrian children to integrate the Lebanese formal schooling system.</strong></p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">Yalla! also aims at participating to build peaceful relationships between the host and the refugee communities, notably through artistic and sportive activities.</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><u style="box-sizing: border-box;">The Project:</u></p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">Yalla! opened a learning center in Aley in October 2014. Yalla! center welcomes over a hundred of Syrian refugee children, aged from 5 to 13 years old from Monday to Friday. They are taught Arabic, Mathematics, Sciences, English and French languages. Extracurricular activities (drawing, sports, theatre, photography, circus, etc.) with special focus to trauma-affected children are organized by Lebanese, Syrian and international volunteers.</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">On Saturdays, Yalla! Center opens its doors to the mothers and provides them with English and Mathematics classes, while artistic and sportive activities are providing to the children of Aley.</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">The Yalla! team works with a team composed of five Lebanese and Syrian teachers, with the support of the authorities of Aley. Everyone is committed to protecting the children&rsquo;s interests and supporting them throughout their personal, academic and civic development.</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><u style="box-sizing: border-box;">The Task:</u></p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">The Director of Yalla! Learning Center will manage the Learning Center from Monday to Friday afternoon, as well as half a day on Saturdays, in cooperation with Yalla!&rsquo;s Field Coordinator.</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">Some extra-hours will be required, on a voluntary basis, to accompany the children in extra-curricular activities or prepare the center&rsquo;s events.</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><u style="box-sizing: border-box;">Qualities sought:</u></p>
<ul style="box-sizing: border-box; margin: 16px 0px; padding: 0px 0px 0px 40px; list-style-type: square; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">
<li style="box-sizing: border-box;">excellent communication skills with children and patience</li>
<li style="box-sizing: border-box;">leadership and diplomacy</li>
<li style="box-sizing: border-box;">excellent organizational skills</li>
<li style="box-sizing: border-box;">being dedicated to the education of children</li>
<li style="box-sizing: border-box;">willingness to work in a multi-cultural environment</li>
<li style="box-sizing: border-box;">willingness to work in a secular and non-political environment</li>
<li style="box-sizing: border-box;">flexibility and adaptability</li>
</ul>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><u style="box-sizing: border-box;">Qualifications sought:</u></p>
<ul style="box-sizing: border-box; margin: 16px 0px; padding: 0px 0px 0px 40px; list-style-type: square; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">
<li style="box-sizing: border-box;">degree in Education Sciences</li>
<li style="box-sizing: border-box;">experience in administration of educational project and/or a solid teaching experience (particularly with young children)</li>
<li style="box-sizing: border-box;">Arabic (mother tongue)</li>
<li style="box-sizing: border-box;">English (good level)</li>
</ul>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">&nbsp;</p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><u style="box-sizing: border-box;">What we offer:</u></p>
<ul style="box-sizing: border-box; margin: 16px 0px; padding: 0px 0px 0px 40px; list-style-type: square; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;">
<li style="box-sizing: border-box;">An amazing human experience with a multicultural team of dedicated volunteers</li>
<li style="box-sizing: border-box;">Trainings according to the needs of the volunteer in order to develop his skills</li>
<li style="box-sizing: border-box;">A monthly stipend</li>
</ul>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><strong style="box-sizing: border-box;">&nbsp;</strong></p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><strong style="box-sizing: border-box;">Interviews will be conducted on&nbsp;<u style="box-sizing: border-box;">Friday September 2<span style="box-sizing: border-box; font-size: 10.5px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">nd</span></u>&nbsp;and on&nbsp;<u style="box-sizing: border-box;">Friday September 9<span style="box-sizing: border-box; font-size: 10.5px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;">th</span></u>&nbsp;in Aley.</strong></p>
<p style="box-sizing: border-box; margin: 0px 0px 24px; color: #575757; font-family: \'Open Sans\', Helvetica, sans-serif;"><strong style="box-sizing: border-box;">If you fulfill these requirements, please send your CV in English at this address: cbertal.yalla@gmail.com.</strong></p>',
		    'slug' => 'recruiting-manager',
		    'alt' => 'Alt yala! logo',
		    'summary' => 'Mission: Director of Yalla! Center in Aley Starting date : October 1st, 2016   The Association: Yalla! Pour Les Enfants is an independent, impartial and secular association established under French law in',
		    'card' => 'summary',
		    'meta_robots' => 0,
            'meta_description' => 'We are',
            'category_id' => 3,
		    "view" => 1009
	    ]);

	    $post4->tags()->sync([4]);

	    $post4->views()->sync([11, 12]);

	    $post5 = Post::create([
		    'published' => 1,
		    'locale' => 'en',
		    'image' => 'newsletter.png',
		    'title' => 'Our last newsletter in English (September 2016)',
		    'content' => 'Dear English-speaking friends or members, click here to read our last newsletter in English.',
		    'slug' => 'last-newsletter',
		    'alt' => 'Yolo image representant alt',
		    'summary' => 'Dear English-speaking friends or members, click here to read our last newsletter in English.',
		    'card' => 'summary',
		    'meta_robots' => 0,
            'meta_description' => 'Last update newsletter available online in english',
            'category_id' => 3,
		    'media_id' => 3,
		    "view" => 107
	    ]);

	    $post5->tags()->sync([3, 5]);

	    $post5->views()->sync([13, 14]);

	    $post6 = Post::create([
		    'published' => 1,
		    'locale' => 'ar',
		    'image' => 'compresse.jpg',
		    'title' => 'مهرجان Noz التضامن 29 أكتوبر في Poullaouen',
		    'content' => 'موقع Yalla! للأطفال يدعوك السبت 29 أكتوبر في جمع التبرعات مهرجان-Noz التي الأرباح بالكامل سيعود إلى مدرسته عاليه، وتقع في لبنان، على بعد بضعة كيلومترات من بيروت.

يمكنك التمتع مواهب الموسيقيين والمطربين، ماري هيلين البارون لورينت بيغوت، يان بوولنجر، جان-دانيال Bourdonnay بيير CREPILLON، أني إبريل، Ifig FLATRES، ماري-لورنس Fustec، Riwal Fustec يان غيو Goasdoué موريس، جون بول Guyomarc\'h جين هيرو بريجيت لو كور، يان لو كور برونو لو Manach، ماري نويل وMapihan، بيير إيف لو Panse فرانسوا Perennes، Iffig Poho مسيحي Rivoalen، الذين يرتكبون طوعا إلى الدعم موقع Yalla! للأطفال.

هذا المهرجان التقليدي بريتون روح الدعابة تنتشر والود، وردد البهجة الحوار بين الثقافات من قبل يلا أدى! للأطفال الذين يعتزم لقاء من خلال مشاريع ثقافية مشتركة للمجتمع المضيف اللبناني والمجتمع المنفى السوري لبناء سلام دائم. بمشاركة نشطة من مريم سمعان، سيريل Flejou، AFD الوسطى بريتاني، بلدة Poullaouen، وبرقية، كويست، فرنسا، أسود راديو الجبل، راديو Kreiz BREIZH BREIZH عز الراديو الأزرق "
            \'سبيكة\' => \'مهرجان-Noz-التضامن-على-29-أكتوبر على بعد poullaouen',
		    'alt' => 'Yolo image representant alt',
		    'slug' => 'solidary-poullaouen',
		    'summary' => ' وتقع في لبنان، على بعد بضعة كيلومترات من بيروت.',
		    'card' => 'summary',
		    'meta_robots' => 0,
            'meta_description' => 'وتقع في لبنان، على بعد بضعة كيلومترات من بيروت.',
            'category_id' => 4,
		    "view" => 457
	    ]);

	    $post6->tags()->sync([6]);
        $post6->views()->sync([14, 15]);

	    $post7 = Post::create([
		    'published' => 1,
		    'locale' => 'ar',
		    'image' => 'yallapourlesenfantsweb.jpg',
		    'alt' => 'Yolo image representant alt',
		    'title' => 'المساهمين موقع Yalla! للأطفال الخميس 29 سبتمبر، 2016 في 19H في باريس',
		    'content' => 'أعزائي الأعضاء، أيها الأصدقاء الأعزاء،

ونحن ندعوك إلى اجتماع الجمعية العمومية السنوي للموقع Yalla! للأطفال، المقرر عقده الخميس 29 سبتمبر، 2016 في الساعة 18:30 في "وTrockette، 125، شارع دو جيمن فير 75011 باريس والمترو بير لاشيه.

وجدول الأعمال على النحو التالي:

تقرير الأخلاقي،
التقرير المالي
عرض الميزانية المؤقتة،
معلومات عن علاقة مصرفية مع بنك سوسيتيه جنرال،
عرض مشروع المدرسة عاليه وبرنامج "علمني أمي"

دعوة للعمل التطوعي:

1 / توظيف شخص من الاتصالات العاملة يلا!
2 / التوظيف شخص يمكن أن تستجيب لدعوات لتقديم مقترحات من الجهات المانحة،
3 / توظيف شخص تقديم المساعدة إلى العمل الإداري،
مسائل أخرى،

هي المستندات المستخدمة في إعداد هذا الاجتماع العام المتاحة، عن طريق التعيين في مقر الجمعية خلال شهر اكتوبر تشرين الاول.

شكرا منك أن ترسل لنا المشاركة عن طريق ارسال لنا المعلومات التالية:

سيداتي سادتي

المشاركة في اجتماع الجمعية العمومية في الخميس سبتمبر 29، 2016

لن تشارك في اجتماع الجمعية العمومية في الخميس سبتمبر 29، 2016 *

تعيين بموجب:

 

* الرجاء حذف حسب الاقتضاء

 

مع خالص التقدير،',
		    'slug' => 'event-paris',
		    'summary' => 'الرجاء حذف حسب الاقتضاء',
		    'card' => 'summary',
		    'meta_robots' => 0,
            'meta_description' => 'الرجاء حذف حسب الاقتضاء',
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
            'meta_description' => 'We are',
            'category_id' => 1,
		    "view" => 988
	    ]);

	    $post8->tags()->sync([1, 2]);
        $post8->views()->sync([18, 19]);
    }
}
