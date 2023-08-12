<form method="POST" action="{{ route('employer.logout') }}">
    @csrf
    <a class="nav-link" :href="route('employer.logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{$slot}}
    </a>
</form>
