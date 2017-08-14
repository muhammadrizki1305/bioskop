<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RowController extends Controller
{
     public function index()
	{
		$data[ 'rows' ] 						= \App\Row::paginate(20);

		return view( 'pages.rows.list', compact( 'data' ) );
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
		return view('pages.rows.create');
	}

	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'row_name' 						=> 'required|string|max:50|min:1|unique:rows'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}

		$data 						= $request->all();

		\App\Row::create($data);


		return \Redirect::to('admin/manage/row')
					->with('sc_msg', 'Row successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$data['rows'] 							= \App\Row::where('id',$id)->get();
		return view('pages.rows.edit', compact('data'));
	}
	public function update(Request $request,$id)
	{
		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'row_name' 						=> 'required|string|max:50|min:1|unique:rows'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}
		$row										= \App\Row::find($id);
		$row->row_name 						= $request->row_name;
		$row->save();

			return \Redirect::to('admin/manage/row')
					->with('sc_msg', 'Row successfuly edited');
	}
	public function destroy($id)
	{
		$model = \App\Row::find($id);
		$model->delete();

		return \Redirect::to( 'admin/manage/row' )
						  ->with( 'sc_msg', 'Row successfuly Deleted');
	}
}
