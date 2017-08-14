@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> {{ $data['pages']['title'] }}</h3>
<div class="row mt">
	<div class="col-lg-12">
		<a href="{{ url('admin/manage/course/create') }}" class="btn btn-success">Add New Course</a>
		{{-- <p>Place your content here.</p> --}}
	</div>
</div>

<div class="row mt">

@include('partials.notif')

	<br><br>
	@foreach($data['courses'] as $index => $course)
	<div class="col-lg-4 col-md-4 col-sm-4 mb">
		<a href="{{ url('admin/manage/course/'.$course->id.'/playlist') }}">
		<div class="content-panel pn">
			<div id="blog-bg" style="background: url(http://s3.sobatdev.com.kilatstorage.com/files/course/{{$course->course_picture}}) no-repeat center top;">
				<div class="badge badge-popular" style="word-wrap: break-word;">{{ $course->levels()->first()->level_name }}</div>
				<div class="blog-title">{{ $course->course_name }}</div>
			</div>
			<div class="blog-text">
				<p style="color: gray">{{ $course->course_desc }}</p>
				<div class="row">
					<div class="col-md-4">
						@php
							$course->categories()->get()->each(function($category){
						@endphp
							<span class="label" style="background: {{ $category->category_color }}">{{ $category->category_name }}</span>
						@php	
							});
						@endphp
					</div>
					<div class="col-md-4">
						<span class="label label-warning">{{ $course->playlists()->count() }} VIDEO</span>
					</div>
					<div class="col-md-4">
						@if($course->complete == 1)
							<span class="label label-success">Completed</span>
						@else
							<span class="label label-info">On Progressed</span>
							@endif
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>
	@endforeach


</div>
@endsection