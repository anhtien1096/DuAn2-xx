<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
Use App\User;
Use App\Posts;
Use App\Categories;
use Validator;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Posts::orderBy('created_at')->get();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Categories::select('id', 'name')
            ->where('status', '1')
            ->get()->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            });

        return view('admin.posts.create', [
            'categories'    => $categories,
            'posts'         => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        Validator::make(Input::only('title'), [
            'title'  => 'unique:posts,title'
        ])->validate();

        $post = $request->all();
        $post['user_created'] = auth()->user()->id;
        $post['user_update'] = auth()->user()->id;

        $posts = Posts::create($post);

        \Session::flash('msg_success', trans('admin.post.created'));

        return redirect()->route('posts.index');
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
        $categories = Categories::select('id', 'name')
            ->get()->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            });
        $posts = Posts::find($id);

        return view('admin.posts.create', [
            'posts'         => $posts,
            'categories'    => $categories,
        ]);
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
        $posts = Posts::find($id);

        $post = $request->all();
        $post['user_update'] = auth()->user()->id;

        if ($posts->update($post))
        {
            \Session::flash('msg_success', trans('admin.post.updated'));
            return redirect()->route('posts.index');
        }
        \Session::flash('msg_danger', trans('admin.post.updated'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Posts::find($id);
            $category->delete();
            return response()->json([
                'results'   => true,
                'msg'   => trans('admin.post.deleted'),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'results'   => false,
                'msg'   => $e->getMessage()
            ]);
        }
    }
}
