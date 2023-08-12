@if(auth()->guard('employee')->check())
<form method="POST" action="{{ route('employee.logout') }}">
    @csrf
    <a class="nav-link" :href="route('employee.logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{$slot}}
    </a>
</form>
@elseif(auth()->guard('employer')->check())
<form method="POST" action="{{ route('employer.logout') }}">
    @csrf
    <a class="nav-link" :href="route('employer.logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{$slot}}
    </a>
</form>
@else
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a class="nav-link" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{$slot}}
    </a>
</form>
@endif
