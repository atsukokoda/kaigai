@extends('layouts.app')

@section('content')

<?php

use App\Comment;
use App\User;
use App\Rental;
use App\Category;
use App\Category_genre;
use App\Tag;

?>
<div class=row>
 <div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">    
    
    <div class="row">
        <div class="col-sm-3"　style="background:#CCC;height:200px;" style="text-align:center;">
            <img src="{{ $book["BookImage"]}}"></img>
        </div>
        <div class="col-sm-9"　style="background:#CCC;height:200px;">
            <div style="margin-left:40px;">
                <h3>{{ $book->BookTitle }}</h3>
                <p>{{ $book->BookAuthor }}</p>
                <p>{{ $book->isbn10 }}/&nbsp;{{ $book->isbn13 }}</p>
            </div>    
        </div>
    </div>  
    <div style="margin-left:40px;">
        <div class="row">
            <p class="col-xs-12">書籍の内容</p>
            <p class="col-xs-12">{{ $book->BookDiscription}}</p>
        </div>
    </div>
    
    <table style="margin-left:20px;">
        <tr>
            <th>カテゴリ</th>
            <td>
                 <ul style="list-style:none; justify-content:between;">
                @foreach($category_names as $category_name)
                   <li style="display: inline-block;"><a href="{{url('category_genre_page/'.Category_genre::find($category_name["category_genre"])->id)}}">{{Category_genre::find($category_name["category_genre"])->category_genrename}}&nbsp;&nbsp</a></li>
                 @endforeach 
                  <ul>
            </td>
        </tr>
        <tr>
            <th>ジャンル</th>
            <td>
                <ul style="list-style:none; justify-content:between;">
                @foreach($category_names as $category_name)
                 <li style="display: inline-block;">
                     <a href="{{url('category_page/'.$category_name["id"])}}">
                         
                         <p>{{$category_name["category_name"]}}&nbsp;&nbsp</p>
                         
                     </a>
                </li>
                 @endforeach 
                </ul>
            </td>
        </tr>    
        
        <tr>
           <th>タグ</th>
            <td>
                <ul style="list-style:none; justify-content:between;">
             
                 <li style="display: inline-block;">
                   
                  
                        @foreach ($book->tags as $tag) 
                        <a  class="tag" href="{{url('tag_page/'.$tag->id)}}">{{ $tag->tags }}</a>
                        @endforeach
                   
                 </li>
              
                </ul>
            </td>
        </tr>
    </table>       

<!-- 本を新規登録してからオススメする -->  
<div class="row" style="margin-bottom:40px;">
<div class="col-sm-6 text-center">       
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#sampleModal1" style="width:300px;">
    	  おすすめコメントを入力する
        </button>
</div>
<!-- コメント入力モーダル -->
<div class="modal fade" id="sampleModal1" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
    <!--モーダルヘッダー2    -->
        	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        	    <h3 class="modal-title">{{ $book->BookTitle }}</h3>
        	</div>
        			    
    <!--モーダルボディー2    -->    			    
        	<div class="modal-body" style="padding:43px;">
        		<h4 style="text-decoration:underline; text-decoration-color:#FFFF00;">コメントを入力してください</h4>
  
         <!--form開始   -->     
              <form action="{{url('gsbook')}}" method="post" class="horizontal">
                {{ csrf_field() }}
                    <div class="form-group"> 
                      <p><b>おすすめしたい人</b></p>
                      <div class="block-contents">
                          @if(count($keys)>0)
                          @foreach($keys as $key)
                            <label class="radio-inline"><input type ="radio" name="key" value="{{$key->id}}">{{$key->key}}</label>
                          @endforeach
                          @endif
         　　　　　　　　　　</div>    
    　　　　　　　　　　　　</div>  
                     <div class="form-group">
                      <p><b>評価</b></p> 
                        <div class="evaluation center">
                            <input id="star1" type="radio" name="evaluation" value="5" />
                            <label for="star1"class="radio-inline"><span class="text">最高</span>★</label>
                            <input id="star2" type="radio" name="evaluation" value="4" />
                            <label for="star2"class="radio-inline"><span class="text">良い</span>★</label>
                            <input id="star3" type="radio" name="evaluation" value="3" />
                            <label for="star3"class="radio-inline"><span class="text">普通</span>★</label>
                            <input id="star4" type="radio" name="evaluation" value="2" />
                            <label for="star4"class="radio-inline"><span class="text">悪い</span>★</label>
                            <input id="star5" type="radio" name="evaluation" value="1" />
                            <label for="star5"class="radio-inline"><span class="text">最悪</span>★</label>
                        </div>
                    </div> 
                    <div class="form-group">  
                          <label>おすすめポイント</label>
                          <div class="center">
                          <textarea  rows="5" class="form-control" name="comment_text" placeholder="例）++の勉強をしたい人におすすめ" autofocu></textarea>
                          </div>
                    </div>      
                    
    
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9 text-right">
                       <input type="hidden" name="owner_id" value="{{ $owner->id }}"></input>
                      <input type="hidden" name="book_id" value="{{ $book->id }}"></input>
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                      
                      <button type="submit" class="btn btn-primary"/ value="">投稿する</button>
                  </div>
                </div>
     
              </form>
            </div>
      <!--モーダルフッター    --> 		  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
      </div>
      
          		
        </div>
    　</div>
    </div>

    <div class="col-sm-6 text-center"> 
        	 <a href="{{url('rental/'.$book->id)}}">
        	     <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#sampleModal2" style="width:300px;">本をレンタルする</button>
            </a>
    </div>
</div>




        @if(isset($comments)>0)
         @foreach($comments as $comment)
          
           <div class="panel panel-info" style="margin-left:20px;">
        	 <div class="panel-heading" style=text-align>
        	  <ul style="list-style:none;  vertical-align: bottom;" class="sample">
               <li><span><img class="avater img-circle" src="{{$comment->user->avater}}" style="inline"></img></span></li>
        	   <li><a href="{{url('user_search_page/'.$comment->user->id)}}"><p>{{$comment->user->name}}</p></a>
              </ul>
        	 </div>
        	 <div class="panel-body">
                 <p>{{$comment->keys->key}}</p>
                  @if(($comment->evaluation) == 1)
                    <div class="star-rating-icon">
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                   @endif 
                   @if(($comment->evaluation) == 2)
                    <div class="star-rating-icon">
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                      <span class="glyphicon glyphicon-star-empty"></span>
                    </div>
                    @endif 
                    @if(($comment->evaluation) == 3)
                        <div class="star-rating-icon">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                    @endif 
                    @if(($comment->eevaluation) == 4)
                        <div class="star-rating-icon">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star-empty"></span>
                        </div>
                    @endif
                    @if(($comment->evaluation) == 5)
                        <div class="star-rating-icon">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                        </div>
                    @endif
                    <p class="col-xs-12"><a href="{{url('book_comments'.$comment->id)}}">{{$comment->comment_text}}</a></p>
        	    </div>
           </div>  
           @endforeach
        @endif


 
                 
                 
  </div>
</div> 

</div>

 @endsection
        
                    
                    




