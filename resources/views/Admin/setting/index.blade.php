@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Settings" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Setting', 'url' => route('admin.settings.index')]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Settings</h3>
                    <div class="card-tools">
                        @can('create-setting')
                            <a href="{{ route('admin.settings.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add setting</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>logo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($settings as $k=>$setting)
                            <tr>
                                <td>{{++$k}}</td>
                                <td>{{$setting->name}}</td>
                                <td>{{$setting->email}}</td>
                                <td>
                                    @if ($setting->logo != '')
                                        <img src="{{$setting->logo_path}}" width="100px">
                                    @endif
                                </td>
                                <td>{!!$setting->status_title!!}</td>
                                <td>
                                    
                                    <form action="{{route('admin.settings.destroy', $setting->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @can('update-setting')
                                        <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                        @endcan
                                        @can('delete-setting')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete This?')" ><i class="far fa-trash-alt"></i></button>
                                        @endcan
                                    </form>
                                    
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <div class="alert alert-secondary">
                                        No Setting Found!
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    {{$settings->links()}}
                                </td>
                            </tr>                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
