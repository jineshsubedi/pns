@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Roles" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Roles', 'url' => route('admin.roles.index')]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Roles</h3>
                    <div class="card-tools">
                        @can('create-role')
                            <a href="{{ route('admin.roles.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add Role</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $k=>$role)
                            <tr>
                                <td>{{++$k}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    <form action="{{route('admin.roles.destroy', $role->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @can('update-role')
                                            <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                        @endcan
                                        @can('delete-user')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete This?')" ><i class="far fa-trash-alt"></i></button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    <div class="alert alert-secondary">
                                        No Roles Found!
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    {{$roles->links()}}
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
