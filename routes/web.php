<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


Route::group(['prefix' => 'dashboard','middleware' => 'auth'], function(){
    
    //dashboard route start
    Route::get('/','HomeController@dashboard')->name('dashboard');

    //user management
    Route::get('/user/management/','Backend\Admin\UserController@index')->name('user.show');
    Route::post('/user/management/create','Backend\Admin\UserController@store')->name('user.create');
    Route::get('/user/management/edit/{user:id}','Backend\Admin\UserController@edit')->name('user.edit');
    Route::post('/user/management/update/{user:id}','Backend\Admin\UserController@update')->name('user.update');
    Route::post('/user/management/delete/{user:id}','Backend\Admin\UserController@destroy')->name('user.delete');

    //profile route start
    Route::get('/user/management/editProfile/{user:id}','Backend\Admin\UserController@profileedit')->name('user.profileedit');
    Route::post('/user/management/editProfile/update/password/{user:id}','Backend\Admin\UserController@updatePassword')->name('updatePassword');
    Route::post('/user/management/editProfile/updateprofile/{user:id}','Backend\Admin\UserController@updateProfile')->name('profile.update');
    Route::post('/user/management/editProfile/delete/{user:id}','Backend\Admin\UserController@deleteProfile')->name('profile.delete');
    Route::post('resetpassword/{user:id}','Backend\Admin\UserController@resetPass')->name('password.reset');


    //logo route start
    Route::get('/logo', 'Backend\LogoController@index')->name('logo.show');
    Route::post('/logo/store', 'Backend\LogoController@store')->name('logo.store');
    Route::post('/logo/update/{logo:id}', 'Backend\LogoController@update')->name('logo.update');
    Route::post('/logo/delete/{logo:id}', 'Backend\LogoController@destroy')->name('logo.delete');
    //logo route end

    //category route start
    Route::get('/category', 'Backend\Category\CategoryController@index')->name('categorynews.show');
    Route::post('/category/store', 'Backend\Category\CategoryController@store')->name('category.store');
    Route::post('/category/update/{category:id}', 'Backend\Category\CategoryController@update')->name('category.update');
    Route::post('/category/delete/{category:id}', 'Backend\Category\CategoryController@destroy')->name('category.delete');
    //category route end

    //news route start
    Route::get('/news', 'Backend\News\NewsController@index')->name('news.show');
    Route::post('ckeditor/image_upload', 'Backend\News\NewsController@upload')->name('upload');
    Route::post('/news/store/superadmin', 'Backend\News\NewsController@store')->name('news.store');
    Route::post('/news/store', 'Backend\News\NewsController@storeadmin')->name('news.storeadmin');
    Route::get('/news/edit/{news:id}', 'Backend\News\NewsController@edit')->name('news.edit');
    Route::post('/news/update/{news:id}', 'Backend\News\NewsController@update')->name('news.update');
    Route::post('/pendingnews/update/{news:id}', 'Backend\News\NewsController@pupdate')->name('pnews.update');
    Route::post('/news/softdelete/{news:id}', 'Backend\News\NewsController@softdestroy')->name('news.delete');
    Route::get('/news/deletednews', 'Backend\News\NewsController@deletedNews')->name('deletednews.show');
    Route::post('/news/restorenews/{news:id}', 'Backend\News\NewsController@restoreNews')->name('news.restore');
    Route::get('/all/news/restore', 'Backend\News\NewsController@restoreAllNews')->name('news.restore.all');
    Route::get('/news/gallery', 'Backend\News\NewsController@galleryNewsView')->name('news.gallery');
    Route::post('/gallery/add', 'Backend\News\NewsController@galleryAdd')->name('gallery.add');
    Route::get('/gallery/edit/{id}', 'Backend\News\NewsController@galleryEdit')->name('gallery.edit');
    Route::post('/gallery/update/{id}', 'Backend\News\NewsController@galleryUpdate')->name('gallery.update');
    Route::post('/gallery/delete/{id}', 'Backend\News\NewsController@galleryDelete')->name('gallery.delete');
    //news route end

    //pending news route
    Route::get('/pending','Backend\News\NewsController@pendingnews')->name('pendingnews.show');
    Route::get('/pending/edit/{news:id}','Backend\News\NewsController@editpendingnews')->name('pendingnews.edit');
    Route::post('/pending/update/{news:id}','Backend\News\NewsController@updatependingnews')->name('pendingnews.update');
    Route::post('/pending/delete/{news:id}','Backend\News\NewsController@deletependingnews')->name('pendingnews.delete');

    //advertisement route start
    Route::group(['prefix'=>'advertisement'], function(){
        //manage route
        Route::get('/manage','Backend\Ad\AdController@index')->name('ad.show');
        Route::post('/store','Backend\Ad\AdController@store')->name('ad.store');
        Route::post('/update/{ad:id}','Backend\Ad\AdController@update')->name('ad.update');
        Route::post('/delete/{ad:id}','Backend\Ad\AdController@destroy')->name('ad.delete');
    });

    //about route start
    Route::group(['prefix'=>'about'], function(){

        //show about page
        Route::get('/manage','Backend\About\AboutPageController@index')->name('about.show');

        //about information route
        Route::get('/manage/edit/{about:id}','Backend\About\AboutInfoController@edit')->name('about.edit');
        Route::post('/manage/update/{about:id}','Backend\About\AboutInfoController@update')->name('about.update');
        Route::post('/manage/delete/{about:id}','Backend\About\AboutInfoController@destroy')->name('about.delete');

        //team member route start
        Route::post('/team/store/','Backend\About\TeamController@store')->name('team.store');
        Route::post('/team/update/{team:id}','Backend\About\TeamController@update')->name('team.update');
        Route::post('/team/delete/{team:id}','Backend\About\TeamController@destroy')->name('team.delete');
        //team member route end

        //contact route start
        Route::get('/contact','Backend\Contact\ContactController@index')->name('contact.show');
        Route::post('/contact/update/{contact:id}','Backend\Contact\ContactController@update')->name('contact.update');
        Route::post('/contact/delete/{contact:id}','Backend\Contact\ContactController@destroy')->name('contact.delete');
        //contact route end
    });
    //about route end

    //message route start
    Route::get('/message','Backend\Message\MessageController@index')->name('message.show');
    Route::post('/message/delete/{message:id}','Backend\Message\MessageController@destroy')->name('message.delete');
    //message route end

    //title route start
    Route::get('/title','Backend\Title\TitleController@index')->name('title.show');
    Route::post('/title/update{title:id}','Backend\Title\TitleController@update')->name('title.update');
    //title route end
    
    
    
    //newsletter route start
    Route::get('newsletter','Backend\Contact\ContactController@emailShow')->name('email.show');
    Route::post('newsletter/delete/{email:id}','Backend\Contact\ContactController@emailDelete')->name('email.delete');


    
});




/*
|--------------------------------------------------------------------------
| Auth Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register/user', 'Auth\RegisterController@registerAdmin')->name('register.superadmin');
















/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home page
Route::get('/','Frontend\FrontendController@index')->name('index');

//about
Route::get('/about','Frontend\FrontendController@about')->name('about');
Route::post('/about/newsletter', 'Backend\Contact\ContactController@newsletterStore')->name('newsletter.store');

Route::get('/clear', function(){
    $exitCode = Artisan::call('migrate');
    return 'success';
});



//category
Route::group(['prefix'=>'category/'], function(){
    Route::get('{category:slug}','Frontend\FrontendController@categoryshow')->name('category.show');
});

//contact
Route::get('/contact','Frontend\FrontendController@contact')->name('contact');
Route::post('/contact/store','Frontend\FrontendController@contactmessage')->name('contactmessage');

//search 
Route::get('/search','Frontend\FrontendController@search')->name('search');

//news detail
Route::group(['prefix'=>'newsdetail/'], function(){
    Route::get('{id}','Frontend\FrontendController@newsdetail')->name('newsdetail');
});




Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');

