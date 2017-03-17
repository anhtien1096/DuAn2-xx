<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PagesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Pages;
use Validator;

class PagesController extends Controller
{
    public function index()
    {
        $data = Pages::orderBy('created_at')
                    ->where('status',1)
                    ->paginate(20);
        return view('admin.pages.index',compact('data'));
    }

    public function create()
    { 
        return view('admin.pages.create',[
            'pages'      => [],
        ]);
    }

    public function store(PagesRequest $request)
    {
        Validator::make(Input::only('name'), [
            'name   '  => 'unique:pages,name'
        ])->validate();

        Pages::create($request->all());

        \Session::flash('msg_success', trans('admin.pages.created'));

        return redirect()->route('pages.index');
    }
    public function edit($id)
    { 
        $pages = Pages::find($id);
//        var_dump($categories);die;
        return view('admin.pages.create', [
            'pages'      => $pages,
        ]);
    }

    public function update(PagesRequest $request, $id)
    {
        $pages = Pages::find($id);
        if ($pages->update($request->all()))
        {
            \Session::flash('msg_success', trans('admin.pages.updated'));
            return redirect()->route('pages.index');
        }
        \Session::flash('msg_danger', trans('admin.pages.updated'));
        return redirect()->back();

    }

    public function destroy($id)
    {
        try {
            $pages = Pages::find($id);
            $pages->delete();
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
