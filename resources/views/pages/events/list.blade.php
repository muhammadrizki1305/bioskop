@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Event Page</h3>
	<h3 class="">
		<i class="fa fa-angle-right"></i> 
		<a href="{{ url('admin/manage/film/create') }}" class="btn btn-success">
			<i class="fa fa-plus"></i> ADD Event
		</a>
	</h3>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		@foreach( $data['events'] as $index => $event )
		<a href="{{url('admin/manage/event/create/'.$event->id)}}">
			<div class="col-md-4 col-sm-4 mb" style="padding:10px;border:1px solid #f4f4f4;">
	            <div class="white-panel col-md-12 pn" style="padding:0px;">
	                <div class="white-header col-md-12">
						<h5>{{ $event->film_tittle }}</h5>
	                </div>
					<div class="row">
						<div class="col-sm-6 col-xs-6 goleft">
							<p><i class="fa fa-calendar"></i>
								{{ $event->created_at }} 
							</p>
						</div>
						<div class="col-sm-6 col-xs-6 goleft">
							<p><i class="fa fa-ticket"></i>
								{{ $event->tickets()->where('status',0)->count() }}
							</p>
						</div>
		            </div>
		            <div class="centered col-md-12" style="padding-bottom:15px;">
						<img src="{{url('assets/img/hang_out.jpg')}}" style="width:100%;height:200px;" class="img-thumbnail">
		            </div>
	            </div>
	        </div><!-- /col-md-4 -->
		</a>
		@endforeach
	</div><!-- /col-lg-12 -->
</div><!-- /row -->
@endsection