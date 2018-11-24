@extends('layouts.app')

@section('content')

 <ul style="list-style:none; margin:auto;">
     <li style="margin-bottom: 40px;"> <a class="btn btn-primary" href="{{url('tohan/')}}" role="button" style="width:300px; height=50px;">トーハン社員登録</a></li>
     <li style="margin-bottom: 40px;"> <a class="btn btn-primary" href="{{url('user/')}}" role="button" style="width:300px; height=50px;">ユーザー登録</a></li>
     <li style="margin-bottom: 40px;"> <a class="btn btn-primary" href="{{url('area/')}}" role="button" style="width:300px; height=50px;">エリア登録</a></a></li>
     <li style="margin-bottom: 40px;"> <a class="btn btn-primary" href="{{url('store_category/')}}" role="button" style="width:300px; height=50px;">ストアカテゴリ登録</a></li>
     <li style="margin-bottom: 40px;"> <a class="btn btn-primary" href="{{url('store/')}}" role="button" style="width:300px; height=50px;">ストア登録</a></li>
     <li style="margin-bottom: 40px;"><a class="btn btn-primary"  href="{{url('genre/')}}" style="width:300px; height=50px;">ジャンル登録</a></li>
     <li style="margin-bottom: 40px;"> <a class="btn btn-primary" href="{{url('books/')}}" style="width:300px; height=50px;">書誌情報登録</a></li>

</ul>
 
 
@endsection
@section('footer')