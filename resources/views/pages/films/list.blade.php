@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Film Page</h3>
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
			<a href="{{ url('admin/manage/film/create') }}" class="btn btn-success">
			<i class="fa fa-plus"></i> ADD
			</a>
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Film Name</th>
						<th class="hidden-phone">Created Since</th>
						<th class="hidden-phone">Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['films'] as $index => $film )
					<tr @if($film->is_blocked == 1) style="background-color:#aeb2b7;" @endif>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Film Name">{{ $film->film_tittle }}</td>
						<td data-title="Price" class="hidden-phone">{{ $film->created_at }}</td>
						@if( $film->is_blocked == 1 )
							<td class="hidden-phone"><span class="badge bg-theme04">Blocked</span></td>
						@else
							<td class="hidden-phone"><span class="badge bg-theme02">Not Blocked</span></td>
						@endif
						<td class="text-center" data-title="Price">
							@if( $film->is_blocked == 1 )
								<a href="{{ url('admin/manage/film/change/'.$film->id) }}?is_blocked=0" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
							@else
								<a href="{{ url('admin/manage/film/change/'.$film->id) }}?is_blocked=1" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></a>
							@endif
							<a href="{{ url('admin/manage/film/edit/'.$film->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/film/detail/'.$film->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i></a>
							<a href="{{ url('admin/manage/film/destroy/'.$film->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['films']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection