<form method="POST" action="{{ route('employee.logout') }}">
    @csrf
    <a class="nav-link" :href="route('employee.logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{$slot}}
    </a>
</form>
