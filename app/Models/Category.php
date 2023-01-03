<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $fillable = [
        'category_name',
        'user_id',
   
    ];
    use SoftDeletes;


    public function user(){
        return $this->hasOne(User::class,'id','user_id'); 
    }
}
