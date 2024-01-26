<?php
namespace Soa\User\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Soa\User\Traits\ControllerTrait;
use Soa\User\Http\Requests\LoginRequest;
use Auth;
use Str;
use Soa\User\Http\Resources\UserResource;


class UserController extends Controller{
    use ControllerTrait;
    /** 
     * @bodyParam mobile string required
     * @bodyParam password string required 
     * @header Accept application/json 
     * 
    */
    public function login(LoginRequest $req){
      $data = $req->validated();
      if(Auth::attempt($data)){
        $token = auth()->user()->createToken(Str::random());
        return response()->json([
            'data'=>['user'=>auth()->user(), 'token'=>$token->plainTextToken], 'server_time'=>now(),
        ]);
      }
      abort(500);
    }
    /**
     * @header Accept application/json
     * @authenticated
     * 
    */
    public function logout(Request $req){
        if(auth()->user()->tokens()->delete()){
         return response()->json([
            'result'=>true, 'msg'=>'tokens revoked'
         ]);   
        }
        abort(500);
    }
    /**
     * @header Accept application/json
     * @authenticated
     * 
    */
    public function check_authentication(){
      return response()->json([
        'result'=>true, 
        'server_time'=>now(),
        'data'=>[
          'user'=>new UserResource(auth()->user())
        ]
      ]);
    }
}