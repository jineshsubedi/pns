@extends('layouts.backend.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    <x-breadcrums 
        title="Profile" 
        :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => 'Profile', 'url' => route('admin.profile.edit')]
        ]" 
    />
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
            <div class="col-md-6">
                <div class="card">
                    @include('Admin.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    @include('Admin.profile.partials.update-password-form')
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
