@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Film Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">
    
@include('partials.notif')
                    @foreach($data['films'] as $index => $film)
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Detail Film</h4>
                      <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-3 content-detail">ID USER</div>
                          <div class="col-md-9 content-detail">{{$film->id}}</div>
                        <div class="col-md-3 content-detail">Film Tittle</div>
                          <div class="col-md-9 content-detail">{{$film->film_tittle}}</div>
                        <div class="col-md-3 content-detail">Is Blocked</div>
                          <div class="col-md-9 content-detail">
                            @if($film->is_blocked == 1)
                              <span class="badge bg-theme04">Blocked</span>
                            @else
                              <span class="badge bg-theme02">Not Blocked</span>
                            @endif
                          </div>
                        <div class="col-md-3 content-detail">CREATED SINCE</div>
                          <div class="col-md-9 content-detail">{{$film->created_at}}</div>
                        <div class="col-md-3 content-detail">UPDATED AT</div>
                          <div class="col-md-9 content-detail">{{$film->updated_at}}</div>
                        <div class="col-md-3 content-detail">Categories</div>
                          <div class="col-md-9 content-detail">
                          @php
                            $film->categories()->get()->each(function($category){
                          @endphp
                            |{{ $category->category_name }}|
                          @php  
                            });
                          @endphp
                          </div>  
                        <div class="col-md-3 content-detail">FIlm Description</div>
                          <div class="col-md-9 content-detail">{{$film->film_description}}</div>
                      </div>
                    @endforeach
                      <div class="text-center">
                        <a href="{{ url('admin/manage/film') }}" class="btn btn-danger">BACK</a>
                    </div>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection