<div class="sidebar bg-dark vh-100">
<ul class="nav nav-pills flex-column mb-auto">
    <!-- reindirizzamento DASHBOARD -->
    <li>
        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white ">
            <svg class="bi pe-none" width="16" height="16">
                <use xlink:href="#speedometer2"></use>
            </svg>
            Dashboard
        </a>
    </li>
    <!-- reindirizzamento LISTA APPARTAMENTI -->
    <li>
        <a href="{{ route('admin.apartments.index') }}" class="nav-link text-white ">
            <svg class="bi pe-none" width="16" height="16">
                <use xlink:href="#speedometer2"></use>
            </svg>
            Lista Appartamenti
        </a>
    </li>
           <!-- reindirizzamento NUOVO APPARTAMENTO -->
           <li>
            <a href="{{ route('admin.apartments.create') }}" class="nav-link text-white ">
                <svg class="bi pe-none" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
               Nuovo Appartamento
            </a>
        </li>


</ul>
</div>
  

