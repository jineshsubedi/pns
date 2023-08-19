<!-- Start Header Area -->
<header class="header style4">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand logo" href="/">
                            @if(config('app.settings.logo') != null)
                            <img class="logo1" src="{{config('app.settings.logo_path')}}" alt="Logo" />
                            @else
                            {{config('app.settings.name')}}
                            @endif
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a @if(request()->segment(1)=='') class="active" @endif href="{{url('/')}}">Home</a></li>
                                <li class="nav-item"><a @if(request()->segment(1)=='jobs') class="active" @endif href="{{url('/jobs')}}">Job</a></li>
                                <li class="nav-item"><a @if(request()->segment(1)=='freelancer') class="active" @endif href="{{url('/freelancer')}}">Freelancing</a></li>
                                <li class="nav-item"><a @if(request()->segment(1)=='certification') class="active" @endif href="{{url('/certification')}}">Certifications</a></li>
                                <li class="nav-item"><a @if(request()->segment(1)=='about') class="active" @endif href="{{url('/about')}}">About Us</a> </li>
                            </ul>
                        </div>
                        <!-- navbar collapse -->
                        <div class="button">
                            @if(auth()->guard('employee')->check())
                                <a  href="{{route('employee.dashboard')}}">Employee Dashboard</a>
                            @elseif(auth()->guard('employer')->check())
                                <a  href="{{route('employer.dashboard')}}">Employer Dashboard</a>
                            @else
                            <a href="javacript:" data-toggle="modal" data-target="#login" class="login"><i
                                class="lni lni-lock-alt"></i> Login</a>
                            <a href="javacript:" data-toggle="modal" data-target="#signup" class="btn">Sign Up</a>
                            @endif
                        </div>
                    </nav>
                    <!-- navbar -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- navbar area -->
</header>
<!-- End Header Area -->
