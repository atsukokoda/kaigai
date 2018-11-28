@extends('layouts.app')

@section('content')

<!--新刊情報入力開始！-->

   @if(count($errors)> 0)
        <p>入力項目を確認してください</p>
    @endif
    <form action="{{url('book_insert')}}" method="post" class="form-horizontal">
                {{ csrf_field() }}
        <div class="form-group">   
              
            <label class="col-sm-3 control-label"><b>isbn13：</b></label>
                <div class="col-sm-9">    
                    <input type="text" name="isbn13" value="">
                      @if($errors->has('isbn13'))
                        <p style="color:#CC0033">エラー:{{$errors->first('isbn13')}}</p>
                      @endif
                </div>
        </div>
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>出版社：</b></label>
                <div class="col-sm-9">    
                    <input type="text" name="publisher" value="">
                      @if($errors->has('publisher'))
                        <p style="color:#CC0033">エラー:{{$errors->first('publisher')}}</p>
                      @endif

                </div>
        </div>
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>書名：</b></label>
                <div class="col-sm-9">    
                    <input type="text" name="book_title" value="">
                     @if($errors->has('book_title'))
                        <p style="color:#CC0033">エラー:{{$errors->first('book_title')}}</p>
                     @endif
                </div>
        </div>         
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>価格：</b></label>
                <div class="col-sm-9">    
                    <input type="text" name="price" value="">
                     @if($errors->has('price'))
                        <p style="color:#CC0033">エラー:{{$errors->first('price')}}</p>
                     @endif
                </div>
        </div>        
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>予価：</b></label>
                <div class="col-sm-9">    
                    <input type="number" name="price_2" value="">
                    @if($errors->has('price_2'))
                        <p style="color:#CC0033">エラー:{{$errors->first('price_2')}}</p>
                    @endif
                </div>  
        </div>        
                
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>書誌情報：</b></label>
                <div class="col-sm-9">    
                    <input type="text" name="book_description" value="">
                    @if($errors->has('book_description'))
                        <p style="color:#CC0033">エラー:{{$errors->first('book_description')}}</p>
                    @endif
                </div>
        </div>        
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>画像：</b></label>
                <div class="col-sm-9">    
                    <input type="text" name="book_image" value="">
                    @if($errors->has('book_image'))
                        <p style="color:#CC0033">エラー:{{$errors->first('book_image')}}</p>
                    @endif
                </div>
        </div>
         <div class="form-group">    
            <label class="col-sm-3 control-label"><b>新刊：</b></label>
                <div class="col-sm-9">    
                    <label class="radio-inline"><input type="radio" name="new_flag" value=0 @if(old('new_flag')=="0") checked @endif>新刊</label>
                    <label class="radio-inline" style="color:red;"><input type="radio" name="new_flag" value=1>既刊</label>
                     @if($errors->has('new_flag'))
                        <p style="color:#CC0033">エラー:{{$errors->first('new_flag')}}</p>
                    @endif
                </div>
        </div>         
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>発売日：</b></label>
                <div class="col-sm-9">    
                    <input type="date" name="publish_date" value="">
                    @if($errors->has('publish_date'))
                        <p style="color:#CC0033">エラー:{{$errors->first('publish_date')}}</p>
                    @endif
                </div>
        </div>        
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>締切日：</b></label>
                <div class="col-sm-9">    
                    <input type="date" name="deadline_date" value="">
                    @if($errors->has('deadline_date'))
                        <p style="color:#CC0033">エラー:{{$errors->first('deadline_date')}}</p>
                    @endif
                </div>
        </div>
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>緊急商品：</b></label>
                <div class="col-sm-9">    
                    
                    <label class="radio-inline"><input type="radio" name="emergency_flag" value=0 @if(old('emergency_flag')=="0") checked @endif>通常</label>
                    <label class="radio-inline" style="color:red;"><input type="radio" name="emergency_flag" value=1 @if(old('emergency_flag')=="1") checked @endif>至急</label>
                    @if($errors->has('emergency_flag'))
                        <p style="color:#CC0033">エラー:{{$errors->first('emergency_flag')}}</p>
                    @endif
                </div>
        </div>       

        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>トーハン担当：</b></label>
                <div class="col-sm-9">    
                       @foreach($tohans as $tohan)
                        <label class="radio-inline">
                         <input type="radio" name="tohan_id" value="{{$tohan->id}}">{{$tohan->staff_name}}
                        </label>
                       @endforeach
                       @if($errors->has('tohan_id'))
                        　<p style="color:#CC0033">エラー:{{$errors->first('tohan_id')}}</p>
                    　　@endif
                       
                       
                </div>
        </div>
   
        <div class="form-group">    
            <label class="col-sm-3 control-label"><b>ジャンル：</b></label>
            <div class="col-sm-9">    
                   @foreach($genres as $genre)
                    <label class="radio-inline">
                     <input type="radio" name="genre_id" value="{{$genre->id}}">{{$genre->genre_name}}
                    </label>
                   @endforeach
                   @if($errors->has('genre_id'))
                    　<p style="color:#CC0033">エラー:{{$errors->first('genre_id')}}</p>
                   @endif
            </div>
        </div> 
     
        <div class="form-group">
            <div class="col-sm-offset-6 col-sm-6 text-left">
                　<button type="submit" >送信</button>
            </div>
        </div>
    </form>
<!--新刊情報入力終了！-->





   
@endsection
@section('footer')
