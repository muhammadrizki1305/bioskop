@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Studio Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">

			<h4 class="">
			<a href="{{ url('admin/manage/studio/create') }}" class="btn btn-success">
			<i class="fa fa-plus"></i> ADD
			</a>
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Studio Number</th>
						<th>Used</th>
						<th class="hidden-phone">Blocked</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['studios'] as $index => $studio )
					<tr @if($studio->is_blocked == 1) style="background-color:#aeb2b7;" @endif>
						<td data-title="No">{{ $studio->id }}</td>
						<td data-title="Film Name">{{ $studio->studio_number }}</td>
						@if( $studio->is_used == 1 )
							<td><span class="badge bg-theme04">Used</span></td>
						@else
							<td><span class="badge bg-theme02">Not Used</span></td>
						@endif
						@if( $studio->is_blocked == 1 )
							<td class="hidden-phone"><span class="badge bg-theme04">Blocked</span></td>
						@else
							<td class="hidden-phone"><span class="badge bg-theme02">Not Blocked</span></td>
						@endif
						<td class="text-center" data-title="Price">
							@if( $studio->is_blocked == 1 )
								<a href="{{ url('admin/manage/studio/change/'.$studio->id) }}?is_blocked=0" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
							@else
								<a href="{{ url('admin/manage/studio/change/'.$studio->id) }}?is_blocked=1" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></a>
							@endif
							<a href="{{ url('admin/manage/studio/edit/'.$studio->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/studio/destroy/'.$studio->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['studios']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection