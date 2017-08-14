<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //->Memanggil class Request
use Illuminate\Support\Facades\Auth;//->Memanggil class Auth
use App\ticket;//->Memanggil Model Todo
use App\film;
use App\schedule;//->Memanggil Model Todo//->Memanggil Model Todouser
use DB;//->Memanggil class DB
use Validator;//->Memanggil class Validator
use App\User;//->Memanggil class User
use Session;//->Memanggil class Session
use Mail;
use App\mail\sendMail;

class BioskopController extends Controller
{
   public function index()
   {
    if (session::has('inlogin')) {
            $film = DB::select("select films.* from films,tickets where films.id=tickets.film_id group by films.id,films.film_tittle,films.film_price,films.film_description,films.film_picture,films.created_at,films.updated_at,films.category_id order by films.id desc;");
            return view('user.home', compact('film'));
      }
      return redirect('login');# code...
   
   }
   public function store(Request $request)
   {
   	for ($block=1; $block <= 5; $block++) { 
   		for ($nomor=1; $nomor <= 10; $nomor++) { 
   			$ticket['film_id'] = 2;  			
   			$ticket['schedule_id'] = 1;
        $ticket['studio_id'] = 2;
   			$ticket['row_id'] = $block;
        $ticket['chair_id'] = $nomor;
   			$ticket['updated_at'] = date('Y-m-d H:i:s');
   			ticket::create($ticket);
   		}
   	}
   	return redirect('/');
   }
   public function desc(Request $request)
   {
     $desc = DB::select("select films.*,categories.category_name from films,categories where films.category_id=categories.id and films.id='$request->film_id'");
     $time = DB::select("select distinct(schedules.schedule_start) as start from schedules,tickets where tickets.film_id='$request->film_id' and tickets.schedule_id=schedules.id");
     $row_time = count($time);
     return view('user.detail', compact('desc','time','row_time'));
   }
   public function beli(Request $request)
   {
     $tiket = DB::select("select rows.*,chairs.chair_number,tickets.* from rows,chairs,films,tickets where rows.id=tickets.row_id and chairs.id=tickets.chair_id and films.id=tickets.film_id and tickets.film_id='$request->film_id' and tickets.schedule_id='$request->jadwal_id' order by rows.id,chairs.id;");
     return view('user.beli', compact('tiket'));
   }
   public function pilih_jadwal(Request $request)
   {
     $list = DB::select("select schedules.*,tickets.film_id from schedules,tickets where schedules.id=tickets.schedule_id and tickets.film_id='$request->film_id' group by schedules.id,schedules.schedule_start,schedules.schedule_end,schedules.schedule_length,tickets.film_id");
     return view('user.pilih_jadwal', compact('list'));
   }public function booking(Request $request)
   {
     if (session::has('insale')) {
           DB::table('tickets')->where('id',$request->id)->update([//->Melakukan update jika data benar berdasarkan id Todo
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s')
           ]);
           $sales_id = DB::select("select max(sales.id) as max from sales");
           foreach ($sales_id as $sales_id) {
             $sales_id->max;
           }
           DB::table('ticket_sales')->insert(['sale_id'=>$sales_id->max,'ticket_id'=>$request->id,'user_id'=>Auth::user()->id,'film_id'=>$request->film_id]);
           return redirect('/');
     }
           DB::table('tickets')->where('id',$request->id)->update([//->Melakukan update jika data benar berdasarkan id Todo
                  'status' => 1,
                  'updated_at' => date('Y-m-d H:i:s')
             ]);
           DB::table('sales')->insert(['sale_Date'=>date('Y-m-d H:i:s')]);
           $sales_id = DB::select("select max(sales.id) as max from sales");
           foreach ($sales_id as $sales_id) {
             $sales_id->max;
           }
           session::put('insale',$sales_id->max);
           DB::table('ticket_sales')->insert(['sale_id'=>$sales_id->max,'ticket_id'=>$request->id,'user_id'=>Auth::user()->id,'film_id'=>$request->film_id]);
           return redirect('/');
   }
}
