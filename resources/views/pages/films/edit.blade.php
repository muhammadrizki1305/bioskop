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
                    @foreach($data['films'] as $film)
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Film</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/film/update/'.$film->id) }}">
                      	{{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Film Tittle</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="film_tittle" value="{{$film->film_tittle}}">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <textarea name="film_description" class="form-control">{{$film->film_description}}</textarea>
                              </div>
                          </div>
                           <div class="form-group">
                              <div class="col-md-12">
	                          	<input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="EDIT">
	                          </div>
                          </div>              
                      </form>
                    @endforeach
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection