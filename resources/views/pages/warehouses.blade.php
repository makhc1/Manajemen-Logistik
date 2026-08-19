@extends('layouts.app')

@section('content')
<div id="warehouses-view" class="page-view active">
                <div class="card">
                    <h2 class="page-title-mb-4"><i class="fa-solid fa-warehouse" class="text-primary-orange"></i> Warehouses Management</h2>
                    <div class="flex-between-mb-6">
                        <p class="page-subtitle-m0">Kelola daftar gudang dan lokasi penyimpanan barang Anda.</p>
                        <button class="btn-action btn-pdf btn-add-wh" id="openAddWarehouseModalBtn"><i class="fa-solid fa-plus"></i> Tambah Gudang</button>
                    </div>
                    <div id="warehouseGrid" class="grid-3-col">
                        <div class="text-center text-slate-500 p-8 col-span-3">Memuat data gudang...</div>
                    </div>
                </div>
            </div>
            
            <!-- Warehouse Modal -->
            <div id="whModal" class="modal-overlay">
                <div class="modal-card modal-card-wide">
                    <h3 id="whModalTitle" class="modal-title">Add Warehouse</h3>
                    <form id="whForm" >
                        <input type="hidden" id="whId">
                        <div class="mb-4">
                            <label class="form-label-custom">Nama Gudang</label>
                            <input type="text" id="whName" class="form-input" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label-custom">Total Kapasitas (Unit)</label>
                            <input type="number" id="whCapacity" class="form-input" required min="1">
                        </div>
                        <div class="mb-6">
                            <label class="form-label-custom">Status</label>
                            <select id="whStatus" class="form-select" required>
                                <option value="AKTIF">AKTIF</option>
                                <option value="OPERASIONAL">OPERASIONAL</option>
                                <option value="TRANSIT">TRANSIT</option>
                            </select>
                        </div>
                        <div class="flex-gap-3">
                            <button type="submit" class="btn-action btn-pdf flex-1"><i class="fa-solid fa-save"></i> Simpan</button>
                            <button type="button" class="btn-action btn-cancel flex-1" id="closeWhModalBtn">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
