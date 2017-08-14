@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Admin Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">
			@if(Auth::user()->role_id == 1)
			<h4 class="">
				<a href="{{ url('admin/manage/admin/create') }}" class="btn btn-success">
					<i class="fa fa-plus"></i> ADD
				</a>
			</h4>
			@else

			@endif
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
					@foreach( $data['admins'] as $index => $admin )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Level">{{ $admin->username }}</td>
						<td data-title="Username" class="hidden-phone">{{ $admin->email }}</td>
						<td data-title="Github" class="hidden-phone">{{ $admin->created_at }}</td>
						@if(Auth::user()->role_id == 1)
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/admin/edit/'.$admin->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{ url('admin/manage/admin/destroy/'.$admin->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
						@else

						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['admins']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection