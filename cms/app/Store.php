<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    public function user(){
              return $this->belongsTo('App\User','user_id','id');
            // return $this->belongsTo('App\User', '外部キーのカラム名', '親元のid扱いのカラム名');
    }
    public function tohan(){
          return $this->belongsTo('App\Tohan','tohan_id','id');
        // return $this->belongsTo('App\User', '外部キーのカラム名', '親元のid扱いのカラム名'); 
    }
    
       public function store_category_1(){
              return $this->belongsTo('App\Store_category','store_category','id');
            // return $this->belongsTo('App\User', '外部キーのカラム名', '親元のid扱いのカラム名');
    }
}