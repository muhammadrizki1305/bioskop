@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Level Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="form-panel">
					@include('partials.notif')
					<h4 class="mb"><i class="fa fa-angle-right"></i> Create Level</h4>
					<form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/email/store') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<div class="col-sm-12">
								<label for="control-label">To</label>
								<div class="row">
									<div class="col-md-9">
										<h4>Custom</h4>
										<select name="receipt[]" class="form-control selectpicker" multiple="">
											@foreach($data['data']['allEmail'] as $email)
												<option value="{{ $email }}">{{ $email }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-3 text-center">
										<h4>EveryOne</h4>
										<div class="switch switch-square"
											data-on-label="<i class=' fa fa-check'></i>"
											data-off-label="<i class='fa fa-times'></i>">
											<input type="checkbox" name="everyone" />
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label for="control-label">Subject</label>
								<input type="text" class="form-control" placeholder="Subject" name="subject">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<label for="control-label">Content</label>
								<textarea class="form-control" cols="80" rows="20" name="content"> </textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<button class="btn btn-success" type="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
				</div><!-- /col-lg-12 -->
				</div><!-- /row -->
				@endsection
				@section('js')
				<!--common script for all pages-->
				<script src="{{ url('assets/js/common-scripts.js') }}"></script>
				<!--script for this page-->
				<script src="{{ url('assets/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
				<!--custom switch-->
				<script src="{{ url('assets/js/bootstrap-switch.js') }}"></script>
				<!--custom tagsinput-->
				<script src="{{ url('assets/js/jquery.tagsinput.js') }}"></script>
				<!--custom checkbox & radio-->
				<script type="text/javascript" src="{{ url('assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
				<script type="text/javascript" src="{{ url('assets/js/bootstrap-daterangepicker/date.js') }}"></script>
				<script type="text/javascript" src="{{ url('assets/js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
				<script type="text/javascript" src="{{ url('assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
				<script src="{{ url('assets/js/form-component.js') }}"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
				<script>
					$(function() {
						$('[name=everyone]').change(function(){
							if(!$(this).is(':checked'))
							{
								$('.selectpicker').removeAttr('disabled');
							}
							else
							{
								$('.selectpicker').attr('disabled', 'disabled').prop('readonly', true)
							}
						})
					})
				</script>
				@endsection
				@section('css')
				<link rel="stylesheet" type="text/css" href="{{ url('assets/js/bootstrap-datepicker/css/datepicker.css') }}" />
				<link rel="stylesheet" type="text/css" href="{{ url('assets/js/bootstrap-daterangepicker/daterangepicker.css') }}" />
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
				@endsection