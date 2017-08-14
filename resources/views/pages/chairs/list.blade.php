@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Chair Page</h3>
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
			<a href="{{ url('admin/manage/chair/create') }}" class="btn btn-success">
			<i class="fa fa-plus"></i> ADD
			</a>
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Chair Number</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['chairs'] as $index => $chair )
					<tr>
						<td data-title="No">{{ $chair->id }}</td>
						<td data-title="Film Name">{{ $chair->chair_number }}</td>
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/chair/edit/'.$chair->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/chair/destroy/'.$chair->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['chairs']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection