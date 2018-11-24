@extends('layouts.app')

@section('content')
    <form action="{{url('genre_insert')}}" method="post">
                {{ csrf_field() }}
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>ジャンル：</b></label>
            <div class="col-sm-9">    
                <input type="text" name="genre_name">
            </div>
        </div>
        
        <div class="form-group">
            　　<div class="col-sm-offset-6 col-sm-6 text-left">
                　<button type="submit" >送信</button>
                </div>
        </div>
    </form>
    
    <div style="margin-top:60px;">
        @if (count($genres) > 0)
        <table class="table table-striped">
            <tr>
                <th>ジャンルID</th>
                <th>ジャンル名</th>
                <th>削除</th>
            </tr>
     
        <tbody>
            @foreach ($genres as $genre)
            <tr>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->genre_name}}</td>
                <td>
                    <form action="{{url('genre/delete/'.$genre->id)}}" method="post">
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

@endsection
@section('footer')