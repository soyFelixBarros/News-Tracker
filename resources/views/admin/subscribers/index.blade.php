@extends('layouts.admin')
@section('title', 'Subscribers')
@section('content.admin')
<div class="card">
	<div class="card-header clearfix">
		<div class="float-left">
			<h3>Subscribers</h3>
		</div>
		<div class="float-right">
			<a href="{{ route('admin_subscribers_create') }}" class="btn btn-success" role="button"><span class="glyphicon glyphicon-plus"></span> Create</a>	
		</div>
	</div>
	<div class="card-body">
		@if (count($subscribers) > 0)
		<div class="table-responsive">
			<table class=table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($subscribers as $subscriber)
					<tr>
						<td>{{ $subscriber->id }}</td>
						<th scope=row>{{ $subscriber->email }}</th>
						<th class="text-right"><a href="{{ route('admin_subscribers_edit', ['id' => $subscriber->id]) }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></th>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
			{{ $subscribers->links() }}
			</div>
		</div><!-- .table-responsive -->
		@endif
	</div>
</div>
@endsection