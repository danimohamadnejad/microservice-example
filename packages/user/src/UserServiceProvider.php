<?php
namespace Soa\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Soa\User\Models\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;

class UserServiceProvider extends ServiceProvider{
   public function boot(){
      $this->mergeConfigFrom(__DIR__.'/../config.php', 'soa-user');
      config()->set(
         "database.connections.soa-user", soa_user_db_connection(true)
      );
      $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
      $this->load_routes();
      $this->publishes([
        __DIR__.'/../config.php'=>config_path("soa-user.php") 
      ]);
      Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
   } 
   
   private function load_routes(){
     Route::group(['namespace'=>"Soa\User\Http\Controllers", 'prefix'=>config('soa-user.routes-prefix'), 'as'=>'soa-user.'], function(){
      $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
     }); 
   }
}