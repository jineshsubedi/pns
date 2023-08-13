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
    <x-breadcrums title="Jobs" :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Jobs', 'url' => route('admin.jobs.index')],
            ['title' => 'Edit', 'url' => route('admin.jobs.edit', $job->id)],
        ]" />
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Job</h3>
                </div>
                <form method="post" action="{{route('admin.jobs.update', $job->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="exampleInputName">Title</label>
                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{old('title', $job->title)}}" id="exampleInputtitle" placeholder="Enter title">
                            @if ($errors->has('title'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('title') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputcode">Position</label>
                            <input type="number" name="position" class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" value="{{old('position', $job->position)}}" id="exampleInputcode" placeholder="Enter position">
                            @if ($errors->has('position'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('position') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputtype">Type</label>
                            <select name="type" id="exampleInputtype" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
                                <option value="">Select Option</option>
                                @foreach ($data['type'] as $type)
                                    @if ($type == old('type', $job->type))
                                    <option value="{{$type}}" selected>{{$type}}</option>
                                    @else
                                    <option value="{{$type}}">{{$type}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('type'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('type') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputcategory">Category</label>
                            <select name="category_id" id="exampleInputcategory" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                <option value="">Select Option</option>
                                @foreach ($categories as $category)
                                    @if ($category->id == old('category_id', $job->category_id))
                                    <option value="{{$category->id}}" selected>{{$category->title}}</option>
                                    @else
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('category_id') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputcode">Start Date</label>
                            <input type="date" name="start_date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" value="{{old('start_date', $job->start_date)}}" id="exampleInputcode" placeholder="Enter start_date">
                            @if ($errors->has('start_date'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('start_date') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputcode">End Date</label>
                            <input type="date" name="end_date" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" value="{{old('end_date', $job->end_date)}}" id="exampleInputcode" placeholder="Enter end_date">
                            @if ($errors->has('end_date'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('end_date') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputnegotiable">Negotiable</label>
                            <select name="negotiable" id="exampleInputnegotiable" class="form-control {{ $errors->has('negotiable') ? 'is-invalid' : '' }}">
                                <option value="">Select Option</option>
                                @foreach ($data['status'] as $status)
                                    @if ($status['value'] == old('negotiable', $job->negotiable))
                                    <option value="{{$status['value']}}" selected>{{$status['title']}}</option>
                                    @else
                                    <option value="{{$status['value']}}">{{$status['title']}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('negotiable'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('negotiable') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group" id="jobSalary">
                            <label for="exampleInputcode">Salary</label>
                            <input type="text" name="salary" class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" value="{{old('salary', $job->salary)}}" id="exampleInputcode" placeholder="Enter salary">
                            @if ($errors->has('salary'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('salary') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="logo">Image</label>
                            <input type="file" name="logoFile" class="form-control {{ $errors->has('logoFile') ? 'is-invalid' : '' }}" id="logo" placeholder="Enter logo" accept="image/*" onchange="loadLogo(event)">
                            <img id="blahLogo" src="{{$job->image_thumb}}" style="width:100px;" />
                            @if ($errors->has('logoFile'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('logoFile') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputemployer_id">Employer</label>
                            <select name="employer_id" id="exampleInputemployer_id" class="form-control select2 {{ $errors->has('employer_id') ? 'is-invalid' : '' }}">
                                <option value="">Select Option</option>
                                @foreach ($employers as $employee)
                                    @if ($employee->id == old('employer_id', $job->employer_id))
                                    <option value="{{$employee->id}}" selected>{{$employee->name}}</option>
                                    @else
                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('employer_id'))
                            <span class="error invalid-feedback">
                                {{ $errors->first('employer_id') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputStatus">Status</label>
                            <select name="status" id="exampleInputStatus" class="form-control {{ $errors->has('item_perpage') ? 'is-invalid' : '' }}">
                                <option value="">Select Status</option>
                                @foreach ($data['status'] as $status)
                                    @if ($status['value'] == old('status', $job->status))
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
                        <div class="col-md-12 form-group">
                            <label class="required">Job Description</label>
                            <textarea name="description" id="description" rows="5" class="form-control summernote {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description', $job->description) }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="required">Job Specification</label>
                            <textarea name="specification" id="specification" rows="5" class="form-control summernote {{ $errors->has('specification') ? 'is-invalid' : '' }}">{{ old('specification', $job->specification) }}</textarea>
                            @if ($errors->has('specification'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('specification') }}</strong>
                                </span>
                            @endif
                        </div>
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
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
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
    $('#exampleInputnegotiable').change(function(){
        var value = $(this).val();
        if(value == 0)
        {
            $('#jobSalary').show();
        }else{
            $('#jobSalary').hide();
        }
    })
</script>
@endsection
