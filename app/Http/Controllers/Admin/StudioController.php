<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudioController extends Controller
{
    public function index()
	{
		$data[ 'studios' ] 						= \App\Studio::paginate(20);

		return view( 'pages.studios.list', compact( 'data' ) );
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
		return view('pages.studios.create');
	}

	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'studio_number' 						=> 'required|integer|max:50|min:1|unique:studios'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}

		$data 						= $request->all();

		\App\Studio::create($data);


		return \Redirect::to('admin/manage/studio')
					->with('sc_msg', 'Studio successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$data['studios'] 							= \App\Studio::where('id',$id)->get();
		return view('pages.studios.edit', compact('data'));
	}
	public function update(Request $request,$id)
	{
		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'studio_number' 						=> 'required|integer|max:50|min:1|unique:studios'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}
		$studio										= \App\Studio::find($id);
		$studio->studio_number 						= $request->studio_number;
		$studio->save();

			return \Redirect::to('admin/manage/studio')
					->with('sc_msg', 'Studio successfuly edited');
	}
	public function destroy($id)
	{
		$model = \App\Studio::find($id);
		$model->delete();

		return \Redirect::to( 'admin/manage/studio' )
						  ->with( 'sc_msg', 'Studio successfuly Deleted');
	}
}
