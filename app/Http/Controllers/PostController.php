<?php

namespace App\Http\Controllers;

use App\Posts\Models\Gender;
use App\Posts\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'tittle' => 'required|max:50',
            'written' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {

                $validated = $request->validate([
                    'image' => 'mimes:jpeg,jpg,png|max:1014',
                ]);

                $extension = $request->image->extension();
                $imageName = time().'.'.$extension;
                $request['image'] = $imageName;
                $request->image->storeAs('/public', $imageName);
            }
        }

        $post = new Post;
        $post->tittle = $request->tittle;
        $post->written = $request->written;
        $post->image = $request->image;
        $post->user_id = Auth::user()->id;
        $post->gender_id = $request->gender_id;
        $post->save();

        return "chidito";
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
        //
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
        //
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
