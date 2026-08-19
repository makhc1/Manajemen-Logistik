<header class="header">
            <button class="mobile-menu-btn" id="openSidebarBtn">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="header-location">
                <i class="fa-solid fa-location-dot text-primary-orange"></i>
                <select id="warehouseSelector">
                    <option value="">Memuat gudang...</option>
                </select>
            </div>

            <div class="header-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="globalSearch" placeholder="Search product, SKU or inbound...">
            </div>

            <div class="header-right">
                <div class="notification-btn" id="headerNotificationBtn">
                    <i class="fa-regular fa-bell"></i>
                    <div class="notification-badge"></div>
                </div>

                <div class="user-profile" id="headerUserProfile" data-name="{{ Auth::user()->name }}">
                    @if(Auth::user()->profile_image_url)
                        <img src="{{ Auth::user()->profile_image_url }}" alt="{{ Auth::user()->name }} Profile" class="avatar object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=E85A1C&color=fff" alt="{{ Auth::user()->name }} Profile" class="avatar">
                    @endif
                    <div>
                        <div class="profile-name">{{ Auth::user()->name }}</div>
                        <div class="profile-role">{{ Auth::user()->role ?? 'Warehouse Staff' }}</div>
                    </div>
                </div>
            </div>
        </header>