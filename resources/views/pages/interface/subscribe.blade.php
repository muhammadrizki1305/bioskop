@extends('pages.interface.template')
@section('body')

	<div class="col-md-4 col-md-offset-4" style="padding:0px;margin-top:100px;box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.3);">
		<div class="feedback-head col-md-12" align="center"> Subscribe Us</div>
		<div class="feedback-body col-md-12">
			@include('partials.notif')
			<form action="{{url('subscribestore')}}" method="post" class="col-md-12" style="padding:0px;">
			{{ csrf_field() }}
				<input type="email" name="email" class="form-control" placeholder="You'r email">
				<input type="submit" name="send" value="SUBSCRIBE" class="btn btn-info col-md-12" style="margin-top:5px;">
			</form>
		</div>
	</div>

@endsection