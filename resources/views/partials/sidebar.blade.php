<div class="sidebar ms-bg-light vh-100 py-4">
<ul class="nav nav-pills flex-column mb-auto">
    <!-- reindirizzamento DASHBOARD -->
    <li>
        <a href="{{ route('admin.dashboard') }}" class="nav-link ">
            <i class="fa-solid fa-gauge me-2"></i>
            Dashboard
        </a>
    </li>
    <!-- reindirizzamento LISTA APPARTAMENTI -->
    <li>
        <a href="{{ route('admin.apartments.index') }}" class="nav-link ">
            <i class="fa-solid fa-list me-2"></i>
            Lista Appartamenti
        </a>
    </li>
           <!-- reindirizzamento NUOVO APPARTAMENTO -->
           <li>
            <a href="{{ route('admin.apartments.create') }}" class="nav-link ">
                <i class="fa-solid fa-plus me-2"></i>
               Nuovo Appartamento
            </a>
        </li>
               <!-- reindirizzamento mostra memberships -->

               <li>
                <a href="{{ route('admin.sponsorships.index') }}" class="nav-link ">
                    <i class="fa-solid fa-list me-2"></i>
                    Vedi Le Nostre sponsorizzazioni
                </a>
            </li>
</ul>
</div>
  

