<nav class="navbar bg-slate-600 dark:text-white flex flex-row flex-nowrap h-12 justify-between px-4">
    <h2 class="text-xl font-bold">{{config('app.name')}}</h2>
    <div>
        @guest
        <a class="nav-link dark:text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
        @else
        <a id="navbarDropdown" class="nav-link dropdown-toggle dark:text-white" href="#" role="button"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        @endif
    </div>
</nav>