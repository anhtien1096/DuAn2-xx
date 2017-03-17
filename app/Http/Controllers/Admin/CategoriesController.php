<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Requests\CategoriesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
 
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Categories::all();

        return view('admin.categories.index')
            ->with([
                'categories'    => $category
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::select('id', 'name')
            ->where('parent', '0')
            ->get()->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            });
//        var_dump($categories);die;
        return view('admin.categories.create', [
            'category'      => [],
            'categories'    => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        Validator::make(Input::only('name'), [
            'name'  => 'unique:categories,name'
        ])->validate();

        Categories::create($request->all());

        \Session::flash('msg_success', trans('admin.cate.created'));

        return redirect()->route('categories.index');
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
            ->where([
                ['parent', '0'],
                ['id', '<>', $id]
            ])
            ->get()->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name']];
            });
        $category = Categories::find($id);
//        var_dump($categories);die;
        return view('admin.categories.create', [
            'category'      => $category,
            'categories'    => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $category = Categories::find($id);
        if ($category->update($request->all()))
        {
            \Session::flash('msg_success', trans('admin.cate.updated'));
            return redirect()->route('categories.index');
        }
        \Session::flash('msg_danger', trans('admin.cate.updated'));
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
            $category = Categories::find($id);
            $category->delete();
            return response()->json([
                'results'   => true,
                'msg'   => trans('admin.cate.deleted'),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'results'   => false,
                'msg'   => $e->getMessage()
            ]);
        }
    }
}
