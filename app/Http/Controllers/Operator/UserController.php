<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
	{
		$data[ 'films' ] 						= \App\Film::join('tickets','films.id','=','tickets.film_id')->select('films.*')
													->groupBy('id','film_tittle','film_description','is_blocked','created_at','updated_at')
													->get();

		return view( 'pages.interface.home', compact( 'data' ) );
	}
	public function feedback()
	{
		return view('pages.interface.feedback');
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
		$user->role_id 								= 2;
		$user->save();
		return \Redirect::to('admin/manage/admin')
					->with('sc_msg', 'Admin successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$admin 									= \App\User::where('id',$id)->get();
		return view('pages.admins.edit', compact('admin'));
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
		return \Redirect::to('admin/manage/admin')
					->with('sc_msg', 'Admin successfuly edited');;
		
	}
	public function destroy($id)
	{
		$model 										= \App\User::find($id);
		$model->delete();

		return \Redirect::to( 'admin/manage/admin' )
						  ->with( 'sc_msg', 'Successfuly Deleted');
	}
}
