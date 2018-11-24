@extends('layouts.app')

@section('content')
    <form action="{{url('area_insert')}}" method="post">
                {{ csrf_field() }}
        <div class="form-group">             
            <label class="col-sm-3 control-label"><b>エリア：</b></label>
            <div class="col-sm-9">    
                <input type="text" name="area_name">
            </div>
        </div>
        
        <div class="form-group">
            　　<div class="col-sm-offset-6 col-sm-6 text-left">
                　<button type="submit" >送信</button>
                </div>
        </div>
    </form>
    
    <div style="margin-top:60px;">
        @if (count($areas) > 0)
        <table class="table table-striped">
            <tr>
                <th>エリアID</th>
                <th>エリア名</th>
                <th>削除</th>
            </tr>
     
        <tbody>
            @foreach ($areas as $area)
            <tr>
                <td>{{ $area->id }}</td>
                <td>{{ $area->area_name}}</td>
                <td>
                    <form action="{{url('area/delete/'.$area->id)}}" method="post">
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