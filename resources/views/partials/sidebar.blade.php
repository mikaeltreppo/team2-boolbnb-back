<div class="sidebar ms-bg-dark vh-100 py-4 panel-shadow-right px-3 w-100">
<div class="brand my-4 text-center">
    <a href="http://localhost:5173/">
        <img src="{{URL('images/logo.svg')}}" alt="" class="sidebar-logo logo-light align-middle d-md-block d-none ms-lg-3">
        <h1 class="display-3 font-secondary fw-bold text-white d-inline align-middle ms-2 d-md-none">B</h1>
    </a>
    
</div>

<ul class="nav nav-pills flex-column mb-auto mt-5">
    <!-- reindirizzamento DASHBOARD -->
    <span class="sidebar-title ps-3 text-uppercase mb-3 d-none d-md-inline text-light">main</span>
    <li>
        <a href="{{ route('admin.dashboard') }}" class="btn ms-btn-textual-primary w-lg-auto w-100  text-start sidebar-icon arrow rounded-3 {{Route::currentRouteName() == 'admin.dashboard'?'active':''}}">
            <i class="fa-solid fa-gauge me-2"></i>
            <span class="d-none d-md-inline">Dashboard</span>
        </a>
    </li>
    <!-- reindirizzamento LISTA APPARTAMENTI -->
    <span class="sidebar-title ps-3 text-uppercase my-3 d-none d-md-inline text-light">link rapidi</span>
    <li>
        <a href="{{ route('admin.apartments.index') }}" class="btn ms-btn-textual-primary w-lg-auto w-100  text-start sidebar-icon arrow rounded-3 {{Route::currentRouteName() == 'admin.apartments.index'?'active':''}}"">
            <i class="fa-solid fa-list me-2"></i>
            <span class="d-none d-md-inline">I Miei Appartamenti</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.messages.index') }}" class="btn ms-btn-textual-primary w-lg-auto w-100  text-start sidebar-icon arrow rounded-3 {{Route::currentRouteName() == 'admin.messages.index'?'active':''}}"">
            <i class="fa-solid fa-envelope me-2"></i>
            <span  class="d-none d-md-inline">Messaggi</span>
        </a>
    </li>
   

    <li>
        <a href="{{ route('admin.sponsorships.index') }}" class="btn ms-btn-textual-primary w-lg-auto w-100  text-start sidebar-icon arrow rounded-3 {{Route::currentRouteName() == 'admin.sponsorships.index'?'active':''}}"">
            <i class="fa-solid fa-star me-2"></i>
            <span  class="d-none d-md-inline">
                Sponsorizza
            </span>
            
        </a>
        </li>
     
       
</ul>
</div>
  

