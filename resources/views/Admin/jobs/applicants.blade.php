@extends('layouts.backend.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Content Header (Page header) -->
        <x-breadcrums title="Jobs" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Jobs', 'url' => route('admin.jobs.index')],
            ['title' => 'Applicants', 'url' => route('admin.jobs.applicants', $job->id)],
        ]" />
        <!-- /.content-header -->

        <div class="content">
            <div class="container-fluid">
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">{{ $job->title }}</h3>
                        {{-- <div class="card-tools">
                        @can('create-setting')
                            <a href="{{ route('admin.jobs.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add Jobs</a>
                        @endcan
                    </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Employer</th>
                                        <th>Title</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                        <th>Position</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $job->employer->name ?? '' }}</td>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ $job->code }}</td>
                                        <td>{{ $job->type }}</td>
                                        <td>{{ $job->category->title ?? '' }}</td>
                                        <td>{{ $job->position }}</td>
                                        <td>{{ $job->start_date }}</td>
                                        <td>{{ $job->end_date }}</td>
                                        <td>{{ $job->status_title }}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="9">
                                            <h4 class="card-title">Job Applications</h4>
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                        <div class="row mt-3">
                            @foreach ($applicants as $user)
                                <div class="col-md-4 card card-success collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{$user->employee->name ?? ''}}</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        {!!$user->employee->detail ? $user->employee->detail->bio : ''!!}
                                    </div>
                                </div>
                            @endforeach
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
            const baseUrl = "{{ route('admin.jobs.applicants', $job->id) }}";
            const queryParams = [];

            const status = $('#filter_status').val();
            if (status) {
                queryParams.push(`status=${status}`);
            }

            const url = baseUrl + (queryParams.length ? `?${queryParams.join('&')}` : '');
            location.href = url;
        }
    </script>
@endsection
