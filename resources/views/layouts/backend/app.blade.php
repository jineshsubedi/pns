@include('layouts.backend.header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.backend.nav')

  @include('layouts.backend.sidebar')
  <div class="content-wrapper">
    <x-flash-message />

    @yield('content')
  </div>
  <!-- Main Footer -->
  @include('layouts.backend.footer')
</div>
<!-- ./wrapper -->

@include('layouts.backend.foot')

</body>
</html>
