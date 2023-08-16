@extends('layouts.frontend.app')
@section('content')
    <!-- Main Content Start -->
    <div class="job-alerts section">
        <div class="container">
            <div class="alerts-inner">
                <div class="row">
                    <!-- Start Main Content -->
                    <div class="col-lg-4 col-12">
                        <div class="dashbord-sidebar">
                            @include('layouts.employer.sidebar')
                        </div>
                    </div>
                    <!-- End Main Content -->
                    <div class="col-lg-8 col-12">
                        <section class="job-post">
                            <div class="job-information">
                                <h3 class="title">Job Information</h3>
                                <form action="{{ route('employer.saveJobs') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Title*</label>
                                                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                                                    value="{{ old('title') }}">
                                                @if ($errors->has('title'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('title') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="type" id="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
                                                    @foreach ($data['type'] as $type)
                                                        @if ($type == old('type'))
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
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category_id" id="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                                    <option value="">Select Option</option>
                                                    @foreach ($categories as $category)
                                                        @if ($category->id == old('category_id'))
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
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Negotiable</label>
                                                <select name="negotiable" id="negotiable" class="form-control {{ $errors->has('negotiable') ? 'is-invalid' : '' }}">
                                                    <option value="">Select Option</option>
                                                    @foreach ($data['status'] as $status)
                                                        @if ($status['value'] == old('negotiable'))
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
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Salary</label>
                                                <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="text" name="salary"
                                                    value="{{ old('salary') }}">
                                                @if ($errors->has('salary'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('salary') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Publish</label>
                                                <select name="status" id="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                                    @foreach ($data['status'] as $status)
                                                        @if ($status['value'] == old('status'))
                                                        <option value="{{$status['value']}}" selected>{{$status['title']}}</option>
                                                        @else
                                                        <option value="{{$status['value']}}">{{$status['title']}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('status'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('status') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Start Date*</label>
                                                <input class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date"
                                                    value="{{ old('start_date') }}">
                                                @if ($errors->has('start_date'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('start_date') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>End Date*</label>
                                                <input class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date"
                                                    value="{{ old('end_date') }}">
                                                @if ($errors->has('end_date'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('end_date') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Description*</label>
                                                <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="3">{{ old('description', $user->description ?? '') }}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('description') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Secification*</label>
                                                <textarea name="specification" class="form-control {{ $errors->has('specification') ? 'is-invalid' : '' }}" rows="3">{{ old('specification') }}</textarea>
                                                @if ($errors->has('specification'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('specification') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 button">
                                            <button class="btn">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
@endsection
