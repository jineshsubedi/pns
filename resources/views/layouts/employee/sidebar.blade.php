<ul>
    <li>
        <a @if(request()->segment(2)=='dashboard') class="active" @endif href="{{ route('employee.dashboard') }}"><i class="lni lni-clipboard"></i> My Resume</a>
    </li>
    <li>
        <a @if(request()->segment(2)=='bookmarked') class="active" @endif href="{{route('employee.bookmarked')}}"><i class="lni lni-bookmark"></i> Bookmarked Jobs</a>
    </li>
    <li>
        <a @if(request()->segment(2)=='jobs') class="active" @endif href="{{route('employee.jobs')}}"><i class="lni lni-briefcase"></i> My Jobs
        </a>
    </li>
    <li>
        <a @if(request()->segment(2)=='change_password') class="active" @endif href="{{route('employee.change_password')}}"><i class="lni lni-lock"></i> Change Password</a>
    </li>
    <li>
        <x-sign-out-button>
            <i class="lni lni-upload"></i> Sign Out
        </x-sign-out-button>
    </li>
</ul>
