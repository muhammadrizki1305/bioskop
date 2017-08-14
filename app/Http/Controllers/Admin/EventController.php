<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
	{
		$data[ 'events' ] 							= 	\App\Film::where('is_blocked',0)->paginate(9);

		return view( 'pages.events.list', compact( 'data' ) );
	}

	public function sale()
	{
		$data[ 'sales' ] 							= 	\App\Ticket::where('status',1)->paginate(20);

		return view( 'pages.events.sale', compact( 'data' ) );
	}

	public function create(Request $request,$id)
	{
		$data['studio']								= 	\App\Studio::where(['is_blocked'=>0,'is_used'=>0])->get();
		$data['list']								=	\App\Ticket::select('play_at','end_at','start_at','expired_at','studio_id','film_id')->where('film_id',8)->groupBy('play_at','end_at','start_at','expired_at','studio_id','film_id')->get();
		$data['film_id']							=	$id;
		return view('pages.events.create', compact('data'));
	}
	public function store(Request $request)
	{

		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'studio' 								=> 'required|integer|max:50|min:1',
            'price' 								=> 'required|integer|min:4',
            'number_ticket' 						=> 'required|integer',
            'play_at'		 						=> 'required',
            'end_at'		 						=> 'required',
            'day_start'		 						=> 'required|date',
            'day_end'		 						=> 'required|date'
        ]);

		if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$check1														= 	\App\Ticket::where([

													'studio_id'		=>	$request->studio,
													'start_at' 		=>	$request->day_start,
													'expired_at' 	=>	$request->day_end

													])->whereBetween(

													'play_at',[$request->play_at,$request->end_at]

													)->get();
		$check2														= 	\App\Ticket::where([

													'studio_id'		=>	$request->studio,
													'start_at' 		=>	$request->day_start,
													'expired_at' 	=>	$request->day_end

													])->whereBetween(

													'end_at',[$request->play_at,$request->end_at]

													)->get();

		if (($check1->count() != 0)||($check2->count() != 0)) {

			return \Redirect::back()
				->with('err_msg', 'The studio is used at the schedule');
		}

		$setrow										=	($request->number_ticket) / 10;
		for ($row=1; $row <= $setrow; $row++) { 
			for ($chair=1; $chair <= 10; $chair++) { 
					$ticket 									= new \App\Ticket;
					$ticket->studio_id 							= $request->studio;
					$ticket->film_id 							= $request->film_id;
					$ticket->price 								= $request->price;
					$ticket->play_at 							= $request->play_at;
					$ticket->end_at 							= $request->end_at;
					$ticket->start_at 							= $request->day_start;
					$ticket->expired_at 						= $request->day_end;
					$ticket->row_id 							= $row;
					$ticket->chair_id 							= $chair;
					$ticket->save();
			}
		}

		return \Redirect::back()
					->with('sc_msg', 'Ticket successfuly added');
	}
	public function edit(Request $request)
	{
		$ticket 										= 	\App\Ticket::where([

															'film_id'	=>$request->film_id,
															'play_at'	=>$request->play_at,
															'end_at'	=>$request->end_at,
															'start_at'	=>$request->start_at,
															'expired_at'=>$request->expired_at

														])->limit(1)->get();

		return view('pages.events.edit', compact('ticket'));
	}
	public function update(Request $request)
	{
		$data										= $request->all();
		$validator = \Validator::make($data, [//->Memanggil class Validator dan mengambil semua data inputan
            'studio' 								=> 'required|integer|max:50|min:1',
            'price' 								=> 'required|integer|min:4',
            'play_at'		 						=> 'required',
            'end_at'		 						=> 'required',
            'day_start'		 						=> 'required|date',
            'day_end'		 						=> 'required|date'
        ]);

        if ($validator->fails()) {
			return \Redirect::back()->with('err_msg', $validator->errors()->all() )->withInput($data);
		}

		$ticket 									= \App\Ticket::where([
															'studio_id'	=>$request->studio,
															'play_at'	=>$request->play,
															'end_at'	=>$request->end,
															'start_at'	=>$request->start,
															'expired_at'=>$request->finish
														]);
		$ticket->update([
						'studio_id'	=>$request->studio,
						'price'		=>$request->price,
						'play_at'	=>$request->play_at,
						'end_at'	=>$request->end_at,
						'start_at'	=>$request->day_start,
						'expired_at'=>$request->day_end
						]);

		// dd($request->all());

		// \DB::table('tickets')
		// 	->where([
		//  													'studio_id'	=>$request->studio,
		//  													'play_at'	=>$request->play_at,
		//  													'end_at'	=>$request->end_at,
		//  													'start_at'	=>$request->day_start,
		//  													'expired_at'=>$request->day_end
		//  	])->update([
  //           			'studio_id'	=>$request->studio,
		//  				'price'		=>$request->price,
		// 				'play_at'	=>$request->play_at,
		//  				'end_at'	=>$request->end_at,
		//  				'start_at'	=>$request->day_start,
		//  				'expired_at'=>$request->day_end
  //      		]);

		return \Redirect::to('admin/manage/event')
					->with('sc_msg', 'Ticket successfuly edited');;
		
	}

	public function destroy(Request $request)
	{
		$model 										= \App\Ticket::where([
															'film_id'	=>$request->film_id,
															'play_at'	=>$request->play_at,
															'end_at'	=>$request->end_at,
															'start_at'	=>$request->start_at,
															'expired_at'=>$request->expired_at
														]);
		$model->delete();

		return \Redirect::back()
						  ->with( 'sc_msg', 'Ticket uccessfuly Deleted');
	}

	public function detail(Request $request)
	{
		$data['detail']								= \App\Ticket::where([

															'film_id'	=>$request->film_id,
															'play_at'	=>$request->play_at,
															'end_at'	=>$request->end_at,
															'start_at'	=>$request->start_at,
															'expired_at'=>$request->expired_at

														])->limit(1)->get();

		return view('pages.events.detail', compact('data'));
	}
}
