@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Operator Page</h3>
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
				<a href="{{ url('admin/manage/operator/create') }}" class="btn btn-success">
					<i class="fa fa-plus"></i> ADD
				</a>
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Username</th>
						<th class="hidden-phone">Email</th>
						<th class="hidden-phone">Created Since</th>
						@if(Auth::user()->role_id == 1)
						<th class="text-center">Action</th>
						@else

						@endif
					</tr>
				</thead>
				<tbody>
					@foreach( $data['operators'] as $index => $operator )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Level">{{ $operator->username }}</td>
						<td data-title="Username" class="hidden-phone">{{ $operator->email }}</td>
						<td data-title="Github" class="hidden-phone">{{ $operator->created_at }}</td>
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/operator/edit/'.$operator->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/operator/destroy/'.$operator->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['operators']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection