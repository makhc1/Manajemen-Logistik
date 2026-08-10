@extends('layouts.app')

@section('content')
<div id="dashboard-view" class="page-view active">
                <div class="welcome-card card">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        @if(Auth::user()->profile_image_url)
                            <img src="{{ Auth::user()->profile_image_url }}" alt="{{ Auth::user()->name }} Profile" class="avatar" style="width: 48px; height: 48px; object-fit: cover;">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=E85A1C&color=fff" alt="{{ Auth::user()->name }} Profile" class="avatar" style="width: 48px; height: 48px;">
                        @endif
                        <div>
                            <h2 style="font-size: 1.25rem; font-weight: 800; color: #0F172A;">Welcome, {{ Auth::user()->name }}</h2>
                            <p style="font-size: 0.85rem; color: #64748B;">Role: {{ Auth::user()->role ?? 'Warehouse Staff' }}</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; background: #F8FAFC; padding: 0.4rem 0.85rem; border-radius: 8px; border: 1px solid #E2E8F0; font-size: 0.85rem; font-weight: 600;">
                        <i class="fa-solid fa-building" style="color: var(--primary-orange)"></i>
                        <span>Profile Berdikari Jaya</span>
                    </div>
                </div>

                <!-- 4 Stat Cards -->
                <div class="stat-grid">
                    <div class="stat-card">
                        <div class="stat-title">Total Stock</div>
                        <div class="stat-value" id="statTotalStock">12,450</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Barang Masuk Hari Ini</div>
                        <div class="stat-value" id="statInboundToday">185 <span style="font-size: 0.85rem; font-weight: 600; color: #64748B;">Units</span></div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-title">Barang Keluar Hari Ini</div>
                        <div class="stat-value" id="statOutboundToday">132 <span style="font-size: 0.85rem; font-weight: 600; color: #64748B;">Units</span></div>
                    </div>
                    <div class="stat-card alert-card">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="stat-title" style="color: #C2410C;">Low Stock Alert</div>
                            <span style="background: #E85A1C; color: white; font-size: 0.65rem; font-weight: 800; padding: 2px 6px; border-radius: 10px;">!</span>
                        </div>
                        <div class="stat-value" style="color: #C2410C;" id="statLowStockCount">8 <span style="font-size: 0.85rem; font-weight: 600; color: #C2410C;">Items</span></div>
                    </div>
                </div>

                <!-- Dashboard Grid: Chart + Low Stock Table -->
                <div class="dashboard-grid">
                    <!-- Chart Card -->
                    <div class="card" style="grid-column: 1 / -1;">
                        <div class="chart-grid">
                            <div>
                                <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 1rem; color: #0F172A;">Arus Barang Mingguan</h3>
                                <div style="height: 280px; position: relative;">
                                    <canvas id="weeklyFlowChart"></canvas>
                                </div>
                            </div>
                            <div>
                                <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 1rem; color: #0F172A;">Distribusi Kategori</h3>
                                <div style="height: 280px; position: relative;">
                                    <canvas id="categoryDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Low Stock Table Card -->
                    <div class="card" style="grid-column: 1 / -1;">
                        <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 1rem; color: #0F172A; display: flex; justify-content: space-between; align-items: center;">
                            <span>Notifikasi Stok Menipis</span>
                            <span style="font-size: 0.75rem; color: var(--primary-orange); cursor: pointer;" onclick="switchTab('master', null)">Lihat Semua</span>
                        </h3>

                        <div style="overflow-x: auto;">
                            <table class="custom-table">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>SKU</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="lowStockTableBody">
                                    <!-- Populated via JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection
