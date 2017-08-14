@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Row Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">

@include('partials.notif')

                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Create Row</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/row/store') }}">
                      	{{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Row Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="row_name">
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