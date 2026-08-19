<aside class="sidebar" id="mobileSidebar">
        <!-- Desktop Brand Header -->
        <div class="brand-header desktop-only">
            <div class="brand-logo" style="overflow: hidden;">
                <img src="https://i.ibb.co.com/Wv3cHV2w/46946-page-0001-removebg-preview.png" style="width: 100%; height: 100%; object-fit: cover;" alt="Logo Barang">
            </div>
            <div class="brand-title">WMS</div>
        </div>

        <!-- Mobile Drawer Header -->
        <div class="mobile-drawer-header">
            <button class="close-sidebar-btn" id="closeSidebarBtn">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <img src="{{ Auth::user()->profile_image_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name ?? 'User') . '&background=random' }}" alt="User Avatar" class="mobile-avatar" style="object-fit: cover;">
            <div class="mobile-user-name">{{ Auth::user()->name ?? 'Admin User' }}</div>
            <div class="mobile-user-role">You are logged in.</div>
        </div>

        <nav class="nav-menu">
            <div class="nav-group-label">General</div>
            <a class="nav-item {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>

            <a class="nav-item {{ Request::is('master') ? 'active' : '' }}" href="{{ url('/master') }}">
                <i class="fa-solid fa-boxes-stacked"></i>
                <span>Master Data</span>
            </a>
            <a class="nav-item {{ Request::is('product') ? 'active' : '' }}" href="{{ url('/product') }}">
                <i class="fa-solid fa-box"></i>
                <span>Product</span>
            </a>
            <a class="nav-item {{ Request::is('inbound') ? 'active' : '' }}" href="{{ url('/inbound') }}">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <span>Inbound</span>
            </a>
            <a class="nav-item {{ Request::is('outbound') ? 'active' : '' }}" href="{{ url('/outbound') }}">
                <i class="fa-solid fa-truck-fast"></i>
                <span>Outbound</span>
            </a>
            
            <div class="nav-group-label">Management</div>
            <a class="nav-item {{ Request::is('warehouses') ? 'active' : '' }}" href="{{ url('/warehouses') }}">
                <i class="fa-solid fa-warehouse"></i>
                <span>Warehouses</span>
            </a>
            
            <div class="nav-group-label">Profile</div>
            <a class="nav-item {{ Request::is('users') ? 'active' : '' }}" href="{{ url('/users') }}">
                <i class="fa-solid fa-users"></i>
                <span>Users</span>
            </a>
            
            <!-- Logout Button -->
            <a class="nav-item text-red-500 hover:text-red-700 mt-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Sign Out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>

        <!-- Supported By Footer -->
        <div class="sidebar-footer">
            <img src="https://imgs.search.brave.com/gAYlIg1Rh6P1BUeSEVP5XrsQ-nWt_BC4Je3nf-6UVIU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zbWtz/ZWRraWpha2FydGEu/d29yZHByZXNzLmNv/bS93cC1jb250ZW50/L3VwbG9hZHMvMjAx/Ny8xMS9zbWtuLTIw/LWpha2FydGEucG5n/P3c9Mjg3Jmg9Mzgz" alt="Logo" style="width: 32px; height: auto; flex-shrink: 0;">
            <div style="display: flex; flex-direction: column; overflow: hidden;">
                <span style="font-size: 9px; font-weight: bold; color: #9ca3af; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 2px;">Supported By</span>
                <span style="font-size: 11px; font-weight: bold; color: #334155; line-height: 1.2; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">SMK Negeri 20 Jakarta</span>
                <span style="font-size: 8px; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Jakarta Selatan</span>
            </div>
        </div>
    </aside>