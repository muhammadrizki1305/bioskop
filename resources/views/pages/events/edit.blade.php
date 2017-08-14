@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Event Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>
<div class="row mt">
	<div class="col-lg-12">
		<div class="form-panel">

      @include('partials.notif')

        @foreach($ticket as $ticket)
            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Ticket</h4>
                      <form class="form-horizontal style-form" method="post" action="{{ url('admin/manage/event/update/') }}">
                        {{ csrf_field() }} 
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Studio</label>
                              <div class="col-sm-9">
                                  <input type="number" class="form-control" name="studio" value="{{ $ticket->studio_id }}">
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="price" value="{{$ticket->price}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Play At</label>
                            <div class="col-sm-9">
                              <input type="time" class="form-control" name="play_at" value="{{$ticket->play_at}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">End At</label>
                            <div class="col-sm-9">
                              <input type="time" class="form-control" name="end_at" value="{{$ticket->end_at}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Start At</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" name="day_start" value="{{$ticket->start_at}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Expired At</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" name="day_end" value="{{$ticket->expired_at}}">
                            </div>
                          </div>
                           <div class="form-group">
                              <div class="col-md-12">
                              <input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="EDIT">
                            </div>
                          </div>
                          <input type="hidden" name="studio_id" value="{{ $ticket->studio_id }}"> 
                          <input type="hidden" name="play" value="{{$ticket->play_at}}"> 
                          <input type="hidden" name="end" value="{{$ticket->end_at}}"> 
                          <input type="hidden" name="start" value="{{$ticket->start_at}}"> 
                          <input type="hidden" name="finish" value="{{$ticket->expired_at}}">              
                      </form>
        @endforeach
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection