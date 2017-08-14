@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Detail User Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">

        @foreach ($data['comments'] as $index => $comment)<!-- Menampilkan eror dengan perulangan -->
            <h4 class="mb"><i class="fa fa-angle-right"></i> Detail User</h4>
                      <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-3 content-detail">ID USER</div>
                          <div class="col-md-9 content-detail">: {{$comment->user_id}}</div>
                        <div class="col-md-3 content-detail">USERNAME</div>
                          <div class="col-md-9 content-detail">: {{ $comment->users()->first()->username }}</div>
                        <div class="col-md-3 content-detail">EMAIL</div>
                          <div class="col-md-9 content-detail">: {{$comment->users()->first()->email}}</div>
                        <div class="col-md-3 content-detail">USER GITHUB</div>
                          <div class="col-md-9 content-detail">: {{$comment->users()->first()->user_github}}</div>
                        <div class="col-md-3 content-detail">ROLE</div>
                          <div class="col-md-9 content-detail">
                            @if($comment->users()->first()->role_id == 2)
                              : <span class="badge bg-theme04">ADMIN</span>
                            @elseif($comment->users()->first()->role_id == 3)
                              : <span class="badge bg-theme02">USER</span>
                            @else
                              <span class="badge bg-theme03">SUPER ADMIN</span>
                            @endif
                          </div>
                        <div class="col-md-3 content-detail">CREATED SINCE</div>
                          <div class="col-md-9 content-detail">: {{$comment->created_at}}</div>
                        <div class="col-md-3 content-detail">UPDATED AT</div>
                          <div class="col-md-9 content-detail">: {{$comment->updated_at}}</div>
                        <div class="col-md-3 content-detail">TEXT</div>
                          <div class="col-md-9 content-detail">: {{$comment->comment_text}}</div>
                        <div class="col-md-3 content-detail">IS BLOCKED</div>
                          <div class="col-md-9 content-detail">
                            @if($comment->is_blocked == 1)
                              : <span class="badge bg-theme04">BLOCKED</span>
                            @else
                              : <span class="badge bg-theme02">ENABLED</span>
                            @endif
                          </div>
                        <div class="col-md-3 content-detail">PLAYLIST NAME</div>
                          <div class="col-md-9 content-detail">: {{$comment->playlists()->first()->playlists_name}}</div>
                        <div class="col-md-3 content-detail">DURATION</div>
                          <div class="col-md-9 content-detail">: {{$comment->playlists()->first()->video_length}}</div>
                        <div class="col-md-3 content-detail">WATCHED</div>
                          <div class="col-md-9 content-detail">: {{$comment->playlists()->first()->playlists_watched}}</div>
                      </div>
        @endforeach
                    <div class="text-center">
                        <a href="{{ url('admin/manage/comment') }}" class="btn btn-danger">BACK</a>
                    </div>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection