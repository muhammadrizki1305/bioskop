@extends('pages.interface.template')
@section('body')

	<div class="col-md-4 col-md-offset-4" style="padding:0px;margin-top:100px;">
		<div class="feedback-head col-md-12" align="center"> Daftar</div>
		<div class="feedback-body col-md-12">
			@include('partials.notif')
			<form action="{{url('daftarstore')}}" method="post" class="col-md-12" style="padding:0px;">
			{{ csrf_field() }}
				<input type="text" name="username" class="form-control" placeholder="USERNAME" style="margin-bottom:2px;">
				<input type="email" name="email" class="form-control" placeholder="EMAIL" style="margin-bottom:2px;">
				<input type="password" name="password" class="form-control" placeholder="PASSWORD" style="margin-bottom:2px;">
				<input type="text" name="user_github" class="form-control" placeholder="USER GITHUB" style="margin-bottom:2px;">
				<input type="submit" name="feedback" value="DAFTAR" class="btn btn-info col-md-12" style="margin-top:5px;">
			</form>
		</div>
	</div>

@endsection