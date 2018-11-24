<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;
use App\Book;
use App\Book_tag;

use App\Genre;
use App\Store;
use App\Store_book;
use App\Store_category;
use App\Tohan;
use App\User;
use Validator;


class KaigaiController extends Controller
{
////index_page
 public function index(){
           return view('index');
    }

////kanri

     public function kanri(){
           return view('kanri');
     }
////area


//area登録ページ
public function area() {
    $areas=Area::orderBy('id', 'asc')->get();
        return view('area',
        ['areas' => $areas,]
        );
    }
    
//ポストされてきたareaをインサートする処理
public function area_insert(Request $request) {
     $validator = Validator::make($request->all(), [
          'area_name' => 'required | max: 20',
      ]);
      if ($validator->fails()){
          return redirect('area')
          ->withInput()
          ->withError($validator);
      }
      $area = new Area;
      $area->area_name = $request->area_name;
  
      $area->save();
      return redirect('area');
    }
    
//areaを消す
    public function area_delete(Area $area) {
        $area->delete();
        return redirect('area');
    }
    
    
////tohan

//tohan登録ページ
public function tohan() {
 
    $tohans=Tohan::orderBy('id', 'asc')->get();

        return view('tohan',
        ['tohans' => $tohans]
        );
    }
    
//ポストされてきたtohanをインサートする処理
public function tohan_insert(Request $request) {
     $validator = Validator::make($request->all(), [
          'staff_name' => 'required | max: 20',
      ]);
      if ($validator->fails()){
          return redirect('tohan')
          ->withInput()
          ->withError($validator);
      }
      $tohan = new Tohan;
      $tohan->staff_name = $request->staff_name;
  
      $tohan->save();
      return redirect('tohan');
    }
    
//tohanを消す
    public function tohan_delete(Tohan $tohan) {
        $tohan->delete();
        return redirect('tohan');
    }    
    
    
    
    
////store_category

//store_category登録ページ       
 
 public function store_category() {
        $store_categories = Store_category::orderBy('id', 'asc')->get();
        $areas=Area::orderBy('id', 'asc')->get();
        $tohans=Tohan::orderBy('id', 'asc')->get();
       
 
       return view('store_category',
        
        ['areas' => $areas,'tohans' => $tohans,'store_categories' => $store_categories]
        );
    }
    
//ポストされてきたstore_categoryをインサートする処理
    public function store_category_insert(Request $request) {
      $validator = Validator::make($request->all(), [
          'store_category' => 'required | max: 20',
          'area_id' =>'required',
      ]);
      if ($validator->fails()){
          return redirect('store_category')
          ->withInput()
          ->withError($validator);
      }
      $store_categories = new Store_category;
      $store_categories->store_category = $request->store_category;
      $store_categories->area_id = $request->area_id;
      
      $store_categories->save();
      return redirect('store_category');
    }
    
//store_categoryを消す
    public function store_category_delete(Store_category $Store_category) {
        $Store_category->delete();
        return redirect('Store_category');
    }
      
       
////user

//user登録ページ       
 
 public function user() {
        $users =User::orderBy('id', 'asc')->get();
        $tohans=Tohan::orderBy('id', 'asc')->get();
       
       return view('user',
        ['users' => $users,'tohans' => $tohans]
        );
    }
    
//ポストされてきたuserをインサートする処理
    public function user_insert(Request $request) {
      $validator = Validator::make($request->all(), [
          'user_name' => 'required | max: 20',
    
      ]);
      if ($validator->fails()){
          return redirect('user')
          ->withInput()
          ->withError($validator);
      }
      $users = new User;
      $users->user_name = $request->user_name;
      $users->tohan_id = $request->tohan_id;
      $users->save();
      return redirect('user');
    }
    
//userを消す
    public function user_delete(User $user) {
        $user->delete();
        return redirect('user');
    } 
     
        
////store

//store登録ページ       
 
 public function store() {
        $users =User::orderBy('id', 'asc')->get();
        $tohans=Tohan::orderBy('id', 'asc')->get();
        $stores=Store::orderBy('id', 'asc')->get(); 
        $store_categories=Store_category::orderBy('id', 'asc')->get();
        

       return view('store',
        ['users' =>  $users, 'tohans' => $tohans, 'stores' => $stores, 'store_categories' => $store_categories]
        );
    }
    
//ポストされてきたuserをインサートする処理
    public function store_insert(Request $request) {
      $validator = Validator::make($request->all(), [
          'store_name' => 'required | max: 20',
    
      ]);
      if ($validator->fails()){
          return redirect('store')
          ->withInput()
          ->withError($validator);
      }
      $stores = new Store;
      $stores->store_name = $request->store_name;
      $stores->store_code = $request->store_code;
      $stores->user_id = $request->user_id;
      $stores->bansen =$request->bansen;
      $stores->air_sea =$request->air_sea;
      $stores->tohan_id = $request->tohan_id;
      $stores->store_category = $request->store_category;
      
      $stores->save();
      return redirect('store');
    }
    
//storeを消す
    public function store_delete(Store $store) {
        $store->delete();
        return redirect('store');
    }         
        
////genre


//genre登録ページ
public function genre() {
    $genres=Genre::orderBy('id', 'asc')->get();
        return view('genre',
        ['genres' => $genres,]
        );
    }
    
//ポストされてきたareaをインサートする処理
public function genre_insert(Request $request) {
     $validator = Validator::make($request->all(), [
          'genre_name' => 'required | max: 20',
      ]);
      if ($validator->fails()){
          return redirect('genre')
          ->withInput()
          ->withError($validator);
      }
      $genre = new Genre;
      $genre->genre_name = $request->genre_name;
  
      $genre->save();
      return redirect('genre');
    }
    
//genreを消す
    public function genre_delete(Genre $genre) {
        $genre->delete();
        return redirect('genre');
    }  
    
////book


//book登録ページ
public function book() {
    $books=Booke::orderBy('id', 'asc')->get();
        return view('book',
        ['books' => $books,]
        );
    }
    
//ポストされてきたareaをインサートする処理
public function book_insert(Request $request) {
     $validator = Validator::make($request->all(), [
      
      'isbn13'           =>'required | max: 13',
      'publisher'        =>'required | max: 20',
      'book_title'       =>'required | max: 50',
      'price'            =>'required | max: 6',
      'price_2'          =>'required | max: 6',
      'book_description' =>'required | max: 1000',
      'book_image'       =>'required | max: 100',
      'new_flag'         =>'required | max: 2',
      'publish_date'     =>'required',
      'deadline_date'    =>'required',
      'emergency_flag'   =>'required',
      'tohan_id'         =>'required',
      'genre_id'         =>'required'   
          
          
      ]);
      if ($validator->fails()){
          return redirect('book')
          ->withInput()
          ->withError($validator);
      }
      $book = new Book;
      $book->isbn13           = $request->isbn13;
      $book->publisher        = $request->publisher;
      $book->book_title       = $request->book_title;
      $book->price            = $request->price;  
      $book->price_2          = $request->price_2;
      $book->book_description = $request->book_description;
      $book->book_image       = $request->book_image;
      $book->new_flag         = $request->new_flag;
      $book->publish_date     = $request->publish_date;
      $book->deadline_date    = $request->deadline_date;  
      $book->emergency_flag   = $request->emergency_flag;
      $book->tohan_id         = $request->tohan_id;
      $book->genre_id         = $request->genre_id;
      
      $book->save();
      return redirect('book');
    }
    
//bookを消す
    public function book_delete(Book $book) {
        $book->delete();
        return redirect('book');
    }     
    
    

}
