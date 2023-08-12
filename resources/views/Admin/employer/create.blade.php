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
    <x-breadcrums title="Employer" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Employer', 'url' => route('admin.employers.index')],
            ['title' => 'Create', 'url' => route('admin.employers.create')],
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Employer</h3>
                </div>
                <form method="post" action="{{route('admin.employers.store')}}" enctype="multipart/form-data">
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
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{old('password')}}" id="exampleInputPassword" placeholder="Enter password">
                        @if ($errors->has('password'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('password') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">Address</label>
                        <input type="text" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" value="{{old('address')}}" id="exampleInputAddress" placeholder="Enter address">
                        @if ($errors->has('address'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('address') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone">Phone</label>
                        <input type="number" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{old('phone')}}" id="exampleInputPhone" placeholder="Enter phone">
                        @if ($errors->has('phone'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('phone') }}
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
                        <label class="required">Template Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control summernote {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('description'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('description') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputStatus">Status</label>
                        <select name="status" id="exampleInputStatus" class="form-control {{ $errors->has('item_perpage') ? 'is-invalid' : '' }}">
                            <option value="">Select Status</option>
                            @foreach ($data['status'] as $status)
                                @if ($status['value'] == old('status'))
                                <option value="{{$status['value']}}" selected>{{$status['title']}}</option>
                                @else
                                <option value="{{$status['value']}}">{{$status['title']}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('item_perpage'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('item_perpage') }}
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
