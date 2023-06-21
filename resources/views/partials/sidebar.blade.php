<div class="sidebar ms-bg-dark vh-100 py-4 panel-shadow-right px-3">
<div class="brand mb-3">
    {{-- <h3 class="text-white">LOGO</h3> --}}
    <img src="{{URL('images/logo.png')}}" alt="" class="sidebar-logo align-middle">
    <h6 class="font-secondary fw-bold text-white d-inline align-middle ms-2">BoolBNB</h6>
</div>
<hr>
<ul class="nav nav-pills flex-column mb-auto">
    <!-- reindirizzamento DASHBOARD -->
    <span class="sidebar-title ps-3 text-uppercase mb-3 d-none d-md-inline text-light">main</span>
    <li>
        <a href="{{ route('admin.dashboard') }}" class="btn ms-btn-textual-primary w-lg-auto w-100 text-center text-lg-start sidebar-icon arrow rounded-3 active">
            <i class="fa-solid fa-gauge me-2"></i>
            <span class="d-none d-md-inline">Dashboard</span>
        </a>
    </li>
    <!-- reindirizzamento LISTA APPARTAMENTI -->
    <span class="sidebar-title ps-3 text-uppercase my-3 d-none d-md-inline text-light">link rapidi</span>
    <li>
        <a href="{{ route('admin.apartments.index') }}" class="btn ms-btn-textual-primary w-lg-auto w-100 text-center text-lg-start sidebar-icon arrow rounded-3">
            <i class="fa-solid fa-list me-2"></i>
            <span class="d-none d-md-inline">I Miei Appartamenti</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.messages.index') }}" class="btn ms-btn-textual-primary w-lg-auto w-100 text-center text-lg-start sidebar-icon arrow rounded-3">
            <i class="fa-solid fa-envelope me-2"></i>
            <span  class="d-none d-md-inline">Messaggi</span>
        </a>
    </li>
   

        <li>
            <a href="{{ route('admin.sponsorships.index') }}" class="btn ms-btn-textual-primary w-lg-auto w-100 text-center text-lg-start sidebar-icon arrow rounded-3">
                <i class="fa-solid fa-star me-2"></i>
                <span  class="d-none d-md-inline">
                    Sponsorizza
                </span>
                
            </a>
         </li>
     
       
</ul>
</div>
  

