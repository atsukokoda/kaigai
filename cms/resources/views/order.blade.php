@extends('layouts.app')

@section('content')

  

<!--商品情報開始-->
    
    <div style="margin-top:60px;">
        @if (count($books) > 0)
        <table class="table table-striped">
            <tr>
                <th>至急</th>
                <th>商品ID</th>
                <th>締切日</th>
                <th>出版社</th>
                <th>書名</th>
                <th>書店コード</th>

            </tr>
     
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->emergency_flag}}</td>
                <td>{{ $book->id}}</td>
                <td>{{ $book->deadline_date}}</td>
                <td>{{ $book->publisher}}</td>  
                <td>{{ $book->book_title}}</td>
                <td>
                    <form action="{{url('store_book_insert')}}" method="post"> 
                        {{ csrf_field() }}
                    <input type="number" name="order_number" value=""/>
                    <b>冊</b>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        @endif
    </div>
 <!--商品情報終了-->   



   
@endsection
@section('footer')
