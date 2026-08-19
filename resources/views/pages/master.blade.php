@extends('layouts.app')

@section('content')
<div id="master-view" class="page-view active">
                <div class="card mb-6">
                    <div class="page-header-row">
                        <div>
                            <h2 class="page-title">Inventory / Master</h2>
                            <p class="page-subtitle">Kelola daftar produk dan informasi dasar barang sebelum melakukan transaksi Inbound/Outbound.</p>
                        </div>
                        <div class="page-actions">
                            <input type="text" id="masterSearch" placeholder="Search product..." class="form-input w-220" >
                            <button id="openAddProductModalBtn" class="btn-action btn-primary"><i class="fa-solid fa-plus"></i> Add Product</button>
                            <a href="/api/products/export" class="btn-action btn-success"><i class="fa-solid fa-file-excel"></i> Export CSV</a>
                            <select class="form-select w-130" id="masterCategoryFilter">
                                <option value="all">Semua Kategori</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Aksesori">Aksesori</option>
                                <option value="Hardware">Hardware</option>
                            </select>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th class="w-30"><input type="checkbox"></th>
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
                <div id="productDetailCard" class="card d-block">
                    <div class="master-detail-grid">
                        <!-- Left: Product Image -->
                        <div class="detail-image-box">
                            <i class="fa-solid fa-barcode" class="detail-icon"></i>
                            <span class="detail-brand-title" id="detailBrandTitle">Sanco Hsciera</span>
                        </div>

                        <!-- Middle: Specifications -->
                        <div>
                            <h3 id="detailName" class="detail-name">Wireless Scanner Zebra</h3>
                            <div id="detailSku" class="detail-sku">SKU: BRG-00123</div>
                            
                            <div class="detail-specs-container">
                                <div class="fw-bold mb-1">Specifications:</div>
                                <div>• Brand: <span id="detailBrand">Sanco Hsciera</span></div>
                                <div>• Dimension: <span id="detailDimension">1000ml</span></div>
                                <div>• Specification: <span id="detailSpec">100 of 02 mm</span></div>
                                <div>• Country of Origin: <span id="detailOrigin">Indonesia</span></div>
                            </div>
                        </div>

                        <!-- Right: Barcode SVG & Scan History -->
                        <div class="detail-right-panel">
                            <div class="detail-barcode-box">
                                <svg id="detailBarcodeSvg"></svg>
                                <div class="detail-location-text">Location: <span id="detailLocation" class="text-primary-orange">Rak C-01</span></div>
                            </div>

                            <div class="detail-history-title">Scan History</div>
                            <div class="detail-history-list">
                                <div class="history-item-border">
                                    <span>2024-03-11 10:00:23</span>
                                    <span class="fw-600">1 month ago</span>
                                </div>
                                <div class="history-item">
                                    <span>2024-03-12 14:02:11</span>
                                    <span class="fw-600">4 months ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
