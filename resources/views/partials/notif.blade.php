{{-- <div class="col-md-12"> --}}
	@if(Session::has('sc_msg'))
		<div class="alert alert-success">
			<span>{{ Session::get('sc_msg') }}</span>
		</div>
	@endif


	@if(Session::has('err_msg'))
		<div class="alert alert-danger">
			@if(is_array(Session::get('err_msg')))
				<ul>
					@foreach(Session::get('err_msg') as $err)
						<li>{{ $err }}</li>
					@endforeach
				</ul>
			@else
				<span>{{ Session::get('err_msg') }}</span>
			@endif
		</div>
	@endif
{{-- </div> --}}