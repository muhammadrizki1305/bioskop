<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilmController extends Controller
{
   	public function index()
	{
		$data[ 'films' ] 						= \App\Film::paginate(20);

		return view( 'pages.films.list', compact( 'data' ) );
	}

	public function detail(Request $request,$id)
	{
		$data['films'] 							= \App\Film::where('id',$id)->get();
		
		return view('pages.films.detail', compact('data'));
	}

	public function change(Request $request,$id)
	{
		$change									= \App\Film::find($id);
		$change->is_blocked						= $request->is_blocked;
		$change->save();
		if ($request->is_blocked == 1) {
			return \Redirect::to('admin/manage/film')
					->with('sc_msg', 'Film successfuly blocked');
		}
			return \Redirect::to('admin/manage/film')
					->with('sc_msg', 'Film successfuly not blocked');
	}

	public function create()
	{
		$data['data']['categories'] = \App\Category::all();

		return view('pages.films.create', compact('data'));
	}
	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'film_tittle' 						=> 'required|string|max:50|min:2|unique:films',
            'film_description' 					=> 'required|string|min:10|'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}

		$data 						= collect($request->all())->toArray();

		\DB::transaction( function() use($data){

			$store 						= \App\Film::create($data)
										   ->categories()
										   ->attach( $data['category_id'] );
		});


		return \Redirect::to('admin/manage/film')
					->with('sc_msg', 'Film successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$data['films'] 							= \App\Film::where('id',$id)->get();
		return view('pages.films.edit', compact('data'));
	}
	public function update(Request $request,$id)
	{
		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'film_tittle' 						=> 'required|string|max:50|min:2',
            'film_description' 					=> 'required|string|min:10|'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}
		$film									= \App\Film::find($id);
		$film->film_tittle 						= $request->film_tittle;
		$film->film_description 				= $request->film_description;
		$film->save();

			return \Redirect::to('admin/manage/film')
					->with('sc_msg', 'Film successfuly edited');
	}
	public function destroy($id)
	{
		$model = \App\Film::find($id);
		$model->delete();

		return \Redirect::to( 'admin/manage/film' )
						  ->with( 'sc_msg', 'Film successfuly Deleted');
	}
}
