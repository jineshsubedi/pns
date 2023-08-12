@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Employers" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Setting', 'url' => route('admin.employers.index')]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Employers</h3>
                    <div class="card-tools">
                        @can('create-setting')
                            <a href="{{ route('admin.employers.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add Employer</a>
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
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employers as $k=>$employer)
                            <tr>
                                <td>{{++$k}}</td>
                                <td>{{$employer->name}}</td>
                                <td>{{$employer->email}}</td>
                                <td>{{$employer->address}}</td>
                                <td>{{$employer->phone}}</td>
                                <td>

                                    <form action="{{route('admin.employers.destroy', $employer->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @can('read-employer')
                                        <a href="{{ route('admin.employers.show', $employer->id) }}" class="btn btn-sm btn-info"><i class="far fa-eye"></i></a>
                                        @endcan
                                        @can('update-employer')
                                        <a href="{{ route('admin.employers.edit', $employer->id) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                        @endcan
                                        @can('delete-employer')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete This?')" ><i class="far fa-trash-alt"></i></button>
                                        @endcan
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <div class="alert alert-secondary">
                                        No Employer Found!
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    {{$employers->links()}}
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
