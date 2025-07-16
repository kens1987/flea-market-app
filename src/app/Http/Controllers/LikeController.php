<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Product;

class LikeController extends Controller
{
    public function toggleLike($id){
        $product = Product::findOrFail($id);
        $user = auth()->user();

        $like = $product->likes()->where('user_id',$user->id)->first();

        if($like){
            $like->delete();
        }else{
            $product->likes()->create([
                'user_id' => $user->id
            ]);
        }
        return back();
    }
}
