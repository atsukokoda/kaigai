<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_category extends Model
{
    public function area(){
              return $this->belongsTo('App\Area','area_id','id');
            // return $this->belongsTo('App\User', '外部キーのカラム名', '親元のid扱いのカラム名');
    }
}