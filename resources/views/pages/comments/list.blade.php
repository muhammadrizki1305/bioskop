@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Comment Page</h3>
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
						<th>Text</th>
						<th class="text-center hidden-phone">Created Since</th>
						<th class="text-center">USER</th>
						<th class="text-center hidden-phone">Playlist</th>
						<th class="text-center hidden-phone">Status</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['comments'] as $index => $comment )
					<tr @if($comment->is_blocked == 1) style="background: #aeb2b7" @endif>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Comment Text">{{ $comment->comment_text }}</td>
						<td class="text-center hidden-phone">{{ $comment->created_at }}</td>
						<td class="text-center">
							<strong>{{ $comment->users()->first()->username }}</strong>
						</td>
						<td class="text-center hidden-phone">
							{{ $comment->playlists()->first()->playlists_name }}
						</td>
						<td class="text-center hidden-phone" data-title="Price">
							@if($comment->is_blocked == 1)
								<span class="badge bg-theme04">Blocked</span>
							@else
								<span class="badge bg-theme02">Not Blocked</span>
								@endif
						</td>
						<td class="text-center" data-title="Price">
							@if($comment->is_blocked == 1)
								<a href="{{ url('admin/manage/comment/update') }}?id={{$comment->id}}&is_blocked=0" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top"><i class="fa fa-check"></i></a>
							@else
								<a href="{{ url('admin/manage/comment/update') }}?id={{$comment->id}}&is_blocked=1" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></a>
							@endif
							<a href="{{ url('admin/manage/comment/detail/'.$comment->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['comments']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection