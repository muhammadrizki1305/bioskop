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

        @foreach ($user as $user)<!-- Menampilkan eror dengan perulangan -->
            <h4 class="mb"><i class="fa fa-angle-right"></i> Detail User</h4>
                      <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-3 content-detail">ID USER</div>
                          <div class="col-md-9 content-detail">{{$user->id}}</div>
                        <div class="col-md-3 content-detail">USERNAME</div>
                          <div class="col-md-9 content-detail">{{$user->username}}</div>
                        <div class="col-md-3 content-detail">EMAIL</div>
                          <div class="col-md-9 content-detail">{{$user->email}}</div>
                        <div class="col-md-3 content-detail">USER GITHUB</div>
                          <div class="col-md-9 content-detail">{{$user->user_github}}</div>
                        <div class="col-md-3 content-detail">STATUS</div>
                          <div class="col-md-9 content-detail">
                            @if($user->status != 1)
                              <span class="badge bg-theme04">Not Verified</span>
                            @else
                              <span class="badge bg-theme02">Verified</span>
                            @endif
                          </div>
                        <div class="col-md-3 content-detail">ROLE</div>
                          <div class="col-md-9 content-detail">
                            @if($user->role_id == 1)
                              <span class="badge bg-theme04">ADMIN</span>
                            @else
                              <span class="badge bg-theme02">USER</span>
                            @endif
                          </div>
                        <div class="col-md-3 content-detail">CREATED SINCE</div>
                          <div class="col-md-9 content-detail">{{$user->created_at}}</div>
                        <div class="col-md-3 content-detail">UPDATED AT</div>
                          <div class="col-md-9 content-detail">{{$user->updated_at}}</div>
                      </div>
        @endforeach
                    <div class="text-center">
                        <a href="{{ url('admin/manage/users') }}" class="btn btn-danger">BACK</a>
                    </div>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection