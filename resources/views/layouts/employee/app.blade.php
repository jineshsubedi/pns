@include('layouts.employee.header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.employee.nav')

  @include('layouts.employee.sidebar')
  <div class="content-wrapper">
    <x-flash-message />

    @yield('content')
  </div>
  <!-- Main Footer -->
  @include('layouts.employee.footer')
</div>
<!-- ./wrapper -->

@include('layouts.employee.foot')

</body>
</html>
