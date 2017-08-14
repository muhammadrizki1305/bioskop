<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperatorController extends Controller
{
    public function index()
	{
		$data[ 'operators' ] 						= \App\User::where('role_id',3)->paginate(20);

		return view( 'pages.operators.list', compact( 'data' ) );
	}
	public function create()
	{
		return view('pages.operators.create');
	}
	public function store(Request $request)
	{

		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'username' 								=> 'required|string|max:50|min:3|unique:users',
            'email' 								=> 'required|string|email|unique:users',
            'password' 								=> 'required|string|max:50|min:8'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$user 										= new \App\User;
		$user->username 							= $request->username;
		$user->email 								= $request->email;
		$user->password 							= bcrypt($request->password);
		$user->role_id 								= 3;
		$user->save();
		return \Redirect::to('admin/manage/operator')
					->with('sc_msg', 'Operator successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$admin 									= \App\User::where('id',$id)->get();
		return view('pages.operators.edit', compact('admin'));
	}
	public function update(Request $request,$id)
	{
		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'username' 								=> 'required|string|max:50|min:3|unique:users',
            'email' 								=> 'required|string|email',
        ]);

        if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$admin 										= \App\User::find($request->id);

		$admin->username							= $request->username;
		$admin->email								= $request->email;

		$admin->save();
		return \Redirect::to('admin/manage/operator')
					->with('sc_msg', 'Operator successfuly edited');;
		
	}
	public function destroy($id)
	{
		$model 										= \App\User::find($id);
		$model->delete();

		return \Redirect::to( 'admin/manage/operator' )
						  ->with( 'sc_msg', 'Operator successfuly Deleted');
	}
}
