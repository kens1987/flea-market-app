<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index() {
        \Log::info('ProfileController@index accessed by user:'.optional(auth()->user())->id);
        return view ('profile.edit');
    }

    public function __construct() {
        $this->middleware('auth');
    }

    public function update(Request $request) {
        $user = auth()->user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'postcode' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
        ]);
        // if(!$user->profile) {
        //     $user->profile()->create([
        //         'name' => $user->name,
        //         'postcode' => '',
        //         'address' => '',
        //         'building' => '',
        //     ]);
        // }
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image','public');
            $validated['image'] = $imagePath;
        }
        if($user->profile) {
            $user->profile->update($validated);
        }else {
            $user->profile()->create($validated);
        }

        return redirect()->route('product.list',['tab' => 'mylist'])->with('success','プロフィールを更新しました');
    }
}
