@extends('layouts.app')

@section('content')
<div id="inbound-view" class="page-view active">
                <div class="inbound-grid">
                    <!-- Left: Scanner Simulator -->
                    <div class="scanner-container">
                        <div class="flex-between-mb-4">
                            <div class="camera-title-box">
                                <i class="fa-solid fa-camera" class="text-primary-orange"></i>
                                <span>Live Barcode Scanning (Inbound)</span>
                            </div>
                        </div>

                        <!-- Step-by-step Guide -->
                        <div class="guide-box">
                            <h4 class="guide-title">Panduan Singkat:</h4>
                            <ol class="guide-list">
                                <li>Klik tombol <strong>Kamera</strong> di bawah untuk mulai.</li>
                                <li>Arahkan kamera ke barcode barang.</li>
                                <li>Lengkapi detail di form sebelah kanan dan klik <strong>Simpan</strong>.</li>
                            </ol>
                        </div>

                        <div class="scanner-viewport">
                            <div id="reader" class="w-full"></div>
                            <div class="laser-line" id="scannerLaser" class="d-none z-10 w-full left-0"></div>
                            <i class="fa-solid fa-qrcode" id="scannerPlaceholder" class="scanner-icon-bg"></i>
                        </div>

                        <div class="scanner-controls">
                            <p class="scanner-desc">Arahkan kamera ke barcode produk untuk membaca data WMS secara otomatis.</p>
                            <div class="flex-center-gap-4">
                                <button id="startScanBtn" class="shutter-btn" title="Mulai Kamera" type="button">
                                    <i class="fa-solid fa-camera" class="icon-camera"></i>
                                </button>
                                <button id="stopScanBtn" class="shutter-btn" title="Hentikan Kamera" type="button" class="d-none border-red-500">
                                    <i class="fa-solid fa-stop" class="icon-stop"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Add Product Form -->
                    <div class="card">
                        <h3 class="form-title">Add Product / Penerimaan WMS</h3>

                        <form id="inboundForm" >
                            <div class="form-grid-2">
                                <div>
                                    <label class="form-label">SKU</label>
                                    <input type="text" id="inboundSku" class="form-input" value="BRG-00123" required >
                                </div>
                                <div>
                                    <label class="form-label">Product Name</label>
                                    <input type="text" id="inboundName" class="form-input" value="Wireless Scanner Zebra" required>
                                </div>
                            </div>

                            <div class="form-grid-2">
                                <div>
                                    <label class="form-label">Category</label>
                                    <select id="inboundCategory" class="form-select">
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Aksesori">Aksesori</option>
                                        <option value="Hardware">Hardware</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label">Quantity Received</label>
                                    <input type="number" id="inboundQty" class="form-input" value="45" min="1" required>
                                </div>
                            </div>

                            <div class="form-grid-2">
                                <div>
                                    <label class="form-label">Supplier / Brand</label>
                                    <input type="text" id="inboundSupplier" class="form-input" value="PT Berdikari Jaya">
                                </div>
                                <div>
                                    <label class="form-label">Receive Date</label>
                                    <input type="date" id="inboundDate" class="form-input" value="2026-08-07">
                                </div>
                            </div>

                            <div class="form-grid-2">
                                <div>
                                    <label class="form-label">Storage Location</label>
                                    <input type="text" id="inboundLocation" class="form-input" value="Rak C-01">
                                </div>
                                <div>
                                    <label class="form-label">Country of Origin</label>
                                    <input type="text" id="inboundOrigin" class="form-input" value="Indonesia">
                                </div>
                            </div>

                            <div class="flex-center-gap-4-mt">
                                <button type="submit" class="btn-action btn-pdf flex-1 py-3 text-sm">
                                    <i class="fa-solid fa-print"></i> Simpan & Print Barcode
                                </button>
                            </div>
                        </form>

                        <div class="preview-box">
                            <div class="preview-title">DYNAMIC BARCODE PREVIEW</div>
                            <svg id="liveBarcodeSvg"></svg>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- History Inbounds Table -->
                <div class="card mt-6">
                    <div class="page-header-row">
                        <h3 class="page-title">Inbound History</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Receive Date</th>
                                    <th>SKU</th>
                                    <th>Supplier</th>
                                    <th>Qty Received</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inbounds as $inbound)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($inbound->receive_date)->format('d M Y') }}</td>
                                    <td class="fw-bold text-primary-orange">{{ $inbound->sku }}</td>
                                    <td>{{ $inbound->supplier ?? '-' }}</td>
                                    <td><span class="badge-qty">{{ $inbound->qty }}</span></td>
                                    <td style="text-align: right;">
                                        <button data-id="{{ $inbound->id }}" data-sku="{{ $inbound->sku }}" data-qty="{{ $inbound->qty }}" data-supplier="{{ $inbound->supplier }}" data-date="{{ $inbound->receive_date }}" class="btn-action btn-edit btn-edit-inbound"><i class="fa-solid fa-pen"></i></button>
                                        <button data-id="{{ $inbound->id }}" class="btn-action btn-delete btn-delete-inbound"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @if($inbounds->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center text-slate-400 p-6">Belum ada data barang masuk.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


@endsection
