<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    //
    protected $dateFormat = 'U';
    
    public static function getList(){
        $data=static::orderBy('id', 'desc')->take(3)->get()->toArray();
        sort($data);
        return ($data);
    }
}
