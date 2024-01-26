<?php
namespace Soa\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PostServiceProvider extends ServiceProvider{
   public function boot(){
      $this->mergeConfigFrom(__DIR__.'/../config.php', 'soa-post');
      config()->set(
         "database.connections.soa-post", soa_post_db_connection(true)
      );
      $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
      $this->load_routes();
      $this->publishes([
        __DIR__.'/../config.php'=>config_path("soa-post.php") 
      ]);
      app('router')->aliasMiddleware('soa-user-auth', \Soa\Post\Http\Middleware\SoaUserAuthMiddleware::class);
   } 
   
   private function load_routes(){
     Route::group(['namespace'=>"Soa\Post\Http\Controllers", 'prefix'=>config('soa-post.routes-prefix')], function(){
      $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
     }); 
   }
}