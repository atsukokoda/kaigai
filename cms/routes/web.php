<?php
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


use App\Http\Middleware\LoginMiddleware;

//TOP画面
Route::get('/', 'KaigaiController@index');

//管理画面
Route::get('/kanri', 'KaigaiController@kanri');

//area登録画面
Route::get('/area','KaigaiController@area');
Route::post('/area_insert', 'KaigaiController@area_insert');
Route::post('/area/delete/{area}', 'KaigaiController@area_delete');

//tohan登録画面
Route::get('/tohan','KaigaiController@tohan');
Route::post('/tohan_insert', 'KaigaiController@tohan_insert');
Route::post('/tohan/delete/{tohan}', 'KaigaiController@tohan_delete');

//store_category登録画面
Route::get('/store_category','KaigaiController@store_category');
Route::post('/store_category_insert', 'KaigaiController@store_category_insert');
Route::post('/store_category/delete/{store_category}','KaigaiController@store_category_delete');


//user登録画面
Route::get('/user','KaigaiController@user');
Route::post('/user_insert', 'KaigaiController@user_insert');
Route::post('/user/delete/{user}','KaigaiController@user_delete');

//store登録画面
Route::get('/store','KaigaiController@store');
Route::post('/store_insert', 'KaigaiController@store_insert');
Route::post('/store/delete/{store}','KaigaiController@store_delete');


//genre登録画面
Route::get('/genre','KaigaiController@genre');
Route::post('/genre_insert', 'KaigaiController@genre_insert');
Route::post('/genre/delete/{genre}', 'KaigaiController@genre_delete');



///awabukuのデータ


// Route::get('/login', 'UserController@login_view');

// Route::get('/user_group', 'UserController@user_group');
// Route::get('/user_page', 'UserController@user_page');

// Route::post('/user_group_insert/', 'UserController@user_group_insert');

// Route::get('logout', 'UserController@logout');
// Route::get('facebook', 'UserController@loginFacebook');
// Route::get('facebook/callback', 'UserController@facebookCallback');
// Route::get('/loginCheck', 'UserController@loginCheck');

///////カテゴリ登録
// //カテゴリジャンル
// Route::get('/category_genre','BooksController@category_genre');
// Route::post('/category_genre','BooksController@category_genre_insert');
// Route::delete('/category_genre/{tag_genre}', 'BooksController@category_genre_delete');
// Route::post('/category_genre_update', 'BooksController@category_genre_update');

// //カテゴリ
// Route::get('/category','BooksController@category');
// Route::post('/category', 'BooksController@category_insert');
// Route::delete('/category/{tag}', 'BooksController@category_delete');
// Route::post('/category/{tag}', 'BooksController@category_update_view');
// Route::post('/category_update', 'BooksController@category_update');


// //書籍の登録
// Route::get('/book','BooksController@book_register');
// // Route::get('/book','BooksController@book');
// Route::post('/book', 'BooksController@book_insert');
// // Route::delete('/book/{book}', 'BooksController@book_delete');
// Route::get('/book_owner/{owner}', 'BooksController@book_update_view');
// Route::post('/book_update', 'BooksController@book_update');
/////カテゴリの表示
//変更
//Route::get('/book', 'BooksController@tag_list');





// //貸出機能画面
// Route::get('/rental/{book}','BooksController@rental_view');
// Route::post('/book_rental','BooksController@book_rental');
// Route::get('/book_rentaled_view/{rental}','BooksController@book_rentaled_view');
// Route::post('/rental/','BooksController@rental_comment_insert');

// //マイページ
// Route::get('/mypage','BooksController@mypage');
// Route::get('/mypage/{owner}','BooksController@mypage_detail');
// Route::post('/delete_ownbook','BooksController@delete_ownbook');
// Route::post('/change_rental','BooksController@change_rental');


// Route::get('/modify_ownbook/{owner}','BooksController@modify_ownbook')
// ->middleware('login');



//返却画面
Route::post('/return/{rental}','BooksController@return_view');
Route::post('/return_comment/','BooksController@return_comment');



// //掲示板
// Route::get('/threads','BooksController@thread');
// Route::post('/threads','BooksController@thread_insert');


// Route::post('/thread', 'BooksController@book_insert_thread');
// Route::post('/thread_2', 'BooksController@thread_comment_insert');
// Route::get('/thread/{thread}', 'BooksController@thread_page');

// //ジャンル別/カテゴリ別/タグ別ページ
// Route::get('/category_genre_page/{category_genre}', 'BooksController@category_genre_page');
// Route::get('/category_page/{category}', 'BooksController@category_page');
// Route::get('/tag_page/{tag}', 'BooksController@tag_page');

// //検索結果ページ
// Route::get('/search', 'SearchController@getIndex');
// Route::get('/search_tag', 'SearchController@getIndex_tag');


//外部の人が見るユーザー情報
// Route::get('/user_search_page/{user}','UsersearchController@user_search_page')
// ->middleware('login');

// //gs画面
// Route::get('/gsbooks', 'GsController@gsbooks');
// Route::get('/gsbook/{owner}','GsController@gsbook_view');
// Route::post('/gsbook/','GsController@gsbook_comment_insert');

// //person入力画面
// Route::get('/key','BooksController@key')
// ;
// Route::post('/key_insert', 'BooksController@key_insert')
// ;

//tag入力画面
// Route::get('/tag','BooksController@tag');
// Route::post('/tag_insert', 'BooksController@tag_insert');
// Route::delete('/tag/{tag}', 'BooksController@tag_delete');
// Route::post('/tag/{tag}', 'BooksController@tag_update_view');
// Route::post('/tag_update', 'BooksController@tag_update');

// Route::get('/ajax/{category_ids}', 'AjaxTest@ajax');

// Route::get('/ajax_comment/{book_id}/{user_id}', 'AjaxTest@ajax_comment');

// //一人のユーザーによるBook_comment
// Route::get('/book_comment/{comment}','BooksController@book_comment');