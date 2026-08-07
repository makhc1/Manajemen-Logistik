<header class="header">
            <div class="header-location">
                <i class="fa-solid fa-location-dot" style="color: var(--primary-orange)"></i>
                <select id="warehouseSelector" onchange="changeWarehouse(this.value)">
                    <option value="Gudang Utama Jakarta">Gudang Utama Jakarta</option>
                    <option value="Gudang Cabang Surabaya">Gudang Cabang Surabaya</option>
                    <option value="Gudang Transit Bandung">Gudang Transit Bandung</option>
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

                <div class="user-profile" onclick="showToast('Profile: Liara (PT Berdikari Jaya)')">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80" alt="Liara Profile" class="avatar">
                    <div>
                        <div style="font-size: 0.85rem; font-weight: 700; color: #0F172A;">Liara</div>
                        <div style="font-size: 0.725rem; color: #64748B;">PT Berdikari Jaya</div>
                    </div>
                </div>
            </div>
        </header>