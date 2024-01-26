<?php
namespace Soa\Post\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Soa\Post\Models\UserReflection;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $connection = 'soa-post';
    public function user_reflection(){
        return $this->belongsTo(UserReflection::class, 'user_id');
    }
}
