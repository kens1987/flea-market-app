<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['amount','payment_method','paid_at','user_id','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
