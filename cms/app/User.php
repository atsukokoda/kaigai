<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function tohan(){
              return $this->belongsTo('App\Tohan','tohan_id','id');
            // return $this->belongsTo('App\User', '外部キーのカラム名', '親元のid扱いのカラム名');
}   


}