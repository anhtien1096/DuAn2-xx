<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
Use App\User;
use Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = User::orderBy('role','created_at')
                    ->get();
        return view('admin.users.index',compact('data'));
    }

    public function show($id) //setadmin
    {
        try {
            $users = User::find($id);
            $users->role = 2;
            $users->save();

            return response()->json([
                'results'   => true,
                'msg'   => trans('admin.user.setadminnoti'),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'results'   => false,
                'msg'   => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $users = User::find($id);
            $users->delete();
            return response()->json([
                'results'   => true,
                'msg'   => trans('admin.user.deletednoti'),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'results'   => false,
                'msg'   => $e->getMessage()
            ]);
        }
    }
}
