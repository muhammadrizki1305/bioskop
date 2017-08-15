@extends('pages.interface.template')
@section('body')

	<div class="col-md-4 col-md-offset-4" style="padding:0px;margin-top:100px;">
		<div class="feedback-head col-md-12" align="center"> Login</div>
		<div class="feedback-body col-md-12">
			@include('partials.notif')
			<form action="{{url('userdo')}}" method="post" class="col-md-12" style="padding:0px;">
			{{ csrf_field() }}
				<input type="email" name="email" class="form-control" placeholder="EMAIL" style="margin-bottom:2px;">
				<input type="password" name="password" class="form-control" placeholder="PASSWORD" style="margin-bottom:2px;">
				<input type="submit" name="feedback" value="LOGIN" class="btn btn-info col-md-12" style="margin-top:5px;">
			</form>
		</div>
	</div>

@endsection