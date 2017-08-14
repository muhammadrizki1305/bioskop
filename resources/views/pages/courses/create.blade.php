@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> {{ $data['pages']['title'] }}</h3>

@include('partials.notif')


<div class="row mt">
	<form action="{{ url('/admin/manage/course/store') }}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="col-lg-8">
		<div class="form-panel">
			<h4 class="mb"><i class="fa fa-angle-right"></i> Create New Course</h4>
			<div class="form-horizontal style-form">
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Course Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="course_name">
						</div>
					</div>
				<div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Course Desc</label>
					<div class="col-sm-10">
						<textarea name="course_desc" class="form-control" cols="30" rows="10"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Course Picture</label>
					<div class="col-sm-10">
						<input type="file" name="course_picture">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Level</label>
					<div class="col-sm-10">
						<select name="level_id" class="form-control">
							@foreach($data['data']['levels'] as $index => $level)
								<option value="{{ $level->id }}">{{ $level->level_name }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Category</label>
					<div class="col-sm-10">
						<select name="category_id" class="form-control selectpicker" multiple="">
							@foreach($data['data']['categories'] as $index => $category)
								<option value="{{ $category->id }}" style="background: {{ $category->category_color }}">{{ $category->category_name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br><br>
				<div class="">
					<button class="btn btn-success">Save</button>
					<button class="btn btn-danger">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-12">
				<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Options</h4>
					<div class="row mt">
						<div class="col-sm-6 text-center">
							<label class="control-label">Permission</label>
						</div>
						<div class="col-sm-6 text-center">
							<div class="switch switch-square"
								data-on-label="<i class=' fa fa-check'></i>"
								data-off-label="<i class='fa fa-times'></i>">
								<input type="checkbox" checked="" name="permission" />
							</div>
						</div>
					</div>
					<div class="row mt">
						<div class="col-sm-6 text-center">
							<label class="control-label">Enable Comment</label>
						</div>
						<div class="col-sm-6 text-center">
							<div class="switch switch-square"
								data-on-label="<i class=' fa fa-check'></i>"
								data-off-label="<i class='fa fa-times'></i>">
								<input type="checkbox" checked="" name="can_comment" />
							</div>
						</div>
					</div>
					<div class="row mt">
						<div class="col-sm-6 text-center">
							<label class="control-label">Complete</label>
						</div>
						<div class="col-sm-6 text-center">
							<div class="switch switch-square"
								data-on-label="<i class=' fa fa-check'></i>"
								data-off-label="<i class='fa fa-times'></i>">
								<input type="checkbox" checked="" name="complete" />
							</div>
						</div>
					</div>
					
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-panel">
					<h4 class="mb"><i class="fa fa-angle-right"></i> Options</h4>
					{{-- <div class="row mt">
						<div class="col-sm-6 text-center">
							<label class="control-label">Permission</label>
						</div>
						<div class="col-sm-6 text-center">
							<div class="switch switch-square"
								data-on-label="<i class=' fa fa-check'></i>"
								data-off-label="<i class='fa fa-times'></i>">
								<input type="checkbox" checked="" />
							</div>
						</div>
					</div> --}}
					<div class="form-horizontal style-form" method="get">
						<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Published On</label>
							<div class="col-sm-9">
								<input type="date" class="form-control" name="published_on">
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
		
	</div>
	</form>
</div>
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
@endsection
@section('css')

<link rel="stylesheet" type="text/css" href="{{ url('assets/js/bootstrap-datepicker/css/datepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('assets/js/bootstrap-daterangepicker/daterangepicker.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
@endsection