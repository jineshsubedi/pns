<ul>
    <li>
        <a @if(request()->segment(2)=='profile') class="active" @endif href="{{route('employer.profile')}}"><i class="lni lni-user"></i> Edit Profile</a>
    </li>
    <li>
        <a @if(request()->segment(2)=='dashboard') class="active" @endif href="{{route('employer.dashboard')}}"><i class="lni lni-briefcase"></i> Published Jobs</a>
    </li>
    <li>
        <a @if(request()->segment(2)=='jobs') class="active" @endif href="{{route('employer.jobs')}}"><i class="lni lni-pencil-alt"></i> Add Jobs</a>
    </li>
    <li><a @if(request()->segment(2)=='resumes') class="active" @endif href="{{route('employer.resumes')}}"><i class="lni lni-envelope"></i> Manage
            Resumes</a></li>
    <li>
        <a @if(request()->segment(2)=='change_password') class="active" @endif href="{{route('employer.change_password')}}"><i class="lni lni-lock"></i> Change Password</a>
    </li>
    <li>
        <x-sign-out-button>
            <i class="lni lni-upload"></i> Sign Out
        </x-sign-out-button>
    </li>
</ul>
