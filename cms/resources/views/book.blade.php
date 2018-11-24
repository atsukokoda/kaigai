@extends('layouts.app')

@section('content')

<!--新刊情報入力開始途中！-->
    <form action="{{url('book_insert')}}" method="post">
                {{ csrf_field() }}
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>isbn13：</b></label>
            <div class="col-sm-9">    
                <input type="text" name="bansen" value="">
            </div>
        </div>  
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>出版社：</b></label>
            <div class="col-sm-9">    
        　　　　<input type="number" name="book_code" value="">
        　　</div>
        </div>  
        <div class="form-group"> 
            <p class="col-sm-3 control-label"><b>ストアカテゴリ:</b></p>
             @foreach($book_categories as $book_category)
                <label class="radio-inline">
                <input type="radio" name="book_category" value="{{$book_category->id}}">{{$book_category->book_category}}
                </label>
             @endforeach
        </div>
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>Air/Sea：</b></label>
            <div class="col-sm-9">    
                <input type="text" name="air_sea" value="air">
            </div>
        </div> 
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>店舗名：</b></label>
            <div class="col-sm-9">    
                <input type="text" name="book_name" value="">
            </div>
        </div>
        <div class="form-group"> 
            <p class="col-sm-3 control-label"><b>トーハン担当者:</b></p>
            @foreach($tohans as $tohan)
            　<label class="radio-inline">
            　　<input type="radio" name="tohan_id" value="{{$tohan->id}}">{{$tohan->staff_name}}
            　</label>
            @endforeach
        </div>
        <div class="form-group"> 
            <p class="col-sm-3 control-label"><b>ユーザー名:</b></p>
            @foreach($users as $user)
            　<label class="radio-inline">
            　　<input type="radio" name="user_id" value="{{$user->id}}">{{$user->user_name}}
            　</label>
            @endforeach
        </div>
        <div class="form-group">
            <div class="col-sm-offset-6 col-sm-6 text-left">
                　<button type="submit" >送信</button>
            </div>
        </div>
    </form>
<!--ストア情報入力終了-->    

<!--登録リスト開始-->
    
    <div style="margin-top:60px;">
        @if (count($books) > 0)
        <table class="table table-striped">
            <tr>
                <th>書店ID</th>
                <th>番線</th>
                <th>書店コード</th>
                <th>書店カテゴリ</th>
                <th>書店名</th>
                <th>AIR/SEA</th>
                <th>トーハン担当者</th>
                <th>ユーザー名</th>
                <th>削除</th>
            </tr>
     
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->bansen}}</td>
                <td>{{ $book->book_code}}</td>
                <td>{{ $book->book_category_1->book_category}}</td>  
                <td>{{ $book->book_name }}</td>
                <td>{{ $book->air_sea}}</td>
                <td>{{ $book->user->user_name }}</td>
                <td>{{ $book->tohan->staff_name}}</td>
                
                
                <td>
                    <form action="{{url('book/delete/'.$book->id)}}" method="post">
                        {{ csrf_field() }}
                　　　<button type="submit">削除する</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        @endif
    </div>
 <!--登録リスト終了-->   



   
@endsection
@section('footer')
