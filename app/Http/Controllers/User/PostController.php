<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth:users');
    }

    public function index(Request $request)
    {
        $posts = Post::where([
            ['for_user', '=', '0'],
            ['is_visible', '=', '1'],
        ])
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate($request->pagination ?? '10');

        return view('user.posts.index', compact('posts'));
    }

    public function limited(Request $request)
    {
        $posts = Post::where([
            ['for_user', '=', '1'],
            ['is_visible', '=', '1'],
        ])
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate($request->pagination ?? '10');

        return view('user.posts.limited', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('user.posts.show', compact('post'));
    }
}
