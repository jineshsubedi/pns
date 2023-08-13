@extends('layouts.backend.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}" />
<link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Testimonial" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Testimonial', 'url' => route('admin.testimonials.index')],
            ['title' => 'Create', 'url' => route('admin.testimonials.create')],
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Testimonial</h3>
                </div>
                <form method="post" action="{{route('admin.testimonials.store')}}" enctype="multipart/form-data">
                @csrf
                <div class=" card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{old('name')}}" id="exampleInputName" placeholder="Enter Name">
                        @if ($errors->has('name'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('name') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{old('email')}}" id="exampleInputEmail1" placeholder="Enter email">
                        @if ($errors->has('email'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputOrg">Organization</label>
                        <input type="text" name="organization" class="form-control {{ $errors->has('organization') ? 'is-invalid' : '' }}" value="{{old('organization')}}" id="exampleInputOrg" placeholder="Enter organization">
                        @if ($errors->has('organization'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('organization') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDesignation">Designation</label>
                        <input type="text" name="designation" class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}" value="{{old('designation')}}" id="exampleInputdesignation" placeholder="Enter designation">
                        @if ($errors->has('designation'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('designation') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="required">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control summernote {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
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
@section('scripts')
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $('.summernote').summernote({
            height: 250,
            dialogsInBody: true
        });
</script>
@endsection
