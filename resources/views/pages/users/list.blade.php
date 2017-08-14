@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> User Account Page</h3>
<div class="row mt">
	<div class="col-lg-12">
		<p>Place your content here.</p>
	</div>
</div>

@include('partials.notif')

<div class="row mt">
	<div class="col-lg-12">
		<div class="content-panel">
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Username</th>
						<th class="hidden-phone">Email</th>
						<th class="hidden-phone">User Github</th>
						<th class="hidden-phone">Crated Since</th>
						<th class="text-center">Verfication</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['user'] as $index => $user )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Level">{{ $user->username }}</td>
						<td data-title="Username" class="hidden-phone">{{ $user->email }}</td>
						<td data-title="Github" class="hidden-phone">{{ $user->user_github }}</td>
						<td data-title="Github" class="hidden-phone">{{ $user->created_at }}</td>
						<td class="text-center">
							@if($user->status != 1)
								<span class="badge bg-theme04">Not Verified</span>
							@else
								<span class="badge bg-theme02">Verified</span>
								@endif
						</td>
						<td class="text-center" data-title="Price">
							<a href="{{ url('admin/manage/users/detail/'.$user->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['user']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection