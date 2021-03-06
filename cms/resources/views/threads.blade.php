@extends('layouts.app')

@section('content')
<?php

use App\User;
use App\Category;

?>
<div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-warning">
    	<div class="panel-heading">
    		<h3 class="panel-title inline">
    			<a data-toggle="collapse" href="#sampleCollapseListGroup1">
    				スレッドを投稿する
    			</a>
    		</h3>
    	</div>
    
    		
        <form action="{{url('threads')}}" method="post">
            {{ csrf_field() }}
    		<div id="sampleCollapseListGroup1" class="panel-collapse collapse in">
                    
                    <div class="row">
                        <div class="form-group">  
                            <div class="col-sm-3 "> 
                                <label class="control-label"><b>スレッド名：</b></label>
                            </div>
                            <div class="col-sm-6">    
                                <input type="text" name="thread_sub" class="col-xs-6" placeholder="件名を入力してください。">
                            </div>
                        </div> 
                    </div>
                    
                    <div class="row">
                        <div class="form-group">  
                            <div class="col-sm-3 ">
                                <label class="control-label"><b>内容：</b></label>
                            </div>
                            <div class="col-sm-6">    
        			               <!--<input type="text"  placeholder="質問内容を記入してください。"  rows="3" class="form-control" id="InputTextarea"　name="thread_body" ></input>-->
                            <input type="text" name="thread_body" class="form-control" placeholder="質問内容を記入してください。"  rows="3" id="InputTextarea" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group">   
                              <div class="col-sm-3 ">
                                  <label class="control-label"><b>カテゴリー:</b></label>
                              </div>
                              <div class="col-sm-9">
                                  @if(isset($genreCategories))
                                  @if(count($genreCategories)>0)
                                  <?php $i=0 ?>
                                        @foreach($genreCategories as $genre => $categories)
                                      
                                        <div  id="accordion"　class="col-sm-9">
                                                @if(count($categories)>0)   
                                                <a data-toggle="collapse" data-parent="#accordion" href="#sample{{$i}}">{{$genre}}</a>
                                                @endif    
                                                <div class="collapsing collapse" id="sample{{$i}}">
                                                	@foreach($categories as $category)
                                	                 <input type="radio" name="category" value="{{$category["id"]}}">{{$category["category_name"]}}</input>
                                                    @endforeach
                                                </div>
                                        </div>  
                                        <?php $i = $i + 1 ?>
                                        @endforeach
                                  @endif
                                  @endif
                              </div>      
                        </div>  
    	            </div>
    	            <div class="panel-footer inline">
    	                <button type="submit">スレッドを投稿する</button>
    	           </div> 
    	   </div>
    	</form>
      </div>
    </div>


<!--スレッド一覧表示始まり-->

 <div class="col-sm-offset-2 col-sm-8"> 

    <h3>スレッド一覧</h3>    
        @if (count($threads) > 0)
        <table class="table table-striped">
            <tr>
                <th>教えてほしい人！</th>　
                <th>スレッド名</th>
                <th>カテゴリー</th>

            </tr>
     
            <tbody>
                @foreach ($threads as $thread)
                <tr>
                    <td>{{User::find($thread->user_name)->name }}</td>
                    <td><a href="{{url('thread/'.$thread->id)}}">{{ $thread->thread_sub }}</a></td>
                    <td>{{Category::find($thread->category_id)->category_name}}</td>
                 </tr>
                @endforeach
            </tbody>
        </table>
        @endif
</div>

<!--スレッド一覧表示終わり-->   
@endsection