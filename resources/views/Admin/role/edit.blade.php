@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Roles" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Roles', 'url' => route('admin.roles.index')],
            ['title' => 'Edit', 'url' => route('admin.roles.edit', $role->id)]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Roles</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.roles.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add New Leave Type</a>
                    </div>
                </div>
                <form action="{{route('admin.roles.update', $role->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Role Title</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Permissions</label> <br>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3">
                                        <input type="checkbox" name="permission[]" class="checkboxPrimary" value="{{$permission->name}}" @if($role->permissions->pluck('name')->contains($permission->name)) checked @endif> {{$permission->name}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" onclick="checkInput()"><i class="far fa-check-circle"></i> Check All</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        function checkInput()
        {
            $('.checkboxPrimary').prop('checked', !$('.checkboxPrimary').prop('checked'));
        }
    </script>
@endsection

