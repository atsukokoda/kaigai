@extends('layouts.app')

@section('content')

<!--ストア情報入力開始-->
    <form action="{{url('store_insert')}}" method="post">
                {{ csrf_field() }}
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>番線名：</b></label>
            <div class="col-sm-9">    
                <input type="text" name="bansen" value="">
            </div>
        </div>  
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>書店コード：</b></label>
            <div class="col-sm-9">    
        　　　　<input type="number" name="store_code" value="">
        　　</div>
        </div>  
        <div class="form-group"> 
            <p class="col-sm-3 control-label"><b>ストアカテゴリ:</b></p>
             @foreach($store_categories as $store_category)
                <label class="radio-inline">
                <input type="radio" name="store_category" value="{{$store_category->id}}">{{$store_category->store_category}}
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
                <input type="text" name="store_name" value="">
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
        @if (count($stores) > 0)
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
            @foreach ($stores as $store)
            <tr>
                <td>{{ $store->id }}</td>
                <td>{{ $store->bansen}}</td>
                <td>{{ $store->store_code}}</td>
                <td>{{ $store->store_category_1->store_category}}</td>  
                <td>{{ $store->store_name }}</td>
                <td>{{ $store->air_sea}}</td>
                <td>{{ $store->user->user_name }}</td>
                <td>{{ $store->tohan->staff_name}}</td>
                
                
                <td>
                    <form action="{{url('store/delete/'.$store->id)}}" method="post">
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
