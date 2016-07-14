<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postmeta extends Model
{
    //
    public $timestamps = false;
    public $table='postmeta';
    
    public static function addMeta($id,$key,$values) {
        static::insert([
            "post_id"=>$id,
            "key"=>$key,
            "values"=>$values
        ]);
    }
}
