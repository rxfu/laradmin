@extends('layouts.app')

@section('title', __('user.module') . __('List'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('user.module') . __('List') }}</h3>
                <div class="card-tools">
                    @can('create', User::class)
                        <a href="{{ route('users.create') }}" title="{{ __('Create') }}" class="btn btn-success">
                            <i class="icon fa fa-plus"></i> {{ __('Create') . __('user.module') }}
                        </a>
                    @endcan
                </div>
            </div>

            <div class="card-body">
                <table id="users-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('user.id') }}</th>
							<th>{{ __('user.username') }}</th>
							<th>{{ __('user.name') }}</th>
							<th>{{ __('user.email') }}</th>
							<th>{{ __('user.is_enable') }}</th>
							<th>{{ __('user.is_super') }}</th>
							<th>{{ __('user.last_login_at') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
								<td>{{ $item->username }}</td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->email }}</td>
								<td>{{ $item->present()->isEnable }}</td>
								<td>{{ $item->present()->isSuper }}</td>
								<td>{{ $item->last_login_at }}</td>
                                <td>
                                    <a href="{{ route('users.show', $item) }}" class="btn btn-primary btn-sm" title="{{ __('Show') }}">
                                        <i class="fas fa-folder"></i> {{ __('Show') }}
                                    </a>
                                    <a href="{{ route('users.edit', $item) }}" class="btn btn-info btn-sm" title="{{ __('Edit') }}">
                                        <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                                    </a>
                                    <a href="{{ route('users.destroy', $item) }}" class="btn btn-danger btn-sm delete" title="{{ __('Delete') }}" data-toggle="modal" data-target="#dialog" data-whatever="{{ __('Confirm') . __('Delete') }}">
                                        <i class="fas fa-trash"></i> {{ __('Delete') }}
                                    </a>
                                    <a href="{{ route('passwords.edit', $item) }}" class="btn btn-secondary btn-sm reset" title="{{ __('Reset Password') }}" data-toggle="modal" data-target="#dialog" data-whatever="{{ __('Reset Password') }}">
                                        <i class="fas fa-key"></i> {{ __('Reset Password') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>{{ __('user.id') }}</th>
							<th>{{ __('user.username') }}</th>
							<th>{{ __('user.name') }}</th>
							<th>{{ __('user.email') }}</th>
							<th>{{ __('user.is_enable') }}</th>
							<th>{{ __('user.is_super') }}</th>
							<th>{{ __('user.last_login_at') }}</th>
                            <th>{{ __('Action') }}</th>
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
	$('#users-table').DataTable({
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