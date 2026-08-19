@extends('layouts.app')

@section('content')
<div id="master-view" class="page-view active">
                <div class="card" style="margin-bottom: 1.5rem;">
                    <div class="page-header-row">
                        <div>
                            <h2 style="font-size: 1.25rem; font-weight: 800; color: #0F172A;">Inventory / Master</h2>
                            <p style="font-size: 0.85rem; color: #64748B;">Kelola daftar produk dan informasi dasar barang sebelum melakukan transaksi Inbound/Outbound.</p>
                        </div>
                        <div class="page-actions">
                            <input type="text" id="masterSearch" placeholder="Search product..." class="form-input" style="width: 220px;" oninput="filterMasterTable(this.value)">
                            <button onclick="openAddProductModal()" class="btn-action" style="background: #3B82F6; color: white; border: none; padding: 0.55rem 1rem; border-radius: 8px; cursor: pointer; font-weight: 600;"><i class="fa-solid fa-plus"></i> Add Product</button>
                            <a href="/api/products/export" class="btn-action" style="background: #10B981; color: white; text-decoration: none; display: inline-flex; width: 140px; padding: 0.55rem; border-radius: 8px; justify-content: center; align-items: center;"><i class="fa-solid fa-file-excel"></i> Export CSV</a>
                            <select class="form-select" style="width: 130px;" onchange="filterCategory(this.value)">
                                <option value="all">Semua Kategori</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Aksesori">Aksesori</option>
                                <option value="Hardware">Hardware</option>
                            </select>
                        </div>
                    </div>

                    <div style="overflow-x: auto;">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th style="width: 30px;"><input type="checkbox"></th>
                                    <th>Product Name</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Stock Received</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="masterTableBody">
                                <!-- Populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Detailed Selected Product Panel (Mockup Top Right) -->
                <div id="productDetailCard" class="card" style="display: block;">
                    <div style="display: grid; grid-template-columns: 200px 1fr 280px; gap: 1.5rem; align-items: center;">
                        <!-- Left: Product Image -->
                        <div style="background: #F8FAFC; border-radius: 12px; padding: 1.5rem; display: flex; align-items: center; justify-content: center; border: 1px solid #E2E8F0; flex-direction: column;">
                            <i class="fa-solid fa-barcode" style="font-size: 4.5rem; color: var(--primary-orange); margin-bottom: 0.5rem;"></i>
                            <span style="font-size: 0.725rem; font-weight: 700; color: #64748B;" id="detailBrandTitle">Sanco Hsciera</span>
                        </div>

                        <!-- Middle: Specifications -->
                        <div>
                            <h3 id="detailName" style="font-size: 1.2rem; font-weight: 800; color: #0F172A; margin-bottom: 0.25rem;">Wireless Scanner Zebra</h3>
                            <div id="detailSku" style="font-size: 0.85rem; font-weight: 700; color: var(--primary-orange); margin-bottom: 1rem;">SKU: BRG-00123</div>
                            
                            <div style="font-size: 0.85rem; color: #334155; line-height: 1.6;">
                                <div style="font-weight: 700; margin-bottom: 0.25rem;">Specifications:</div>
                                <div>• Brand: <span id="detailBrand">Sanco Hsciera</span></div>
                                <div>• Dimension: <span id="detailDimension">1000ml</span></div>
                                <div>• Specification: <span id="detailSpec">100 of 02 mm</span></div>
                                <div>• Country of Origin: <span id="detailOrigin">Indonesia</span></div>
                            </div>
                        </div>

                        <!-- Right: Barcode SVG & Scan History -->
                        <div style="border-left: 1px solid #E2E8F0; padding-left: 1.5rem;">
                            <div style="text-align: center; background: #FFF; padding: 0.85rem; border: 1px solid #E2E8F0; border-radius: 10px; margin-bottom: 1rem;">
                                <svg id="detailBarcodeSvg"></svg>
                                <div style="font-size: 0.75rem; font-weight: 700; color: #475569; margin-top: 0.25rem;">Location: <span id="detailLocation" style="color: var(--primary-orange);">Rak C-01</span></div>
                            </div>

                            <div style="font-size: 0.8rem; font-weight: 700; color: #0F172A; margin-bottom: 0.5rem;">Scan History</div>
                            <div style="font-size: 0.75rem; color: #64748B;">
                                <div style="display: flex; justify-content: space-between; padding: 0.25rem 0; border-bottom: 1px dashed #E2E8F0;">
                                    <span>2024-03-11 10:00:23</span>
                                    <span style="font-weight: 600;">1 month ago</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; padding: 0.25rem 0;">
                                    <span>2024-03-12 14:02:11</span>
                                    <span style="font-weight: 600;">4 months ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
