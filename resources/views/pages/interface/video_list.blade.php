@extends('pages.interface.template')
@section('body')

	<div class="col-md-12" style="padding:10px;m">
		<div class="col-md-8" style="padding:10px;">
			<div class="col-md-12" style="background-color:#fff;padding:10px;box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.3);">
				@if(Auth::check())
				<div class="col-md-12" style="padding:0px;">
					@foreach($data['video'] as $index => $video)
					<div class="col-md-12" style="padding:0px;position:relative;border:1px solid #7C8A99;">
						<video width="100%" controls>
						  <source src="http://s3.sobatdev.com.kilatstorage.com/files/videos/{{$video->playlists_video}}">
						  <source src="http://s3.sobatdev.com.kilatstorage.com/files/videos/{{$video->playlists_video}}">
						  Your browser does not support HTML5 video.
						</video>
	<!-- 					<div id="player"></div> -->
					</div>
					<div class="col-md-12" style="padding:0px;">
							<h4>
							<div class="col-md-8" style="padding:0px;">{{ $video->courses()->first()->course_name }} - {{$video->playlists_name}}</div>
							<div class="col-md-4" style="padding:0px;"><span class="glyphicon glyphicon-eye-open"></span><span> {{ \App\Watch::where('playlist_name',$video->playlists_name)->count() }}</span></div>
							</h4>
					</div>
					<div class="col-md-12" style="padding:0px;">
						{{$video->created_at}} -
						@php
							$video->courses()->first()->categories()->get()->each(function($category){
						@endphp
							<span class="label" style="background: {{ $category->category_color }}">{{ $category->category_name }}</span>
						@php	
							});
						@endphp
					</div>
					@endforeach
				</div>
				@else
				@endif

				<div class="col-md-12">
					@if(Auth::check())
					<div class="col-md-12" style="padding:0px;margin-top:10px;margin-bottom:10px;">
						<form action="{{url('comment')}}" method="post" class="col-md-12" style="padding:0px;">
						{{ csrf_field() }}
							<h4>Commentar :</h4>
							<textarea name="comment_text" class="form-control"></textarea>
							<input type="submit" name="add" value="ADD" class="btn btn-success col-md-3">
							<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
							<input type="hidden" name="playlist_id" value="{{ $data['id'] }}">
						</form>
					</div>
					@else
						<div class="col-md-12" style="padding:0px;margin-top:10px;margin-bottom:10px;">
							<div class="alert alert-warning">
							  <h4>Warning!</h4>
							  <p>Please login then you can comment and watch video in this playlist, <a href="{{url('userlog')}}" class="alert-link">LOGIN</a>.</p>
							</div>
						</div>
					@endif
					@foreach($data['comment'] as $index => $comment)

						<div class="col-md-12" style="margin-bottom:1px;border-left:5px solid #18bc9c;">
						  	<h5 style="font-weight:bolder;">{{$comment->users()->first()->username}} - {{$comment->created_at}}</h5>
						  	<p>{{$comment->comment_text}}</p>
						</div>

					@endforeach

				</div>
			</div>
		</div>
		<div class="col-md-4" style="padding:10px;">
			<div class="col-md-12" style="background-color:#eee;padding:0px;box-shadow: 4px 4px 2px rgba(0, 0, 0, 0.3);">
			<div class="col-md-12 brand-list" align="center">
				Lists of playlist course
			</div>
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
			</div>
		</div>
	</div>

@endsection
@section('video')
	 <script>
	// 	@foreach($data['video'] as $index => $video)
	// 	 $(function() {
	// 	 	$('#player').videre({
	// 		  video: {
	// 		    quality: [
	// 		      {
	// 		        label: '720p',
	// 		        src: 'http://s3.sobatdev.com.kilatstorage.com/files/videos/{{$video->playlists_video}}' //ini source nya
	// 		      }
	// 		    ],
	// 		  },
	// 	  		dimensions: 1280,
	// 	  		bottomProgressBar: true,
	// 	  		audio: {
	// 				volume: 50
	// 			}
	// 		});
	// 	  });
	//   @endforeach
	// </script>
@endsection