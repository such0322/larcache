<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Redis as R;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    const QUIT=false;
    const LIMIT=10000000;

        public static function check_token($token){
        return R::HGET("login:",$token);
    }
    
    public static function update_token($token,$user,$item=null){
        $timestamp=  time();
        R::HSET("login:",$token,$user);
        R::ZADD("recent;",$token,$timestamp);
        if($item){
            R::ZADD("viewed:".$token,$item,$timestamp);
            R::ZREMRANGEBYRANK("viewed:".$token,0,-26);
        }
    }
    
    public static function clean_session(){
        while(!self::QUIT){
            $size=R::ZCARD("recent:");
            if($size<=self::LIMIT){
                sleep(1);
                continue;
            }
            $end_index=  min($size-self::LIMIT,100);
            $tokens=R::ZRANGE("recent:",0,$end_index-1);
            
            $session_keys=[];
            foreach($tokens as $token){
                $session_keys[]="viewed:".$token;
            }
            R::DELETE($session_keys);
            R::HDEL("login:",$tokens);
            R::ZREM("recent:",$tokens);
        }
        
    }
}
