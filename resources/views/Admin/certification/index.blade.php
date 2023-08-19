@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Certification" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Certification', 'url' => route('admin.certification.index')]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Certification</h3>
                    <div class="card-tools">
                        @can('create-setting')
                            <a href="{{ route('admin.certification.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add certification</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Published On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($certifications as $k=>$certification)
                                <tr>
                                    <td>{{++$k}}</td>
                                    <td>{{$certification->title}}</td>
                                    <td>{{$certification->created_at}}</td>
                                    <td>
                                        <form action="{{route('admin.certification.destroy', $certification->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.certification.edit', $certification->id) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete This?')" ><i class="far fa-trash-alt"></i></button>
                                        </form>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-secondary">
                                            No certification Found!
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        {{$certifications->links()}}
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
            const baseUrl = "{{ route('admin.certification.index') }}";
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
