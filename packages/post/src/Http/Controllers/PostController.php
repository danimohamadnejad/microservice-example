<?php
namespace Soa\Post\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Soa\Post\Traits\ControllerTrait;
use Soa\Post\Http\Requests\PostStoreRequest;
use Soa\Post\Auth;
use Soa\Post\Models\UserReflection;
use Soa\Post\Http\Resources\PostResource;

class PostController extends Controller{
    use ControllerTrait;

    public function store(PostStoreRequest $req){
      $data = $req->validated();
      $user_data = Auth::user();
      $user_reflection = UserReflection::find_by_id_or_create($user_data['id'], $user_data);
      $post = $user_reflection->posts()->create($data);
      return response()->json([
        'result'=>true, 'data'=>['server_time'=>now(), 'post'=>new PostResource($post)]
      ]);
    }
}