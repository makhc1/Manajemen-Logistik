@extends('layouts.app')

@section('content')
<div id="dashboard-view" class="page-view active dashboard-layout">
                <!-- Onboarding Banner -->
                <div class="onboarding-banner">
                    <div>
                        <h2 class="onboarding-title"><i class="fa-solid fa-circle-info"></i> Selamat Datang di WMS!</h2>
                        <p class="onboarding-desc">Sistem Manajemen Gudang ini membantu Anda mengelola data barang (Master Data), mencatat barang masuk (Inbound) menggunakan scanner barcode, melacak barang keluar (Outbound), serta mengatur daftar lokasi gudang dan staf (Users).</p>
                    </div>
                    <button id="closeBannerBtn" class="onboarding-close-btn"><i class="fa-solid fa-xmark"></i></button>
                </div>

                <div class="welcome-card card mb-4 flex-shrink-0">
                    <div class="flex-center-gap-4">
                        @if(Auth::user()->profile_image_url)
                            <img src="{{ Auth::user()->profile_image_url }}" alt="{{ Auth::user()->name }} Profile" class="avatar w-12 h-12 object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=BA4727&color=008080" alt="{{ Auth::user()->name }} Profile" class="avatar w-12 h-12">
                        @endif
                        <div>
                            <h2 class="welcome-title">Welcome, {{ Auth::user()->name }}</h2>
                            <p class="welcome-subtitle">Role: {{ Auth::user()->role ?? 'Warehouse Staff' }}</p>
                        </div>
                    </div>
                    <div class="profile-company-badge">
                        <i class="fa-solid fa-building" class="text-primary-orange"></i>
                        <span>Profile Berdikari Jaya</span>
                    </div>
                </div>

                <!-- 4 Stat Cards -->
                <div class="stat-grid mb-4 flex-shrink-0">
                    <div class="stat-card stat-card-relative">
                        <i class="fa-solid fa-boxes-stacked" class="stat-bg-icon"></i>
                        <div class="stat-title">Total Stock</div>
                        <div class="stat-value" id="statTotalStock">12,450</div>
                        <div class="stat-helper-text">Total seluruh barang di gudang</div>
                    </div>
                    <div class="stat-card stat-card-relative">
                        <i class="fa-solid fa-arrow-right-to-bracket" class="stat-bg-icon"></i>
                        <div class="stat-title">Barang Masuk (Inbound)</div>
                        <div class="stat-value" id="statInboundToday">185 <span class="stat-unit">Units</span></div>
                        <div class="stat-helper-text">Jumlah barang masuk hari ini</div>
                    </div>
                    <div class="stat-card stat-card-relative">
                        <i class="fa-solid fa-arrow-right-from-bracket" class="stat-bg-icon"></i>
                        <div class="stat-title">Barang Keluar (Outbound)</div>
                        <div class="stat-value" id="statOutboundToday">132 <span class="stat-unit">Units</span></div>
                        <div class="stat-helper-text">Jumlah barang keluar hari ini</div>
                    </div>
                    <div class="stat-card alert-card stat-card-relative">
                        <i class="fa-solid fa-triangle-exclamation" class="stat-bg-icon-alert"></i>
                        <div class="flex-between-center">
                            <div class="stat-title text-alert mb-1">Low Stock Alert</div>
                            <span title="Barang yang stoknya akan habis" class="alert-badge">!</span>
                        </div>
                        <div class="stat-value text-alert" id="statLowStockCount">8 <span class="stat-unit-alert">Items</span></div>
                        <div class="stat-helper-text-alert">Barang yang perlu segera di-restock</div>
                    </div>
                </div>

                <!-- Dashboard Grid: Chart + Low Stock Table -->
                <div class="dashboard-grid flex-1 min-h-0 gap-4 items-stretch">
                    <!-- Chart Card -->
                    <div class="card flex-col-hidden p-5">
                        <div class="flex-col-gap-6 h-full">
                            <div class="flex-1-col">
                                <h3 class="chart-title">Arus Barang Mingguan</h3>
                                <div class="chart-container">
                                    <canvas id="weeklyFlowChart"></canvas>
                                </div>
                            </div>
                            <div class="flex-1-col">
                                <h3 class="chart-title">Distribusi Kategori</h3>
                                <div class="chart-container">
                                    <canvas id="categoryDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Low Stock Table Card -->
                    <div class="card flex-col-hidden p-5">
                        <h3 class="low-stock-title">
                            <span>Notifikasi Stok Menipis</span>
                            <span id="viewAllLowStockBtn" class="view-all-link">Lihat Semua</span>
                        </h3>

                        <div class="modern-scrollbar overflow-y-auto flex-1 rounded-lg">
                            <table class="custom-table m-0">
                                <thead class="sticky-top-z10">
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
