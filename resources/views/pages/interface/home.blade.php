@extends('pages.interface.template')
@section('body')
<div class="col-md-12" style="padding:5px;text-align:center;">
	@include('partials.notif')
</div>
<div class="container">

	<div class="col-md-12" align="center"><h4>Choose Film Do You Want To See</h4></div>
	@foreach($data['films'] as $index => $film)
	<a href="{{ url('user/detail/'.$film->id) }}">
	<div class="col-md-3" style="padding:15px;">
		<div class="col-md-12 shadow" style="padding:0px">
		<div class="col-md-12" style="padding:0px;">
			<div class="col-md-12 course-head">
				{{$film->film_tittle}} 			
			</div>
			<div class="col-md-12 course-body">
			    <img src="assets/img/hang_out.jpg" class="course">
			</div>
		   	<div class="col-md-12 course-footer" style="padding:5px;">
		   		<div class="col-md-12" style="padding-bottom:5px;" align="center">
					<h4>
						<span class="label label-warning">{{ $film->tickets()->count() }} Tickets</span>
					</h4>
		   		</div>
		   	</div>
		</div>
		</div>
	</div>
	</a>
	@endforeach
</div>
@endsection