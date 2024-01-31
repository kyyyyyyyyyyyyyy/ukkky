<header class="header-navbar fixed">
    <div class="header-wrapper">
        <div class="header-left">
            <div class="sidebar-toggle action-toggle"><i class="fas fa-bars"></i></div>
            
        </div>
        <div class="header-content">
            <div class="theme-switch-icon"></div>      
            <div class="dropdown dropdown-menu-end">
                <a href="#" class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="label">
                        <span></span>
                        <div>{{ Auth::user()->name }}</div>
                    </div>
                    <img class="img-user" src="{{ asset('assets/images/user.png')}}" alt="user"srcset="">
                </a>
                <ul class="dropdown-menu small">
                    <li class="menu-content ps-menu"> 
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                                <div class="description">
                                    <i class="ti-power-off"></i> Logout
                                </div>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>