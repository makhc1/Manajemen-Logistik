<aside class="sidebar">
        <div class="brand-header">
            <div class="brand-logo">
                <i class="fa-solid fa-cube"></i>
            </div>
            <div class="brand-title">WMS</div>
        </div>

        <nav class="nav-menu">
            <a class="nav-item {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Dashboard</span>
            </a>
            <a class="nav-item {{ Request::is('master') ? 'active' : '' }}" href="{{ url('/master') }}">
                <i class="fa-solid fa-boxes-stacked"></i>
                <span>Master</span>
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
            <a class="nav-item {{ Request::is('warehouses') ? 'active' : '' }}" href="{{ url('/warehouses') }}">
                <i class="fa-solid fa-warehouse"></i>
                <span>Warehouses</span>
            </a>
            <a class="nav-item {{ Request::is('security') ? 'active' : '' }}" href="{{ url('/security') }}">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Security</span>
            </a>
            <a class="nav-item {{ Request::is('settings') ? 'active' : '' }}" href="{{ url('/settings') }}">
                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>
            </a>
            <a class="nav-item {{ Request::is('users') ? 'active' : '' }}" href="{{ url('/users') }}">
                <i class="fa-solid fa-users"></i>
                <span>Users</span>
            </a>
            
            <!-- Logout Button -->
            <a class="nav-item text-red-500 hover:text-red-700" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </aside>