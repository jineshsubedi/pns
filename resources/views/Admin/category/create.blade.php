@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Category" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Categories', 'url' => route('admin.category.index')],
            ['title' => 'Create', 'url' => route('admin.category.create')],
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Category</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.category.store')}}">
                        @csrf
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="categoryFOrmContainer">
                            <tr id="categorys-0">
                                <td>
                                    <input type="text" name="title[]" class="form-control" placeholder="category Title">
                                </td>
                                <td>
                                    <input type="text" name="icon[]" class="form-control" placeholder="category Icon">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeForm(0)">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-paper-plane"></i> submit</button>
                                </td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="addMoreForm()"><i class="far fa-plus-square"></i></button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        let count = 0;
        function addMoreForm()
        {
            count++;
            var formHTML = '<tr id="categorys-'+count+'"><td><input type="text" name="title[]" class="form-control" placeholder="category Title"></td><td><input type="text" name="icon[]" class="form-control" placeholder="category Icon"></td><td><button type="button" class="btn btn-sm btn-danger" onclick="removeForm('+count+')"><i class="far fa-trash-alt"></i></button></td></tr>';

            $('#categoryFOrmContainer').append(formHTML);
        }

        function removeForm(id)
        {
            $('#categorys-'+id).remove();
        }
    </script>
@endsection
