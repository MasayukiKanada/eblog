<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $posts = Post::where('admin_id', Auth::id())->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadImageRequest $request)
    {
        $request->validate([
            'header' => ['required'],
            'body' => ['required'],
            'for_user' => ['required'],
            'is_visible' => ['required'],
            'posted_at' => ['required'],
        ]);

        $imageFile = $request->thumnail;
        if(!is_null($imageFile))
        {
            $fileNameToStore = ImageService::upload($imageFile, 'posts');
        }

        Post::create([
            'admin_id' => Auth::id(),
            'header' => $request->header,
            'body' => $request->body,
            'thumnail' => $fileNameToStore,
            'for_user' => $request->for_user,
            'is_visible' => $request->is_visible,
            'posted_at' => $request->posted_at,
        ]);

        return redirect()
        ->route('admin.posts.index')
        ->with('message', '投稿が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadImageRequest $request, $id)
    {
        $imageFile = $request->thumnail;
        if(!is_null($imageFile) && $imageFile->isValid())
        {
            $fileNameToStore = ImageService::upload($imageFile, 'posts');
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
