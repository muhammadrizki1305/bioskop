@extends('pages.interface.template')
@section('body')
<div class="col-md-4 col-md-offset-4" style="padding:10px;margin-top:100px;">
			<div class="col-md-12" style="background-color:#eee;padding:0px;box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.3);">
			<div class="col-md-12 brand-list" align="center">
				Lists of playlist course
			</div>
				@if($data['playlist']->count() == 0)
					<div class="col-md-12" style="padding:20px;font-size:30px;" align="center">
						Upss There Is No Playlists
					</div>
				@else
					@foreach($data['playlist'] as $index => $playlist)

						<div class="col-md-12 sub-list" style="padding:10px;border-radius:0px;">
					  		<div class="col-md-8" style="padding:5px;">
						  		<span>{{$playlist->playlists_name}}</span>
						  	</div>
						  	<div class="col-md-1" style="padding:5px;">
						  		{{$playlist->video_length}}
						  	</div>
						  	<div class="col-md-3" align="center">
						  		<a class="btn btn-success btn-sm" href="{{url('watch/'.$playlist->id)}}?course_id={{$playlist->course_id}}&playlist_name={{$playlist->playlists_name}}">Watch</a>
						  	</div>
					  	</div>


					@endforeach
				@endif
			</div>
			</div>
@endsection