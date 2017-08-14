@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Event Page</h3>

@include('partials.notif')

<!-- COMPLEX TO DO LIST -->
<div class="row mt">
	<div class="col-md-5" style="margin-bottom:15px;">
		<section class="task-panel tasks-widget">
			<div class="panel-heading">
				<h5><i class="fa fa-tasks"></i> Create Tickets for film {{\App\Film::where('id',$data['film_id'])->first()->film_tittle}}</h5>
			</div>
			<div class="panel-body">
				<form class="form-horizontal style-form" method="post" action="{{url('admin/manage/event/store')}}">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="col-sm-3 control-label">Studio</label>
						<div class="col-sm-9">
							<select name="studio" class="form-control">
								@foreach($data['studio'] as $index => $studio)
									<option value="{{ $studio->id }}">{{ $studio->studio_number }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Price</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" name="price">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jumlah Tickets</label>
						<div class="col-sm-9">
							<select name="number_ticket" class="form-control">
									<option value="100">100</option>
									<option value="110">110</option>
									<option value="120">120</option>
									<option value="130">130</option>
									<option value="140">140</option>
									<option value="150">150</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Play At</label>
						<div class="col-sm-9">
							<input type="time" class="form-control" name="play_at">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">End At</label>
						<div class="col-sm-9">
							<input type="time" class="form-control" name="end_at">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Day Start</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" name="day_start">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Day Expired</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" name="day_end">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="hidden" name="film_id" value="{{$data['film_id']}}">
							<input type="submit" name="create" class="btn btn-success col-md-4 col-md-offset-4" value="CREATE">
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
	<div class="col-md-7">
		<section class="task-panel tasks-widget">
			<div class="panel-heading">
				<h5><i class="fa fa-tasks"></i> Ticket lists at this film</h5>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead class="cf">
						<tr>
							<th>No</th>
							<th class="hidden-phone">Studio</th>
							<th>Play At</th>
							<th>End At</th>
							<th class="hidden-phone">Start At</th>
							<th class="hidden-phone">End At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $data['list'] as $index => $list )
						<tr>
							<td data-title="No">{{ ++$index }}</td>
							<td data-title="studio" class="hidden-phone">{{ $list->studios()->first()->studio_number }}</td>
							<td data-title="play at">{{ $list->play_at }}</td>
							<td data-title="end at">{{ $list->end_at }}</td>
							<td data-title="start at" class="hidden-phone">{{ $list->start_at }}</td>
							<td data-title="expired at" class="hidden-phone">{{ $list->expired_at }}</td>

							<td class="text-center" data-title="Price">

								<a href="{{ url('admin/manage/event/edit') }}?film_id={{$list->film_id}}&play_at={{$list->play_at}}&end_at={{$list->end_at}}&start_at={{$list->start_at}}&expired_at={{$list->expired_at}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
								<a href="{{ url('admin/manage/event/detail') }}?film_id={{$list->film_id}}&play_at={{$list->play_at}}&end_at={{$list->end_at}}&start_at={{$list->start_at}}&expired_at={{$list->expired_at}}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i></a>
								<a href="{{ url('admin/manage/event/destroy') }}?film_id={{$list->film_id}}&play_at={{$list->play_at}}&end_at={{$list->end_at}}&start_at={{$list->start_at}}&expired_at={{$list->expired_at}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</section>
	</div><!-- /col-md-12-->
</div><!-- /row -->
@endsection