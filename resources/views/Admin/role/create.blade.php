@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Roles" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Roles', 'url' => route('admin.roles.index')],
            ['title' => 'Create', 'url' => route('admin.roles.create')],
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Role</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.roles.store')}}">
                        @csrf
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="roleFOrmContainer">
                            <tr id="roles-0">
                                <td>
                                    <input type="text" name="title[]" class="form-control" placeholder="Role Title">
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
            var formHTML = '<tr id="roles-'+count+'"><td><input type="text" name="title[]" class="form-control" placeholder="Role Title"></td><td><button type="button" class="btn btn-sm btn-danger" onclick="removeForm('+count+')"><i class="far fa-trash-alt"></i></button></td></tr>';

            $('#roleFOrmContainer').append(formHTML);
        }

        function removeForm(id)
        {
            $('#roles-'+id).remove();
        }
    </script>
@endsection