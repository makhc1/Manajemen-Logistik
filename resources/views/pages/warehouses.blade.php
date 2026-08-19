@extends('layouts.app')

@section('content')
<div id="warehouses-view" class="page-view active">
                <div class="card">
                    <h2 style="font-size: 1.25rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;"><i class="fa-solid fa-warehouse" style="color: var(--primary-orange);"></i> Warehouses Management</h2>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <p style="font-size: 0.85rem; color: #64748B; margin: 0;">Kelola daftar gudang dan lokasi penyimpanan barang Anda.</p>
                        <button class="btn-action btn-pdf" style="padding: 0.5rem 1.5rem; flex: none; border-radius: 8px;" onclick="openAddWarehouseModal()"><i class="fa-solid fa-plus"></i> Tambah Gudang</button>
                    </div>
                    <div id="warehouseGrid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                        <div style="text-align: center; grid-column: span 3; padding: 2rem; color: #64748B;">Memuat data gudang...</div>
                    </div>
                </div>
            </div>
            
            <!-- Warehouse Modal -->
            <div id="whModal" class="modal-overlay">
                <div class="modal-card" style="width: 500px; max-width: 90vw;">
                    <h3 id="whModalTitle" style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;">Add Warehouse</h3>
                    <form id="whForm" onsubmit="saveWarehouse(event)">
                        <input type="hidden" id="whId">
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Nama Gudang</label>
                            <input type="text" id="whName" class="form-input" required>
                        </div>
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Total Kapasitas (Unit)</label>
                            <input type="number" id="whCapacity" class="form-input" required min="1">
                        </div>
                        <div style="margin-bottom: 1.5rem;">
                            <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Status</label>
                            <select id="whStatus" class="form-select" required>
                                <option value="AKTIF">AKTIF</option>
                                <option value="OPERASIONAL">OPERASIONAL</option>
                                <option value="TRANSIT">TRANSIT</option>
                            </select>
                        </div>
                        <div style="display: flex; gap: 0.75rem;">
                            <button type="submit" class="btn-action btn-pdf" style="flex: 1;"><i class="fa-solid fa-save"></i> Simpan</button>
                            <button type="button" class="btn-action" style="background: #E2E8F0; color: #475569; flex: 1;" onclick="closeModal('whModal')">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
