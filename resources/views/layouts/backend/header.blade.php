<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.settings')->name ?? env('APP_NAME') }}</title>
  <link rel="shortcut icon" type="image/png" href="{{ config('app.settings')->icon_path ?? 'images/logo.png' }}"/>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('styles')
</head>