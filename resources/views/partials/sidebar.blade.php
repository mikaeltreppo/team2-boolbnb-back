<div class="sidebar ms-bg-dark vh-100 py-4 panel-shadow-right px-3">
<div class="brand">
    LOGO
</div>
<hr>
<ul class="nav nav-pills flex-column mb-auto">
    <!-- reindirizzamento DASHBOARD -->
    <span class="sidebar-title ps-3 text-uppercase mb-3 d-none d-md-inline text-light">main</span>
    <li>
        <a href="{{ route('admin.dashboard') }}" class="btn ms-btn-textual-primary w-lg-auto w-100 text-center text-lg-start sidebar-icon arrow rounded-4 active">
            <i class="fa-solid fa-gauge me-2"></i>
            <span class="d-none d-md-inline">Dashboard</span>
        </a>
    </li>
    <hr>
    <!-- reindirizzamento LISTA APPARTAMENTI -->
    <span class="sidebar-title ps-3 text-uppercase my-3 d-none d-md-inline text-light">link rapidi</span>
    <li>
        <a href="{{ route('admin.apartments.index') }}" class="btn ms-btn-textual-primary w-lg-auto w-100 text-center text-lg-start sidebar-icon arrow rounded-4">
            <i class="fa-solid fa-list me-2"></i>
            <span class="d-none d-md-inline">I Miei Appartamenti</span>
        </a>
    </li>

    <li>
        <a href="{{ route('admin.messages.index') }}" class="btn ms-btn-textual-primary w-lg-auto w-100 text-center text-lg-start sidebar-icon arrow rounded-4">
            <i class="fa-solid fa-envelope me-2"></i>
            <span  class="d-none d-md-inline">Messaggi</span>
        </a>
    </li>
   

        <li>
            <a href="{{ route('admin.sponsorships.index') }}" class="btn ms-btn-textual-primary w-lg-auto w-100 text-center text-lg-start sidebar-icon arrow rounded-4">
                <i class="fa-solid fa-star text-warning me-2"></i>
                <span  class="d-none d-md-inline">Sponsorizza</span>
            </a>
         </li>
     
       
</ul>
</div>
  

