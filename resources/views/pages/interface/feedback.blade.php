@extends('pages.interface.template')
@section('body')

	<div class="col-md-4 col-md-offset-4" style="padding:0px;margin-top:175px;box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.3);">
		<div class="feedback-head col-md-12" align="center"> Feedback</div>
		<div class="feedback-body col-md-12">
			@include('partials.notif')
			<form action="{{url('feedbackstore')}}" method="post" class="col-md-12" style="padding:0px;">
			{{ csrf_field() }}
				<textarea name="feedback_text" class="form-control col-md-12"></textarea>
				<input type="submit" name="feedback" value="SEND" class="btn btn-info col-md-12" style="margin-top:5px;">
			</form>
		</div>
	</div>

@endsection