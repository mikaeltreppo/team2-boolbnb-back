<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">      
            {{-- Left Side Of Navbar --}}
            <a href="{{ route('admin.apartments.create') }}" type="button" class="btn ms-btn ms-btn-sm ms-btn-primary">
                <i class="fa-solid fa-plus me-2"></i>
                Aggiungi
            </a>

            {{-- Right Side Of Navbar --}}
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                {{-- @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else --}}
                    <li class="nav-item dropstart">
                        <a id="navbarDropdown" class="nav-link user-dropdown fw-bold px-3 py-1"
                        data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" v-pre>
                            <span class="align-middle">{{ Auth::user()->name }}</span>
                            <div class="user-icon ms-bg-dark align-middle">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </a>

                        {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div> --}}
                    </li>
                {{-- @endguest --}}
            </ul>
        </div>
    </div>
</nav>
  
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ Auth::user()->name }}</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
        <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </div>
  </div>
