@extends('layouts.app')

@section('content')
    <form action="{{url('user_insert')}}" method="post">
                {{ csrf_field() }}
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>ユーザー名：</b></label>
            <div class="col-sm-9">    
                <input type="text" name="user_name">
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
            　　<div class="col-sm-offset-6 col-sm-6 text-left">
                　<button type="submit" >送信</button>
                </div>
        </div>
        

       
    </form>
    
    <div style="margin-top:60px;">
        @if (count($users) > 0)
        <table class="table table-striped">
            <tr>
                <th>ユーザーID</th>
                <th>ユーザー名</th>
                <th>トーハンNO.</th>
                <th>削除</th>
            </tr>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id }}</td>
                    <td>{{$user->user_name}}</td>
                    <td>{{$user->tohan_id}}</td>
                    <td>
                        <form action="{{url('user/delete/'.$user->id)}}" method="post">
                            {{ csrf_field() }}
                    　　　　<button type="submit">削除</button>
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
