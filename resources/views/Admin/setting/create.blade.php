@extends('layouts.backend.app')
@section('styles')
<link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums title="Setting" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Setting', 'url' => route('admin.settings.index')],
            ['title' => 'Create', 'url' => route('admin.settings.create')],
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Setting</h3>
                </div>
                <form method="post" action="{{route('admin.settings.store')}}" enctype="multipart/form-data">
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
                        <label for="Icon">Icon</label>
                        <input type="file" name="iconFile" class="form-control {{ $errors->has('iconFile') ? 'is-invalid' : '' }}" id="icon" placeholder="Enter icon" accept="image/*" onchange="loadIcon(event)">
                        <img id="blahIcon" src="#" style="width:100px;" />
                        @if ($errors->has('iconFile'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('iconFile') }}
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
                        <label for="exampleInputDescription">Description Limit</label>
                        <input type="number" name="description_limit" class="form-control {{ $errors->has('description_limit') ? 'is-invalid' : '' }}" value="{{old('description_limit') ? old('description_limit') : 100}}" id="exampleInputDescription" placeholder="Enter description_limit">
                        @if ($errors->has('description_limit'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('description_limit') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLimit">Item Per Page</label>
                        <input type="number" name="item_perpage" class="form-control {{ $errors->has('item_perpage') ? 'is-invalid' : '' }}" value="{{old('item_perpage') ? old('item_perpage') : 20}}" id="exampleInputLimit" placeholder="Enter item_perpage">
                        @if ($errors->has('item_perpage'))
                        <span class="error invalid-feedback">
                            {{ $errors->first('item_perpage') }}
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
<script>
    
    $('#icon').change(function() {
        var file = this.files[0];
        var reader = new FileReader();
            reader.onload = function(e) {
            $('#blahIcon').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
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