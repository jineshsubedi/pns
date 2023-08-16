@extends('layouts.frontend.app')
@section('content')
<div class="change-password section">
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
                <div class="col-lg-8">
                    <div class="password-content">
                        <h3>Change Password</h3>
                        <p>Here you can change your password please fill up the form.</p>
                        <form action="{{route('employer.save_change_password')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input class="form-control" type="password" name="old_password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input class="form-control" type="password" name="new_password" required>
                                        <i class="bx bxs-low-vision"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group last">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" name="new_password_confirmation" required>
                                        <i class="bx bxs-low-vision"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="button">
                                        <button class="btn">Save Change</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
