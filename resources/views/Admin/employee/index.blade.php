@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Employees" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Setting', 'url' => route('admin.employees.index')]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Employees</h3>
                    <div class="card-tools">
                        {{-- @can('create-setting')
                            <a href="{{ route('admin.employers.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add Employer</a>
                        @endcan --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="container mb-5 row">
                        <div class="col-md-3">
                            <label for="filter_name">Employee Name</label>
                            <input type="text" id="filter_name" class="form-control" value="{{ $filters['name'] ?? '' }}" onblur="filterDatas()">
                        </div>
                        <div class="col-md-3">
                            <label for="filter_name">Employee Email</label>
                            <input type="text" id="filter_email" class="form-control" value="{{ $filters['email'] ?? '' }}" onblur="filterDatas()">
                        </div>
                        <div class="col-md-3">
                            <label for="filter_name">Employee Status</label>
                            <select id="filter_status" class="form-control" onblur="filterDatas()">
                                <option value="">Select Status</option>
                                @foreach ($data['status'] as $status)
                                    @if ($status['value'] == ($filters['status'] ?? ''))
                                    <option value="{{$status['value']}}" selected>{{$status['title']}}</option>
                                    @else
                                    <option value="{{$status['value']}}">{{$status['title']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $k=>$employee)
                                <tr>
                                    <td>{{++$k}}</td>
                                    <td><img src="{{$employee->avatar_path}}" class="img-circle" style="width:50px;" srcset="{{$employee->avatar_path}}"></td>
                                    <td>
                                        {{$employee->name}}
                                        @if ($employee->is_freelancer == 1)
                                            <span class="badge bg-warning">Freelancer</span>
                                        @endif
                                    </td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->address}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->status_title}}</td>
                                    <td>
                                        <form action="{{route('admin.employees.destroy', $employee->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            @can('update-employee')
                                            @if($employee->status == 1)
                                            <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-ban"></i></a>
                                            @else
                                            <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-sm btn-success"><i class="fas fa-user-check"></i></a>
                                            @endif
                                            @endcan
                                            @can('delete-employee')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete This?')" ><i class="far fa-trash-alt"></i></button>
                                            @endcan
                                        </form>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="alert alert-secondary">
                                            No Employee Found!
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        {{$employees->links()}}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        function filterDatas() {
            const baseUrl = "{{ route('admin.employees.index') }}";
            const queryParams = [];

            const name = $('#filter_name').val();
            if (name) {
                queryParams.push(`name=${name}`);
            }
            const email = $('#filter_email').val();
            if (email) {
                queryParams.push(`email=${email}`);
            }
            const status = $('#filter_status').val();
            if (status) {
                queryParams.push(`status=${status}`);
            }

            const url = baseUrl + (queryParams.length ? `?${queryParams.join('&')}` : '');
            location.href = url;
        }
    </script>
@endsection
