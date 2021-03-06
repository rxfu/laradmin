@extends('layouts.app')

@section('title', __('Show') . __('menuitem.module'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('Show') . __('menuitem.module') }}: {{ $item->getKey() }}</h3>
            </div>

            <div class="card-body">
                
                <div class="form-group row">
                    <label for="id" class="col-sm-3 col-form-label text-right">{{ __('menuitem.id') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ $item->id }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="slug" class="col-sm-3 col-form-label text-right">{{ __('menuitem.slug') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ $item->slug }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label text-right">{{ __('menuitem.name') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ $item->name }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="route" class="col-sm-3 col-form-label text-right">{{ __('menuitem.route') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ $item->route }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="icon" class="col-sm-3 col-form-label text-right">{{ __('menuitem.icon') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ $item->icon }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="parent_id" class="col-sm-3 col-form-label text-right">{{ __('menuitem.parent_id') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ optional($item->parent)->name }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="menu_id" class="col-sm-3 col-form-label text-right">{{ __('menuitem.menu_id') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ optional($item->menu)->name }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label text-right">{{ __('menuitem.description') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ $item->description }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="is_enable" class="col-sm-3 col-form-label text-right">{{ __('menuitem.is_enable') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ $item->present()->isEnable }}</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="order" class="col-sm-3 col-form-label text-right">{{ __('menuitem.order') }}</label>
                    <div class="col-sm-9">
                        <div class="form-control-plaintext">{{ $item->order }}</div>
                    </div>
                </div>
            </div>

            @unless($item->is_system)
                <div class="card-footer">
                    <div class="row justify-content-sm-center">
                        @can('update', $item)
                            <a href="{{ route('menuitems.edit', $item) }}" class="btn btn-info" title="{{ __('Edit') }}">
                                <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                            </a>
                        @endcan
                        &nbsp;&nbsp;
                        @can('delete', $item)
                            <a href="{{ route('menuitems.destroy', $item) }}" class="btn btn-danger delete" title="{{ __('Delete') }}" data-toggle="modal" data-target="#dialog" data-whatever="{{ __('Confirm') . __('Delete') }}">
                                <i class="fas fa-trash"></i> {{ __('Delete') }}
                            </a>
                        @endcan
                    </div>
                </div>
                @can('delete', $item)
                    <form id="delete-form" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                @endcan
            @endunless
        </div>
    </div>
</div>
@endsection
