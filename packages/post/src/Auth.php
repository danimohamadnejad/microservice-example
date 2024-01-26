<?php
namespace Soa\Post;
use Http;

class Auth {
    protected static $authenticated_user_id = null; 
    protected static $authenticated_user = null;
    public static function id(){
        return static::$authenticated_user_id;
    }
    public static function user(){
        return static::$authenticated_user;
    }
    public static function check($live = false){
        if(!$live)
         return !is_null(self::$authenticated_user_id);
        $authorization_header = request()->header('authorization');
        if(empty($authorization_header)){
            self::set_authenticated_user(null);
            return false;
        }
        try{
            list($type, $token) = explode(' ', $authorization_header);
            $authentication_check_url = route('soa-user.auth.check');
            $res = Http::withToken($token)->withHeaders([
                'Accept'=>'application/json'
            ])->get($authentication_check_url);
            if($res->status() == 200){
                $data = json_decode($res->body(), true);
                if($data['result']){
                    static::set_authenticated_user($data['data']['user']);
                    return true;
                }
            }
            return false;
        }catch(\Exception $ex){
            /* log exception... */
            self::set_authenticated_user(null);
            return false;
        }
    }
    private static function set_authenticated_user($user = null){
        if($user == null)
        {
            static::set_authenticated_user_id(null);
        }else{
            static::set_authenticated_user_id($user['id']);
        }
        static::$authenticated_user = $user;
    }
    private static function set_authenticated_user_id($id){
        self::$authenticated_user_id = $id;
    }
}