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


    public function index(Request $request)
    {
        $posts = Post::where('admin_id', Auth::id())
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate($request->pagination ?? '10');

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
        ->with(['message' => '投稿が完了しました。',
        'status' => 'info']);
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
        $request->validate([
            'header' => ['required'],
            'body' => ['required'],
            'for_user' => ['required'],
            'is_visible' => ['required'],
            'posted_at' => ['required'],
        ]);

        $imageFile = $request->thumnail;
        if(!is_null($imageFile) && $imageFile->isValid())
        {
            $fileNameToStore = ImageService::upload($imageFile, 'posts');
        }

        $post = Post::findOrFail($id);
        $post->header = $request->header;
        $post->body = $request->body;
        $post->thumnail = $fileNameToStore;
        $post->for_user = $request->for_user;
        $post->is_visible = $request->is_visible;
        $post->posted_at = $request->posted_at;

        $post->save();

        return redirect()
        ->route('admin.posts.index')
        ->with(['message' => '投稿内容を更新しました。',
        'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect()
        ->route('admin.posts.index')
        ->with(['message' => '投稿を削除しました。',
        'status' => 'alert']);
    }

    public function trashedPostsIndex(Request $request)
    {
        $trashedPosts = Post::onlyTrashed()
        ->searchKeyword($request->keyword)
        ->sortOrder($request->sort)
        ->paginate($request->pagination ?? '10');

        return view('admin.trashed-posts.index', compact('trashedPosts'));
    }

    public function trashedPostsRestore($id)
    {
        Post::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.trashed-posts.index')
        ->with(['message' => '投稿を復元しました。',
        'status' => 'info']);
    }

    public function trashedPostsDestroy($id)
    {
        Post::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.trashed-posts.index')
        ->with(['message' => '投稿を完全に削除しました。',
        'status' => 'alert']);
    }
}
