@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Category" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Categories', 'url' => route('admin.category.index')],
            ['title' => 'Edit', 'url' => route('admin.category.edit', $category->id)]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Category</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.category.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add New Category</a>
                    </div>
                </div>
                <form action="{{route('admin.category.update', $category->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">category Title</label>
                            <input type="text" name="title" class="form-control" id="name" value="{{$category->title}}">
                        </div>
                        <div class="form-group">
                            <label for="name">category Icon</label>
                            <input type="text" name="icon" class="form-control" id="name" value="{{$category->icon}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

