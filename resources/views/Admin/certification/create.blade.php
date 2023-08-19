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
    <x-breadcrums title="Certification" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Certification', 'url' => route('admin.certification.index')],
            ['title' => 'Create', 'url' => route('admin.certification.create')],
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Certification</h3>
                </div>
                <form method="post" action="{{route('admin.certification.store')}}" enctype="multipart/form-data">
                @csrf
                <div class=" card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Title</label>
                        <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{old('title')}}" id="exampleInputName" placeholder="Enter title">
                        @if ($errors->has('title'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('title') }}
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logoFile" class="form-control {{ $errors->has('logoFile') ? 'is-invalid' : '' }}" id="logo" placeholder="Enter logo" accept="image/*" onchange="loadLogo(event)">
                        <img id="blahLogo" src="#" style="width:100px;" />
                        @if ($errors->has('logoFile'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('logoFile') }}
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
    $('#logo').change(function() {
        var file = this.files[0];
        var reader = new FileReader();
            reader.onload = function(e) {
            $('#blahLogo').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    });
</script>
@endsection
