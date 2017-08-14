@extends('partials.master')
@section('content')
<h3><i class="fa fa-angle-right"></i> Subscribe Page</h3>
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
			<i class="fa fa-plus"></i> Subscriber Lists
			</h4>
			<h4 class="">
			<i class="fa fa-minus"></i> Total : {{ $data['subscribes']->count() }}
			</h4>
			<table class="table table-bordered">
				<thead class="cf">
					<tr>
						<th>No</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $data['subscribes'] as $index => $subscribe )
					<tr>
						<td data-title="No">{{ ++$index }}</td>
						<td data-title="Category">{{ $subscribe->email }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $data['subscribes']->render() }}
			</div>
			</div><!-- /content-panel -->
			</div><!-- /col-lg-12 -->
			</div><!-- /row -->
			@endsection