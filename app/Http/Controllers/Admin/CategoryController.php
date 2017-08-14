<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	public function index()
	{
		$data[ 'categories' ] 						= \App\Category::paginate(20);

		return view( 'pages.categories.list', compact( 'data' ) );
	}
	public function create()
	{
		return view('pages.categories.create_category');
	}
	public function store(Request $request)
	{

		$validator = \Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'category_name' 						=> 'required|string|max:50|min:2|unique:categories',
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )
                    ->withInput($request->all());
		}

		$category 									= new \App\Category;
		$category->category_name 					= $request->category_name;
		$category->save();
		return \Redirect::to('admin/manage/category')
					->with('sc_msg', 'Category successfuly added');;
	}
	public function edit(Request $request,$id)
	{
		$category 									= \App\Category::where('id',$id)->get();
		return view('pages.categories.edit_category', compact('category'));
	}
	public function update(Request $request,$id)
	{

		$category 									= \App\Category::find($id);

		$category->category_name					= $request->category_name;

		$category->save();
		if ($request->is_enable == 1) {
			return \Redirect::to('admin/manage/category')
					->with('sc_msg', 'Category successfuly enabled');
		}
			return \Redirect::to('admin/manage/category')
					->with('sc_msg', 'Category successfuly disabled');
	}
	public function destroy($id)
	{
		$model = \App\Category::find($id);
		$model->delete();

		return \Redirect::to( 'admin/manage/category' )
						  ->with( 'sc_msg', 'Successfuly Deleted');
	}
}
