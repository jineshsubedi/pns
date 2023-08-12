@extends('layouts.backend.app')
@section('content')
<x-breadcrums 
        title="Error Page" 
        :links="[
            ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['title' => '403', 'url' => ''],
        ]" 
    />
<div class="content">
    <div class="container-fluid">
        <div class="alert alert-danger">
            <strong>Error:</strong> You are not authorized to access this resource.
        </div>
    </div>
</div>
@endsection