# Yalla! Pour les enfants

## Technical documentation

### Front-end Development

#### Dependencies 

- AngularJS v 1.6.1
  - Used mostly in admin panel to build a better user interface :
    - Edit / create actions for Post Entity => tag management including the Language variable (do not propose english tags to a french post etc...), change published state with one click (button publish/unpublish) + AJAX Calls to admin api
    - Dashboard => AJAX Calls, orderBy and updating analytics's chart.
  - Angular v1 has a large community and will always get updated, meaning maintenance will be easier and cost less money.
- chart.js v 2.6.0
  - Used in admin dashboard to display post's analytics --> views per month
- Laroute.js
  - We're using it to manage our routes for AJAX Calls in admin panel (works really well with Laravel's Route Service) and allows developers to build a highly reusable code.
  
#### Usage for Vanilla JavaScript

We used VanillaJS to display modal and change informations for delete validation in admin panel, as well as displaying burger menu in front office, although we did not need to import AngularJS for that many lines of code.

### Back-end Development

#### Dependencies

- Laravel v5.4:
  - As the framework is well-known and has a large community, which for the same reasons of AngularJS, is a good choice for a back-end framework.
  - We created custom Request classes to manage form validations for Posts and Messages, all of the other validations were too light to require a Request Class so we managed these validations with Base Controller's 'validate()' method
  - We also wanted the admin panel's routes to abort a 404 error if someone typed directly the url of an admin action without being first logged (little bit more security if foreigners aren't redirected to the login panel) => Midlleware RedirectIfGuest
- Laravelcollective/html :
  - Makes it easier to build forms with laravel as this module's formbuilder manage many things for development.

#### Database Structure

- Posts : contains every informations for SEO and content to display on site about posts (event language and published state), has relationships with categories (one to many), tags (many to many), media (one to one) and views (many to many)
- PostSaves : Archives for post, will be updated on post versioning (update / delete), has same relationships with tags and views (it allows us to synchronize tags and views with the archive in case of RollBack).
- Medias : holds every informations about a media linked to a post (type of link : youtube video / image stored locally or online to generate <iframe> or <img>), and the url to reach the media.
- Tags : Tag entity, name, slug, locale and color
- Categories : Category entity, name, slug, locale and hierarchy if has a parent
- Messages : contains every informations sent from Contact page in front office
- Users: Admin login informations --> name / email-adress and password
- Views : Contains every view count for every post per month, we are able to migrate datas from posts to this table and link them with a relationship synchronization (allows better visibilty analytics).

#### Controllers

- AdminController : 
  - Used for every actions regarding admin like basic CRUD for major entities (tags/categories/posts)
- MainController :
  - Used for every actions regarding front-office like displaying static views to posting messages / incrementing view counts
  
## Deployment / Installation

### Installation

To be able to use this project, you will need to install php >= 7.0 and composer.
1. To install this project, you'll need to run the following command line after php and composer are installed and up-to-date :
Project root:
``` bash
  $ composer install
``` 
2. Then, you'll need to create a database and link your setting to the .env file at the project's root.
3. After all your setting are linked and the database connection is set, use the following command line at the project's root:
``` bash
    $ php artisan migrate --seed
``` 
the --seed part is optional but it will create rows in your tables and make it easier for you to start working on the project / deploying the site online.
4. You're ready to go

!! It is really important to use the command line if you change any of your Routes and want to use Laroute.js to manage your routes in JavaScript. !!
``` bash
    $ php artisan laroute:generate
``` 
### Deployment

To deploy the project online, you'll need to follow the installation guide at first, then you will have multiple changes to make in the code :
1. in app/providers/RouteServiceProvider.php, in the boot method, a check is made to decide which routes to generate according to the Application's locale,
check where is the locale parameter in the site's route and change it ($url[] for your position)
2. In resources/views/admin/layout_admin.blade.php ==> Change JavaScript variable root_route to the root of your website (before the first '/')
```Javascript
   var root_route = 'http://www.yalla-enfants';  // for route http://www.yalla-enfants/admin
```
This will make sure all AJAX Calls in backoffice are directed to the right Route URL

3. Organize Database saves and view migrations: you will need to make sure a recurrent script is being executed to save the current database to a file wherever you want (in case of disaster causing the website not to respond) or to migrate the views to enrich the posts analytics.
=> If you want to do the view migration manually --> just go to admin/migrate (will automatically redirect you to dashboard so you can check if the migration worked).

## Disaster Recovery Plan

In case of Disaster Recovery Plan, you will have to make sure the server and website runs again, for that you'll need :

- To import last save from database (explained Deployment.2) in case of Data loss or corrupt data in the Database.
- To follow the Installation / deployment points as you may have to reupload the project structure and install dependencies/database connection again.

## Translations 

To customize translations, go to resources/view/lang and the language folder you want your content to be translated.
Inside of this folder, you'll be able to find different php files holding every key content to translate, juste change the keys you'd like to edit.
Change will appear automatically.

## All references (technical, graphic and presentation) are inside the "references" folder
