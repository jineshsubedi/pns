<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{url('/')}}" class="brand-link">
    @if(config('app.settings')->logo_path)
    <img src="{{config('app.settings')->logo_path}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    @endif
    <span class="brand-text font-weight-light" style="width:100%;white-space: pre-line;">{{ config('app.settings')->name ?? env('APP_NAME') }}</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&size=100" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @include('layouts.backend.menu')
      </ul>
    </nav>
  </div>
</aside>
