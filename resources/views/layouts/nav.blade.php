<nav class="main-sidebar ps-menu">
    <div class="sidebar-header">
        <div class="text">ARSIK PKL</div>
        <div class="close-sidebar action-toggle">
            <i class="ti-close"></i>
        </div>
    </div>
    <div class="sidebar-content">
        <ul>
                {{-- SUPER ADMIN --}}
                <li class="{{ request()->segment(1) == 'dashboard' ? 'active' : ''}}">
                    <a href="{{ url('dashboard')}}" class="link">
                        <i class="ti-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                {{-- sub menu side --}}
                <li class="menu-category">
                <li class="{{ request()->segment(2) == 'usergroup' ? 'active' : ''}}">
                    <a href="" class="link" data-bs-toggle="modal" data-bs-target="#formAlbum">
                        <i class="ti-user"></i>
                        <span>Tambah Album</span>
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'users' ? 'active' : ''}}">
                    <a href="" class="link" data-bs-toggle="modal" data-bs-target="#formFoto">
                        <i class="ti-user"></i>
                        <span>Tambah Foto</span>
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'educationallevel' ? 'active' : ''}}">
                    <a href="{{ url('superadmin/educationallevel')}}" class="link">
                        <i class="ti-book"></i>
                        <span>Album</span>
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'employee' ? 'active' : ''}}">
                    <a href="{{ url('superadmin/employee')}}" class="link">
                        <i class="ti-user"></i>
                        <span>Foto</span>
                    </a>
                </li>
                </li>
        </ul>
    </div>
</nav>
