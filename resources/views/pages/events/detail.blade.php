@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Event Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">
    
@include('partials.notif')
                    @foreach($data['detail'] as $index => $detail)
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Detail Ticket</h4>
                      <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-3 content-detail">Film</div>
                          <div class="col-md-9 content-detail">{{$detail->films()->first()->film_tittle}}</div>
                        <div class="col-md-3 content-detail">Total</div>
                          <div class="col-md-9 content-detail">{{$detail->count()}}</div>
                        <div class="col-md-3 content-detail">Price</div>
                          <div class="col-md-9 content-detail">{{$detail->price}}</div>
                        <div class="col-md-3 content-detail">Studio</div>
                          <div class="col-md-9 content-detail">{{$detail->studios()->first()->studio_number}}</div>
                        <div class="col-md-3 content-detail">CREATED SINCE</div>
                          <div class="col-md-9 content-detail">{{$detail->created_at}}</div>
                        <div class="col-md-3 content-detail">UPDATED AT</div>
                          <div class="col-md-9 content-detail">{{$detail->updated_at}}</div>
                        <div class="col-md-3 content-detail">Play At</div>
                          <div class="col-md-9 content-detail">{{$detail->play_at}}</div>
                        <div class="col-md-3 content-detail">End At</div>
                          <div class="col-md-9 content-detail">{{$detail->end_at}}</div>
                        <div class="col-md-3 content-detail">Start At</div>
                          <div class="col-md-9 content-detail">{{$detail->start_at}}</div>
                        <div class="col-md-3 content-detail">Expired At</div>
                          <div class="col-md-9 content-detail">{{$detail->expired_at}}</div>
                      </div>
                    @endforeach
                      <div class="text-center">
                        <a href="{{ url('admin/manage/event') }}" class="btn btn-danger">BACK</a>
                    </div>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection