@extends('layouts.app')

@section('content')
    <form action="{{url('tohan_insert')}}" method="post">
                {{ csrf_field() }}
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>社員名：</b></label>
            <div class="col-sm-9">    
                <input type="text" name="staff_name">
            </div>
        </div>
        
        <div class="form-group">
            　　<div class="col-sm-offset-6 col-sm-6 text-left">
                　<button type="submit" >送信</button>
                </div>
        </div>
    </form>
    
    <div style="margin-top:60px;">
        @if (count($tohans) > 0)
        <table class="table table-striped">
            <tr>
                <th>トーハンID</th>
                <th>トーハンスタッフ名</th>
                <th>削除</th>
            </tr>
     
        <tbody>
            @foreach ($tohans as $tohan)
            <tr>
                <td>{{ $tohan->id }}</td>
                <td>{{ $tohan->staff_name}}</td>
                <td>
                    <form action="{{url('tohan/delete/'.$tohan->id)}}" method="post">
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
    </div> 
@endsection
@section('footer')