<nav class="sb-topnav navbar navbar-expand navbar navbar-light" style="background: linear-gradient(to bottom, #eee8ce 0%, #f3d97a 100%);">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="/home">MedDelivery</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
            style="border: 1px solid #cccccc; border-radius: 50%; width: 40px; height:auto; float:left; margin-right: 7px;">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   <i class="fa fa-sign-out nav-icon"></i>
                        {{ __('Sair') }}
                    </a>
                            
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>