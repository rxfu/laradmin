@extends('layouts.app')

@section('title', '显示' . __('password.module'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">显示{{ __('password.module') }}: {{ $item->getKey() }}</h3>
            </div>

            <div class="card-body">
                
            </div>

            <div class="card-footer">
                <div class="row justify-content-sm-center">
                    <a href="{{ route('passwords.edit', $item->getKey()) }}" title="编辑" class="btn btn-info">
                        <i class="fas fa-pencil-alt"></i> 编辑
                    </a>
                    &nbsp;&nbsp;
                    <a href="{{ route('passwords.destroy', $item->getKey()) }}" class="btn btn-danger delete" title="删除">
                        <i class="fas fa-trash"></i> 删除
                    </a>
                </div>
            </div>
            <form id="delete-form" action="{{ route('passwords.destroy', $item->getKey()) }}" method="post" style="display: none;">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
@endsection
