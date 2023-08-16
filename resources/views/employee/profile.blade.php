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
                            @include('layouts.employee.sidebar')
                        </div>
                    </div>
                    <!-- End Main Content -->
                    <div class="col-lg-8 col-12">
                        <section class="job-post">
                            <div class="job-information">
                                <h3 class="title">Job Information</h3>
                                <form action="{{ route('employee.updateProfile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                                    value="{{ old('name', $user->name) }}">
                                                @if ($errors->has('name'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Email*</label>
                                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                                    value="{{ old('email', $user->email) }}">
                                                @if ($errors->has('email'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Designation*</label>
                                                <input class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}" type="text" name="designation"
                                                    value="{{ old('designation', $user->detail->designation ?? '') }}">
                                                @if ($errors->has('designation'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('designation') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>DOB*</label>
                                                <input class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="date" name="dob"
                                                    value="{{ old('dob', $user->detail->dob ?? '') }}">
                                                @if ($errors->has('dob'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('dob') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address"
                                                    value="{{ old('address', $user->address) }}">
                                                @if ($errors->has('address'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('address') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone"
                                                    value="{{ old('phone', $user->phone) }}">
                                                @if ($errors->has('phone'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('phone') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Bio*</label>
                                                <textarea name="bio" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" rows="3">{{ old('phone', $user->detail->bio ?? '') }}</textarea>
                                                @if ($errors->has('phone'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('phone') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Gender*</label>
                                                <select class="select {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                                @if ($errors->has('gender'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('gender') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Marital Status*</label>
                                                <select class="select {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status">
                                                    <option value="Married">Married</option>
                                                    <option value="UnMarried">UnMarried</option>
                                                </select>
                                                @if ($errors->has('marital_status'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('marital_status') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Skills*</label>
                                                <input class="form-control {{ $errors->has('skills') ? 'is-invalid' : '' }}" type="text" name="skills"
                                                    value="{{ old('skills', $user->detail->skills ?? '') }}">
                                                @if ($errors->has('skills'))
                                                    <span class="error invalid-feedback">
                                                        {{ $errors->first('skills') }}
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
