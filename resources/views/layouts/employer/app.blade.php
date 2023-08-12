@include('layouts.employer.header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.employer.nav')

  @include('layouts.employer.sidebar')
  <div class="content-wrapper">
    <x-flash-message />

    @yield('content')
  </div>
  <!-- Main Footer -->
  @include('layouts.employer.footer')
</div>
<!-- ./wrapper -->

@include('layouts.employer.foot')

</body>
</html>
