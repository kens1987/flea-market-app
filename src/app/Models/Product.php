<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name','brand_name','price','image','condition','product_description','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function isLikedBy($user){
        return $this->likes->contains('user_id',$user->id);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }
    public function shippingAddress(){
        return $this->hasOne(shippingAddress::class);
    }
    public function purchasers(){
        return $this->belongsToMany(User::class,'payments')->withTimestamps();
    }
}
