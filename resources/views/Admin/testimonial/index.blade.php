@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Testimonial" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Testimonial', 'url' => route('admin.testimonials.index')]
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Testimonial</h3>
                    <div class="card-tools">
                        @can('create-testimonial')
                            <a href="{{ route('admin.testimonials.create') }}" class="right btn btn-sm btn-info"><i class="fa fa-plus-circle"></i> Add Testimonial</a>
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
                                <th>Designation</th>
                                <th>Organization</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonials as $k=>$testimonial)
                            <tr>
                                <td>{{++$k}}</td>
                                <td>{{$testimonial->name}}</td>
                                <td>{{$testimonial->email}}</td>
                                <td>{{$testimonial->designation}}</td>
                                <td>{{$testimonial->organization}}</td>
                                <td>
                                    <form action="{{route('admin.testimonials.destroy', $testimonial->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @can('update-testimonial')
                                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i></a>
                                        @endcan
                                        @can('delete-user')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete This?')" ><i class="far fa-trash-alt"></i></button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <div class="alert alert-secondary">
                                        No Testimonial Found!
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    {{$testimonials->links()}}
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
