@extends('layouts.app')

@section('content')
<div id="dashboard-view" class="page-view active" style="height: calc(100vh - 64px - 3rem); display: flex; flex-direction: column; overflow: hidden;">
                <!-- Onboarding Banner -->
                <div style="background: linear-gradient(135deg, var(--primary-orange), #006666); color: white; padding: 1.25rem 1.5rem; border-radius: 12px; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: flex-start; flex-shrink: 0; box-shadow: 0 4px 15px rgba(0, 139, 139, 0.2);">
                    <div>
                        <h2 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 0.25rem; display: flex; align-items: center; gap: 0.5rem;"><i class="fa-solid fa-circle-info"></i> Selamat Datang di WMS!</h2>
                        <p style="font-size: 0.85rem; opacity: 0.9; line-height: 1.5; max-width: 800px;">Sistem Manajemen Gudang ini membantu Anda mengelola data barang (Master Data), mencatat barang masuk (Inbound) menggunakan scanner barcode, melacak barang keluar (Outbound), serta mengatur daftar lokasi gudang dan staf (Users).</p>
                    </div>
                    <button onclick="this.parentElement.style.display='none'" style="background: rgba(255,255,255,0.2); border: none; color: white; width: 30px; height: 30px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.2s;"><i class="fa-solid fa-xmark"></i></button>
                </div>

                <div class="welcome-card card" style="margin-bottom: 1rem; flex-shrink: 0;">
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        @if(Auth::user()->profile_image_url)
                            <img src="{{ Auth::user()->profile_image_url }}" alt="{{ Auth::user()->name }} Profile" class="avatar" style="width: 48px; height: 48px; object-fit: cover;">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=BA4727&color=008080" alt="{{ Auth::user()->name }} Profile" class="avatar" style="width: 48px; height: 48px;">
                        @endif
                        <div>
                            <h2 style="font-size: 1.25rem; font-weight: 800; color: var(--text-dark);">Welcome, {{ Auth::user()->name }}</h2>
                            <p style="font-size: 0.85rem; color: var(--text-muted);">Role: {{ Auth::user()->role ?? 'Warehouse Staff' }}</p>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem; background: var(--card-bg); padding: 0.4rem 0.85rem; border-radius: 8px; border: 1px solid var(--border-color); font-size: 0.85rem; font-weight: 600;">
                        <i class="fa-solid fa-building" style="color: var(--primary-orange)"></i>
                        <span>Profile Berdikari Jaya</span>
                    </div>
                </div>

                <!-- 4 Stat Cards -->
                <div class="stat-grid" style="margin-bottom: 1rem; flex-shrink: 0;">
                    <div class="stat-card" style="position: relative; overflow: hidden;">
                        <i class="fa-solid fa-boxes-stacked" style="position: absolute; right: -10px; bottom: -15px; font-size: 5rem; opacity: 0.04; color: var(--text-dark); pointer-events: none;"></i>
                        <div class="stat-title">Total Stock</div>
                        <div class="stat-value" id="statTotalStock">12,450</div>
                        <div style="font-size: 0.7rem; color: var(--text-muted); margin-top: 0.25rem;">Total seluruh barang di gudang</div>
                    </div>
                    <div class="stat-card" style="position: relative; overflow: hidden;">
                        <i class="fa-solid fa-arrow-right-to-bracket" style="position: absolute; right: -10px; bottom: -15px; font-size: 5rem; opacity: 0.04; color: var(--text-dark); pointer-events: none;"></i>
                        <div class="stat-title">Barang Masuk (Inbound)</div>
                        <div class="stat-value" id="statInboundToday">185 <span style="font-size: 0.85rem; font-weight: 600; color: var(--text-muted);">Units</span></div>
                        <div style="font-size: 0.7rem; color: var(--text-muted); margin-top: 0.25rem;">Jumlah barang masuk hari ini</div>
                    </div>
                    <div class="stat-card" style="position: relative; overflow: hidden;">
                        <i class="fa-solid fa-arrow-right-from-bracket" style="position: absolute; right: -10px; bottom: -15px; font-size: 5rem; opacity: 0.04; color: var(--text-dark); pointer-events: none;"></i>
                        <div class="stat-title">Barang Keluar (Outbound)</div>
                        <div class="stat-value" id="statOutboundToday">132 <span style="font-size: 0.85rem; font-weight: 600; color: var(--text-muted);">Units</span></div>
                        <div style="font-size: 0.7rem; color: var(--text-muted); margin-top: 0.25rem;">Jumlah barang keluar hari ini</div>
                    </div>
                    <div class="stat-card alert-card" style="position: relative; overflow: hidden;">
                        <i class="fa-solid fa-triangle-exclamation" style="position: absolute; right: -10px; bottom: -15px; font-size: 5rem; opacity: 0.08; color: #BA4727; pointer-events: none;"></i>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="stat-title" style="color: #BA4727; margin-bottom: 0.2rem;">Low Stock Alert</div>
                            <span title="Barang yang stoknya akan habis" style="background: #BA4727; color: #008080; font-size: 0.65rem; font-weight: 800; padding: 2px 6px; border-radius: 10px; cursor: help;">!</span>
                        </div>
                        <div class="stat-value" style="color: #BA4727;" id="statLowStockCount">8 <span style="font-size: 0.85rem; font-weight: 600; color: #BA4727;">Items</span></div>
                        <div style="font-size: 0.7rem; color: rgba(186,71,39,0.8); margin-top: 0.25rem;">Barang yang perlu segera di-restock</div>
                    </div>
                </div>

                <!-- Dashboard Grid: Chart + Low Stock Table -->
                <div class="dashboard-grid" style="flex: 1; min-height: 0; gap: 1rem; align-items: stretch;">
                    <!-- Chart Card -->
                    <div class="card" style="display: flex; flex-direction: column; overflow: hidden; padding: 1.25rem 1.5rem;">
                        <div style="display: flex; flex-direction: column; gap: 1.5rem; height: 100%;">
                            <div style="flex: 1; display: flex; flex-direction: column;">
                                <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.5rem; color: #0F172A;">Arus Barang Mingguan</h3>
                                <div style="flex: 1; position: relative; min-height: 0;">
                                    <canvas id="weeklyFlowChart"></canvas>
                                </div>
                            </div>
                            <div style="flex: 1; display: flex; flex-direction: column;">
                                <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.5rem; color: #0F172A;">Distribusi Kategori</h3>
                                <div style="flex: 1; position: relative; min-height: 0;">
                                    <canvas id="categoryDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Low Stock Table Card -->
                    <div class="card" style="display: flex; flex-direction: column; overflow: hidden; padding: 1.25rem 1.5rem;">
                        <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.75rem; color: #0F172A; display: flex; justify-content: space-between; align-items: center; flex-shrink: 0;">
                            <span>Notifikasi Stok Menipis</span>
                            <span style="font-size: 0.75rem; color: var(--primary-orange); cursor: pointer;" onclick="switchTab('master', null)">Lihat Semua</span>
                        </h3>

                        <div class="modern-scrollbar" style="overflow-y: auto; flex: 1; border-radius: 8px;">
                            <table class="custom-table" style="margin: 0;">
                                <thead style="position: sticky; top: 0; z-index: 10;">
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
