@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Operator Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">
    
        @include('partials.notif')

                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Create Operator</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/operator/store') }}">
                      	{{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">USERNAME</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="username">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">EMAIL</label>
                              <div class="col-sm-10">
                                  <input type="email" class="form-control" name="email">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">PASSWORD</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="password">
                              </div>
                          </div>
                           <div class="form-group">
                              <div class="col-md-12">
	                          	<input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="CREATE">
	                          </div>
                          </div>              
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection