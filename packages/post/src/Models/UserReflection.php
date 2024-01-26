<?php
namespace Soa\Post\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soa\Post\Models\Post;

class UserReflection extends Model
{
    use HasFactory;
    protected $guarded = [
    ];
    protected $casts = [
     'data'=>'json'
    ];
    protected $connection = 'soa-post';
    public $incrementing = false;
    protected $keyType = 'string';
    
    public static function find_by_id_or_create($id, array $data){
      $user = static::find($id);
      if($user)
       return $user;
      return static::create([
       'id'=>$id, 'data'=>$data, 
      ]);  
    }
    public function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }
}
