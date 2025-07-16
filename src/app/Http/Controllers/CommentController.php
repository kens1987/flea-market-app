<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Product;

class CommentController extends Controller
{
    public function store(CommentRequest $request,$productId)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'comment' => $request->comment,
        ]);
        return back()->with('success','コメントを投稿しました');
    }
}
