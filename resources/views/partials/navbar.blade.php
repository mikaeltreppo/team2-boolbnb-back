<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
    <div class="container-fluid">
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">      
            {{-- Left Side Of Navbar --}}
            <a href="{{ route('admin.apartments.create') }}" type="button" class="btn ms-btn ms-btn-sm ms-btn-outline-primary fw-bold">
                <i class="fa-solid fa-plus me-2"></i>
                Aggiungi
            </a>

            {{-- Right Side Of Navbar --}}
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->

                    <li class="nav-item dropstart">
                        <a id="navbarDropdown" class="nav-link user-dropdown fw-bold px-3 py-1"
                        data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" v-pre>
                            <span class="align-middle">{{ Auth::user()->name }}</span>
                            <div class="user-icon ms-bg-dark align-middle">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </a>

                    </li>
                {{-- @endguest --}}
            </ul>
        </div>
    </div>
</nav>
  
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title font-secondary" id="offcanvasExampleLabel">{{ Auth::user()->name }}</h5>
      <div class="offcanvas-right d-flex align-items-center">
        <a href="{{ url('profile') }}" class="btn btn-sm ms-btn-outline-primary rounded-4">
     
            <i class="fa-solid fa-gear align-middle fa-lg"></i>
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled">
       
            <li>
                <button class="my-3 btn ms-btn-outline-primary rounded-4 btn-sm w-100" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket me-2"></i>
                {{ __('Logout') }}
                </button>
            </li>
        </ul>
       
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
       
    </div>
  </div>
