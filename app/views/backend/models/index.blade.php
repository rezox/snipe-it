@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Asset Models ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>
		Asset Models

		<div class="pull-right">
			<a href="{{ route('create/model') }}" class="btn-flat success"><i class="icon-plus-sign icon-white"></i> Create New</a>
		</div>
	</h3>
</div>
@if ($models->getTotal() > 10)
{{ $models->links() }}
@endif

<div class="row-fluid table">
<table class="table table-hover">
	<thead>
		<tr>
			<th class="span6">@lang('admin/models/table.title')</th>
			<th class="span4">@lang('admin/models/table.modelnumber')</th>
			<th class="span1">@lang('admin/models/table.numassets')</th>
			<th class="span1">@lang('admin/models/table.created_at')</th>
			<th class="span2">@lang('table.actions')</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($models as $model)
		<tr>
			<td>{{ $model->name }}



			</td>
			<td>{{ $model->modelno }}</td>
			<td>{{ ($model->assets->count()) }}</td>
			<td>{{ $model->created_at->diffForHumans() }}</td>
			<td nowrap="nowrap">
				<a href="{{ route('update/model', $model->id) }}" class="btn-flat white">@lang('button.edit')</a>
				<a href="{{ route('delete/model', $model->id) }}" class="btn-flat danger">@lang('button.delete')</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>


@if ($models->getTotal() > 10)
{{ $models->links() }}
@endif

@stop
