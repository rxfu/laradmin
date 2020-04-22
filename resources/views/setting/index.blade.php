@extends('layouts.app')

@section('title', __('setting.module') . '列表')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('setting.module') }}列表</h3>
                <div class="card-tools">
                    <a href="{{ route('settings.create') }}" title="创建" class="btn btn-success">
                        <i class="icon fa fa-plus"></i> 创建{{ __('setting.module') }}
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table id="settings-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('setting.id') }}</th>
							<th>{{ __('setting.name') }}</th>
							<th>{{ __('setting.value') }}</th>
							<th>{{ __('setting.description') }}</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->value }}</td>
								<td>{{ $item->description }}</td>
                                <td>
                                    <a href="{{ route('settings.show', $item->getKey()) }}" class="btn btn-primary btn-sm" title="显示">
                                        <i class="fas fa-folder"></i> 显示
                                    </a>
                                    <a href="{{ route('settings.edit', $item->getKey()) }}" class="btn btn-info btn-sm" title="编辑">
                                        <i class="fas fa-pencil-alt"></i> 编辑
                                    </a>
                                    <a href="{{ route('settings.destroy', $item->getKey()) }}" class="btn btn-danger btn-sm delete" title="删除">
                                        <i class="fas fa-trash"></i> 删除
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>{{ __('setting.id') }}</th>
							<th>{{ __('setting.name') }}</th>
							<th>{{ __('setting.value') }}</th>
							<th>{{ __('setting.description') }}</th>
                            <th>操作</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <form id="delete-form" method="post" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
	$('#settings-table').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'language': {
            'url': "{{ asset('plugins/datatables/lang/Chinese.json') }}"
        }
    });
</script>
@endpush