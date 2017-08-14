<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChairController extends Controller
{
    public function index()
	{
		$data[ 'chairs' ] 						= \App\Chair::paginate(20);

		return view( 'pages.chairs.list', compact( 'data' ) );
	}

	public function change(Request $request,$id)
	{
		$change									= \App\Studio::find($id);
		$change->is_blocked						= $request->is_blocked;
		$change->save();
		if ($request->is_blocked == 1) {
			return \Redirect::to('admin/manage/studio')
					->with('sc_msg', 'Studio successfuly blocked');
		}
			return \Redirect::to('admin/manage/studio')
					->with('sc_msg', 'Studio successfuly not blocked');
	}

	public function create()
	{
		return view('pages.chairs.create');
	}

	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'chair_number' 						=> 'required|integer|max:50|min:1|unique:chairs'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}

		$data 						= $request->all();

		\App\Chair::create($data);


		return \Redirect::to('admin/manage/chair')
					->with('sc_msg', 'Chair successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$data['chairs'] 						= \App\Chair::where('id',$id)->get();
		return view('pages.chairs.edit', compact('data'));
	}
	public function update(Request $request,$id)
	{
		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'chair_number' 						=> 'required|integer|max:50|min:1|unique:chairs'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}
		$chair										= \App\Chair::find($id);
		$chair->chair_number 						= $request->chair_number;
		$chair->save();

			return \Redirect::to('admin/manage/chair')
					->with('sc_msg', 'Chair successfuly edited');
	}
	public function destroy($id)
	{
		$model = \App\Chair::find($id);
		$model->delete();

		return \Redirect::to( 'admin/manage/chair' )
						  ->with( 'sc_msg', 'Chair successfuly Deleted');
	}
}
