@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Jobs" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Setting', 'url' => route('admin.jobs.index')]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Jobs</h3>
                    <div class="card-tools">
                        @can('create-setting')
                            <a href="{{ route('admin.jobs.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add Jobs</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="container mb-5 row">
                        <div class="col-md-3">
                            <label for="filter_title">Job Title</label>
                            <input type="text" id="filter_title" class="form-control" value="{{ $filters['title'] ?? '' }}" onblur="filterDatas()">
                        </div>
                        <div class="col-md-3">
                            <label for="filter_code">Job Code</label>
                            <input type="text" id="filter_code" class="form-control" value="{{ $filters['code'] ?? '' }}" onblur="filterDatas()">
                        </div>
                        <div class="col-md-3">
                            <label for="filter_status">Job Status</label>
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
                                    <th>Employer</th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobs as $k=>$job)
                                <tr>
                                    <td>{{++$k}}</td>
                                    <td>{{$job->employer->name ?? ''}}</td>
                                    <td>{{$job->title}}</td>
                                    <td>{{$job->code}}</td>
                                    <td>{{$job->type}}</td>
                                    <td>{{$job->category->title ?? ''}}</td>
                                    <td>{{$job->start_date}}</td>
                                    <td>{{$job->end_date}}</td>
                                    <td>{{$job->status_title}}</td>
                                    <td>
                                        <form action="{{route('admin.jobs.destroy', $job->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            @can('update-jobs')
                                            <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                            @endcan
                                            @can('delete-jobs')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete This?')" ><i class="far fa-trash-alt"></i></button>
                                            @endcan
                                        </form>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">
                                        <div class="alert alert-secondary">
                                            No Jobs Found!
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">
                                        {{$jobs->links()}}
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
            const baseUrl = "{{ route('admin.jobs.index') }}";
            const queryParams = [];

            const title = $('#filter_title').val();
            if (title) {
                queryParams.push(`title=${title}`);
            }
            const code = $('#filter_code').val();
            if (code) {
                queryParams.push(`code=${code}`);
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
