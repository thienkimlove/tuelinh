<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Post;

class PostsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $parents = Category::with('translations')->whereNotNull('parent_id')->get();
        $display = [];
        foreach ($parents as $parent) {
            $display[$parent->id] = $parent->title;
        }
        return view('admin.post.form', compact('display'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();

        $insert = [
            'category_id' => $data['category_id'],
            'status' => (!empty($data['status']) && $data['status'] == 'on') ? true : false,
            'image' => ($request->file('image') && $request->file('image')->isValid()) ? $this->saveImage($request->file('image')) : ''
        ];

        foreach (['vi', 'en', 'fr'] as $lang) {
            foreach (['title', 'content', 'desc', 'keyword'] as $field) {
                $insert[$lang][$field] = !empty($data[$field.'_'.$lang])? $data[$field.'_'.$lang] : '';
            }
        }

        Post::create($insert);
        flash(trans('common.post_create_success'), 'success');
        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $parents = Category::with('translations')->whereNotNull('parent_id')->get();
        $display = [];
        foreach ($parents as $parent) {
            $display[$parent->id] = $parent->title;
        }

        return view('admin.post.form', compact('post', 'display'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param PostRequest $request
     * @return Response
     */
    public function update($id, PostRequest $request)
    {
        $data = $request->all();
        $post = Post::find($id);

        foreach (['title', 'content', 'desc', 'keyword'] as $field) {
            foreach (['vi', 'en', 'fr'] as $lang) {
                $post->translate($lang)->$field = !empty($data[$field.'_'.$lang])? $data[$field.'_'.$lang] : '';
            }
        }

        if ($request->file('image') && $request->file('image')->isValid()) {
            $post->image = $this->saveImage($request->file('image'), $post->image);
        }
        $post->category_id = $data['category_id'];
        $post->status = (!empty($data['status']) && $data['status'] == 'on') ? true : false;

        $post->save();

        flash(trans('common.post_edit_success'), 'success');
        return redirect('admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (file_exists(public_path('files/images/' . $post->image))) {
            @unlink(public_path('files/images/' . $post->image));
        }
        $post->delete();
        flash(trans('common.post_delete_success'), 'success');
        return redirect('admin/posts');
    }
}
