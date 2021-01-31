<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/', 'BerandaController@index');

Route::get('/tentangkami', function () {
    return view('frontend.tentangkami.index');
});

Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/editpost/{id}', 'HomeController@editpost')->name('home.editpost');
    Route::delete('/home/destroypost/{id}', 'HomeController@destroypost')->name('home.destroypost');
    Route::get('/home/editdiscussion/{id}', 'HomeController@editdiscussion')->name('home.editdiscussion');
    Route::delete('/home/destroydiscussion/{id}', 'HomeController@destroydiscussion')->name('home.destroydiscussion');

    Route::get('/mailsearch', 'MailController@search')->name('mailsearch');
    Route::resource('/announcement', 'AnnouncementController');
    Route::get('/announcementsearch', 'AnnouncementController@search')->name('announcementsearch');
    Route::resource('/editprofile', 'EditProfileController');
    Route::resource('/questionnaire', 'QuestionnaireController');
    Route::resource('/category', 'CategoryController');
    Route::get('/categorysearch', 'CategoryController@search')->name('categorysearch');
    Route::resource('/tag', 'TagController');
    Route::get('/tagsearch', 'TagController@search')->name('tagsearch');
    Route::resource('/forumtag', 'ForumTagController');
    Route::get('/forumtagsearch', 'ForumTagController@search')->name('forumtagsearch');
    Route::resource('/forumcategory', 'ForumCategoryController');
    Route::get('/forumcategorysearch', 'ForumCategoryController@search')->name('forumcategorysearch');
    Route::resource('/author', 'AuthorController');
    Route::get('/authorsearch', 'AuthorController@search')->name('authorsearch');
    Route::resource('/user', 'UserController');
    Route::get('/usersearch', 'UserController@search')->name('usersearch');
    Route::get('/post/trash', 'PostController@trash')->name('post.trash');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');
    Route::resource('/post', 'PostController');
    Route::get('/postsearch', 'PostController@search')->name('postsearch');
    Route::get('/postexcel', 'PostController@excel')->name('postexcel');
    Route::get('/postpdf', 'PostController@pdf')->name('postpdf');
    Route::get('/discussion/trash', 'DiscussionController@trash')->name('discussion.trash');
    Route::get('/discussion/restore/{id}', 'DiscussionController@restore')->name('discussion.restore');
    Route::delete('/discussion/kill/{id}', 'DiscussionController@kill')->name('discussion.kill');
    Route::resource('/discussion', 'DiscussionController');
    Route::get('/discussionsearch', 'DiscussionController@search')->name('discussionsearch');
});

Route::resource('/mail', 'MailController');
Route::get('/statistik', 'StatistikController@index')->name('statistik');

Route::get('/blog', 'BlogController@blog')->name('blog');
Route::get('/blogdetail/{slug}', 'BlogController@singleblog')->name('singleblog');
Route::get('/blogcategories/{category}', 'BlogController@category')->name('blogcategory');
Route::get('/blogtags/{tag}', 'BlogController@tag')->name('blogtag');
Route::get('/blogsearch', 'BlogController@search')->name('blogsearch');

Route::get('/forum', 'ForumController@forum')->name('forum');
Route::get('/forumdetail/{slug}', 'ForumController@singleforum')->name('singleforum');
Route::get('/forumcategories/{category}', 'ForumController@category')->name('forumcategory');
Route::get('/forumtags/{tag}', 'ForumController@tag')->name('forumtag');
Route::get('/forumsearch', 'ForumController@search')->name('forumsearch');

Route::get('login/google', 'Auth\LoginController@redirectToProvider1');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback1');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider2');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback2');

Route::get('login/github', 'Auth\LoginController@redirectToProvider3');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback3');
