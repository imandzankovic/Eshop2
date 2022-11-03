<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderModel extends Model
{
    public function myproduct(){
        return $this->hasMany('App\productModel','id','product_id');
    }
}
