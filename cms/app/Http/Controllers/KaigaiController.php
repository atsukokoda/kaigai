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
    $books=Book::orderBy('id', 'asc')->get();
    $genres=Genre::orderBy('id','asc')->get();
    $tohans=Tohan::orderBy('id','asc')->get();
    
        return view('book',
    
        ['books' => $books,'genres'=>$genres,'tohans'=>$tohans]
        );
    }
    
//ポストされてきたareaをインサートする処理
public function book_insert(Request $request) {
 // //バリデーション     
     $validate_rule  = [
      'isbn13'           =>'required',
      'publisher'        =>'required',
      'book_title'       =>'required',
      'price'            =>'required',
      'price_2'          =>'required',
      'book_description' =>'required',
      'book_image'       =>'required',
      'new_flag'         =>'required',
      'publish_date'     =>'required',
      'deadline_date'    =>'required',
      'emergency_flag'   =>'required',
      'tohan_id'         =>'required',
      'genre_id'         =>'required'   
      ];
 
    $error_msg=[
        
      'isbn13.required'           =>'isbn13が入力されていません',
      'publisher.required'        =>'出版社が入力されていません',
      'book_title.required'       =>'書名が入力されていません',
      'price.required'            =>'予価が入力されていません',
      'price_2.required'          =>'予価２が入力されていません',
      'book_description.required' =>'書誌情報が入力されていません',
      'book_image.required'       =>'書影が入力されていません',
      'new_flag.required'         =>'新刊か既刊が入力されていません',
      'publish_date.required'     =>'発売日が入力されていません',
      'deadline_date.required'    =>'締切日が入力されていません',
      'emergency_flag.required'   =>'至急品が記入されていません',
      'tohan_id.required'         =>'トーハンの担当が記入されていません',
      'genre_id.required'         =>'ジャンルが記入されていません'   
      ];
     
        $validator = Validator::make($reqdruest->all(), $validate_rule, $error_msg);

        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/book')
                ->withInput()
                ->withErrors($validator);
        }
  
      
      $books = new Book;
      $books->isbn13           = $request->isbn13;
      $books->publisher        = $request->publisher;
      $books->book_title       = $request->book_title;
      $books->price            = $request->price;  
      $books->price_2          = $request->price_2;
      $books->book_description = $request->book_description;
      $books->book_image       = $request->book_image;
      $books->new_flag         = $request->new_flag;
      $books->publish_date     = $request->publish_date;
      $books->deadline_date    = $request->deadline_date;  
      $books->emergency_flag   = $request->emergency_flag;
      $books->tohan_id         = $request->tohan_id;
      $books->genre_id         = $request->genre_id;
      
      $books->save();
      return redirect('book');
    }
    
//bookを消す
    public function book_delete(Book $book) {
        $book->delete();
        return redirect('book');
    }     
    
////order

//order登録ページ       
 
 public function order() {
        $books =Book::orderBy('deadline_date', 'asc')->get();
        $users =User::orderBy('id', 'asc')->get(); 


       return view('order',
        ['books' =>  $books, 'users' => $users]
        );
    }
    
//ポストされてきたuserをインサートする処理
    public function order_insert(Request $request) {
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

}
