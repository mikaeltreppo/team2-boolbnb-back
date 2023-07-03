<nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">
    <div class="container-fluid">
    <div class="navbar-logo h-100 d-flex align-items-middle">
        <a href="http://localhost:5174/">
            <img src="{{URL('images/logo.svg')}}" alt="" class="navbar-logo d-inline-block d-md-none">
        </a>
    </div>
    <button class="navbar-toggler ms-auto shadow-none" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" aria-label="{{ __('Toggle navigation') }}">
            <div class="line-1"></div>
            <div class="line-2"></div>
            <div class="line-3"></div>
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
    <div class="offcanvas-header bg-light">
     <div class="top">
        <span class="xsmall text-muted fw-bold">Menu</span>
        <h5 class="offcanvas-title font-secondary" id="offcanvasExampleLabel">{{ Auth::user()->name }}</h5>
     </div>
      <div class="offcanvas-right d-flex align-items-center">
        <a href="{{ url('profile') }}" class="btn btn-sm ms-btn-textual-dark rounded-4 xsmall fw-bold">
            <i class="fa-solid fa-gear fa-lg me-1"></i>
            Account
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled">
                   <li>
                <a href="{{ route('admin.dashboard') }}" class="fw-bold mb-1 text-start btn ms-btn-textual-dark rounded-4 btn-sm w-100" data-dismiss="offcanvas">
                    <i class="fa-solid fa-gauge me-2"></i>
                    <span class="d-md-inline">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.apartments.index') }}" class="fw-bold mb-1 text-start btn ms-btn-textual-dark rounded-4 btn-sm w-100" data-dismiss="offcanvas">
                    <i class="fa-solid fa-list me-2"></i>
                    <span class="d-md-inline">I Miei Appartamenti</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.apartments.create') }}" class="fw-bold mb-1 text-start btn ms-btn-textual-dark rounded-4 btn-sm w-100" data-dismiss="offcanvas">
                    <i class="fa-solid fa-plus me-2"></i>
                    <span class="d-md-inline">Aggiungi</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.messages.index') }}" class="fw-bold mb-1 text-start btn ms-btn-textual-dark rounded-4 btn-sm w-100" data-dismiss="offcanvas">
                    <i class="fa-solid fa-envelope me-2"></i>
                    <span class="d-md-inline">Messaggi</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.sponsorships.index') }}" class="fw-bold mb-1 text-start btn ms-btn-textual-dark rounded-4 btn-sm w-100" data-dismiss="offcanvas">
                    <i class="fa-solid fa-star me-2"></i>
                    <span class="d-md-inline">Sponsorizza</span>
                </a>
            </li>
        </ul>
       
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
       
    </div>

     <div class="offcanvas-footer px-5 pb-5 text-end">
            <button class="my-3 btn fw-bold ms-btn  ms-btn-outline-primary rounded-5 " href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket me-2"></i>
            <span class="xsmall align-middle text-uppercase">
                {{ __('logout') }}
            </span>
            </button>
     </div>
  </div>
