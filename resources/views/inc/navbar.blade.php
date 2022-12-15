<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    {{-- <div class="container"> --}}
        <a class="navbar-brand" href="{{ url('/welcome') }}">
             <img src='/img/logo.png' width="200" height="20">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
        @guest

        @else
            <!-- ADMIN Panel -->
            @if (Auth::user()->IsAdmin)
            <ul class="navbar-nav ">
                {{-- <li class="nav-item">
                    <a class="nav-link text-white" href="/admin/corgroup/"><i class="fas fa-file-alt"></i> transaction</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fas fa-cog"></i> Master Setup <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="nav-link text-dark" href="#">- Emails</a>
                        <a class="nav-link text-dark" href="#">- Blacklist</a>
                        <a class="nav-link text-dark" href="/admin/user/">- ผู้ใช้งานระบบ</a>
                    </div>

                </li> --}}
            </ul>
            @endif

        @endguest

            <!-- Right Side Of Navbar -->

            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i>
                                {{ Auth::user()->UserId}}
                                <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    {{-- </div> --}}
</nav>
