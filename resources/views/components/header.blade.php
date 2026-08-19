<header class="header">
            <button class="mobile-menu-btn" id="openSidebarBtn">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="header-location">
                <i class="fa-solid fa-location-dot" style="color: var(--primary-orange)"></i>
                <select id="warehouseSelector" onchange="changeWarehouse(this.value)">
                    <option value="">Memuat gudang...</option>
                </select>
            </div>

            <div class="header-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="globalSearch" placeholder="Search product, SKU or inbound..." oninput="handleGlobalSearch(this.value)">
            </div>

            <div class="header-right">
                <div class="notification-btn" onclick="showToast('Anda memiliki 8 item stok menipis!')">
                    <i class="fa-regular fa-bell"></i>
                    <div class="notification-badge"></div>
                </div>

                <div class="user-profile" onclick="showToast('Profile: {{ Auth::user()->name }}')">
                    @if(Auth::user()->profile_image_url)
                        <img src="{{ Auth::user()->profile_image_url }}" alt="{{ Auth::user()->name }} Profile" class="avatar" style="object-fit: cover;">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=E85A1C&color=fff" alt="{{ Auth::user()->name }} Profile" class="avatar">
                    @endif
                    <div>
                        <div style="font-size: 0.85rem; font-weight: 700; color: #0F172A;">{{ Auth::user()->name }}</div>
                        <div style="font-size: 0.725rem; color: #64748B;">{{ Auth::user()->role ?? 'Warehouse Staff' }}</div>
                    </div>
                </div>
            </div>
        </header>