@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Category" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Category', 'url' => route('admin.category.index')]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category</h3>
                    <div class="card-tools">
                        @can('create-category')
                            <a href="{{ route('admin.category.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add Category</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $k=>$category)
                            <tr>
                                <td>{{++$k}}</td>
                                <td>{{$category->title}}</td>
                                <td><i class="fas {{$category->icon}}"></i></td>
                                <td>
                                    <form action="{{route('admin.category.destroy', $category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @can('update-category')
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
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
                                        No Category Found!
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    {{$categories->links()}}
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
