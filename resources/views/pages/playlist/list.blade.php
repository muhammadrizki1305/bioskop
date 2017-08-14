@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Category Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
@include('partials.notif')
<!-- COMPLEX TO DO LIST -->
<div class="row mt">
	<div class="col-md-7">
		<section class="task-panel tasks-widget">
			<div class="panel-heading">
				<div class="pull-left"><h5><i class="fa fa-tasks"></i> Todo List - Complex Style</h5></div>
				<br>
			</div>
			<div class="panel-body">
				<form action="{{ url('admin/manage/course/'.\Request::segment(4).'/playlist/store-video') }}"
					class="dropzone"
					id="playlistUpload"
					method="POST"
					enctype="multipart/form-data"
					>
				</form>
				<br><br>
				<form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/course/'.\Request::segment(4).'/playlist/store') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Playlist Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="playlist_name">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="CREATE">
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
	<div class="col-md-5">
		<section class="task-panel tasks-widget">
			<div class="panel-heading">
				<div class="pull-left"><h5><i class="fa fa-tasks"></i> Todo List - Complex Style</h5></div>
				<br>
			</div>
			<div class="panel-body">
				<div class="task-content">
					<ul class="task-list">
						@foreach($data['playlists'] as $index => $playlist)
						<li>
							<div class="task-checkbox">
								{{-- <input type="checkbox" class="list-child" value=""  /> --}}
								{{ ++$index }}
							</div>
							<div class="task-title">
								<span class="task-title-sp">{{ $playlist->playlists_name }}</span>
								<span class="badge bg-theme">{{ $playlist->video_length }}</span>
								<div class="pull-right hidden-phone">
									<button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
									<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
									<a onclick="return confirm('Are You Sure ?')" href="{{ url('admin/manage/course/'.Request::segment(4).'/playlist/delete/'.$playlist->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</section>
		</div><!-- /col-md-12-->
		</div><!-- /row -->
		@endsection
		@section('js')
		<!--script for this page-->
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="{{  url('assets/js/tasks.js') }}" type="text/javascript"></script>
		<script src="{{ url('assets/js/dropzone/dropzone.js') }}"></script>
		<script>
			Dropzone.options.playlistUpload = {
				headers: {
					"X-CSRF-TOKEN": "{{ csrf_token() }}",
				},
				maxFiles: 1,
				acceptedFiles: 'video/*',
				init : function()
		{
		var _this = this;
		//if status error || file is not image
		this.on('error', function(file){
		alert("The file format is incorrect")
		//remove from item
		_this.removeAllFiles();
		})
		},
			}
		</script>
		@endsection
		@section('css')
		<link rel="stylesheet" href="{{ url('assets/css/to-do.css') }}">
		<link rel="stylesheet" href="{{ url('assets/js/dropzone/dropzone.css') }}">
		@endsection