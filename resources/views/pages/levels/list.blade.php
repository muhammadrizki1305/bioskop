@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Level Page</h3>
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
			<a href="{{ url('admin/manage/level/create') }}" class="btn btn-success">
			<i class="fa fa-plus"></i> ADD
			</a>
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Level</th>
						<th class="text-center">Total Course</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['levels'] as $index => $level )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Level">{{ $level->level_name }}</td>
						<td class="text-center">
							<strong>{{ $level->courses()->count() }}</strong>
						</td>
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/level/edit/'.$level->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/level/destroy/'.$level->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['levels']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection