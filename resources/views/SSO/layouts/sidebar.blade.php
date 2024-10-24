<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('SSO.dashboard') }}" class="brand-link">
        <img src="{{ asset('../assets/logo/SSO-LOGO.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SSO</span>
    </a>

    <div class="sidebar mt-4">
        <!-- User Panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="#" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('SSO.profile.user-profile') }}" class="d-block">{{ Auth::user()->name ?? 'Guest' }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('SSO.dashboard') }}" class="nav-link d-flex align-items-center justify-content-start">
                        <i class="nav-icon fas fa-th"></i>
                        <p class="mb-0 mx-2 text-center" style="flex-grow: 1;">Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('SSO.add-user') }}" class="nav-link d-flex align-items-center justify-content-start">
                        <i class="nav-icon bi bi-plus-square"></i>
                        <p class="mb-0 mx-2 text-center" style="flex-grow: 1;">Add</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center justify-content-start">
                        <i class="nav-icon bi bi-gear"></i>
                        <p class="mb-0 mx-2 text-center" style="flex-grow: 1;">Settings
                            <i class="right fas fa-angle-left mt-1"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('SSO.settings') }}" class="nav-link d-flex align-items-center justify-content-start">
                                <i class="nav-icon bi-journal-plus"></i>
                                <p class="mb-0 mx-2 text-center" style="flex-grow: 1;">Add Book Reference</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>