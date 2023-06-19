<div class="sidebar ms-bg-light vh-100 py-4">
<ul class="nav nav-pills flex-column mb-auto">
    <!-- reindirizzamento DASHBOARD -->
    <li>
        <a href="{{ route('admin.dashboard') }}" class="nav-link text-dark text-center text-md-start sidebar-icon">
            <i class="fa-solid fa-gauge me-2"></i>
            <span class="d-none d-md-inline">Dashboard</span>
        </a>
    </li>
    <!-- reindirizzamento LISTA APPARTAMENTI -->
    <li>
        <a href="{{ route('admin.apartments.index') }}" class="nav-link text-dark text-center text-md-start sidebar-icon">
            <i class="fa-solid fa-list me-2"></i>
            <span class="d-none d-md-inline">Lista Appartamenti</span>
        </a>
    </li>
           <!-- reindirizzamento NUOVO APPARTAMENTO -->
           <li>
            <a href="{{ route('admin.apartments.create') }}" class="nav-link text-dark text-center text-md-start sidebar-icon">
                <i class="fa-solid fa-plus me-2"></i>
               <span class="d-none d-md-inline">Nuovo Appartamento</span>
            </a>
        </li>
               <!-- reindirizzamento mostra memberships -->

               <li>
                <a href="{{ route('admin.sponsorships.index') }}" class="nav-link  text-dark text-center text-md-start sidebar-icon">
                    <i class="fa-solid fa-list me-2"></i>
                    <span  class="d-none d-md-inline">Vedi Le Nostre sponsorizzazioni</span>
                </a>
            </li>
                    <!-- reindirizzamento mostra memberships -->

                    <li>
                        <a href="{{ route('admin.messages.index') }}" class="nav-link  text-dark text-center text-md-start sidebar-icon">
                            <i class="fa-solid fa-envelope"></i>
                            <span  class="d-none d-md-inline">Messaggi</span>
                        </a>
                    </li>
</ul>
</div>
  

