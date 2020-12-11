<?php

namespace App\Http\Controllers;

use App\Posts\Models\Comment;
use App\Posts\Models\Gender;
use App\Posts\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$post = Post::orderBy('id', 'Desc')->paginate(2);

        $post = Post::where('user_id', '=', Auth::user()->id)->paginate(3);

        return view('post.index', compact('post'));
    }

    public function searchIndex(Request $request)
    {

        $post = Post::where([['user_id', '<>', Auth::user()->id],['visibility', '=', 'public'],['title', 'LIKE', '%' . $request->search . '%']])->paginate(3);

        return view('post.index', compact('post'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::get();
        return view('post.create', compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|max:50',
            'written'       => 'required',
            'review'        => 'required|max:400',
            'visibility'    => 'required|in:public,draft',
        ]);

        if ($request->file('image')) {

            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|dimensions:max_width=900,max_height=600',
            ]);

            $path = Storage::disk('public')->put('images', $request->file('image'));
            $url = asset($path);
        }else{
            $url = null;
        }

        $post               = new Post;
        $post->title        = $request->title;
        $post->written      = $request->written;
        $post->review       = $request->review;
        $post->visibility   = $request->visibility;
        $post->image        = $url;
        $post->user_id      = Auth::user()->id;
        $post->gender_id    = $request->gender_id;
        $post->save();

        return redirect()->route('post.create')->with('status_success', 'Post saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $comment = Comment::where('post_id', '=', $post->id)->get();
        return view('post.view', compact('post', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $genders = Gender::get();
        return view('post.edit', compact('post','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $request->validate([
            'title'         => 'required|max:50',
            'written'       => 'required',
            'review'        => 'required|max:250',
            'visibility'    => 'required|in:public,draft',
        ]);

        if ($request->file('image')) {

            $request->validate([
                'image' => 'mimes:jpeg,jpg,png|dimensions:max_width=900,max_height=6005',
            ]);

            $path = Storage::disk('public')->put('images', $request->file('image'));
            $url = asset($path);
        }else{
            $url = $post->image;
        }

        $userID = $post->user_id;

        $post->title        = $request->title;
        $post->written      = $request->written;
        $post->review       = $request->review;
        $post->visibility   = $request->visibility;
        $post->image        = $url;
        $post->user_id      = $userID;
        $post->gender_id    = $request->gender_id;
        $post->save();

        return redirect()->route('post.index')->with('status_success', 'Post saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->with('status_success', 'Post successfully removed');
    }
}
