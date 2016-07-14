<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    //
    protected $dateFormat = 'U';
    

    public function postmeta() {
        return $this->hasMany('App\Postmeta','post_id','id');
    }
    
    public static function addreads($id,$num = 1) {
        $post=static::find($id);
        $reads=$post->postmeta()->where("key","reads")->first();
        if($reads){
            $reads->values++;
        }  else {
            $reads=new Postmeta();
            $reads->post_id=$id;
            $reads->key="reads";
            $reads->values=1;
        }
        $reads->save();
    }

}
