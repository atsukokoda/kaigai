@extends('layouts.app')

@section('content')
    <form action="{{url('category')}}" method="post">
                {{ csrf_field() }}
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>カテゴリー：</b></label>
            <div class="col-sm-9">    
                <input type="text" name="store_category">
            </div>
        </div>
        <div class="form-group"> 
            <p class="col-sm-3 control-label"><b>ジャンル:</b></p>
             @foreach($areas as $area)
            <label class="radio-inline">
            <input type="radio" name="area_id" value="{{$area->id}}">{{$area->area_name}}
            </label>
            @endforeach
            
        </div>
        <div class="form-group">
            　　<div class="col-sm-offset-6 col-sm-6 text-left">
                　<button type="submit" >送信</button>
                </div>
        </div>
        
    　　<div>
    　　<a href="{{url('area')}}">カテゴリジャンル登録ページへ</a>
    　　</div>
       
    </form>
    
    <div style="margin-top:60px;">
        @if (count($categories) > 0)
        <table class="table table-striped">
            <tr>
                <th>カテゴリーID</th>
                <th>カテゴリー名</th>
                <th>エリア</th>
                <th>削除</th>
            </tr>
     
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>リレーション組んでから</td>
                    <td>{{ $category->category_name }}</td>
                    
                
                    <td>
                        <form action="{{url('category/'.$category->id)}}" method="post">
                            {{ csrf_field() }}
                    　　<button type="submit">変更</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    </div> 
@endsection
@section('footer')