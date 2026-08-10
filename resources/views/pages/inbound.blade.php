@extends('layouts.app')

@section('content')
<div id="inbound-view" class="page-view active">
                <div class="inbound-grid">
                    <!-- Left: Scanner Simulator -->
                    <div class="scanner-container">
                        <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                            <div style="font-size: 0.9rem; font-weight: 700; display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fa-solid fa-camera" style="color: var(--primary-orange);"></i>
                                <span>Live Barcode Scanning</span>
                            </div>
                            <i class="fa-solid fa-bolt" style="cursor: pointer;" onclick="showToast('Flash LED dinyalakan')"></i>
                        </div>

                        <div class="viewfinder">
                            <div class="laser-line"></div>
                            <i class="fa-solid fa-qrcode" style="font-size: 4rem; color: rgba(255,255,255,0.15);"></i>
                        </div>

                        <div style="text-align: center; width: 100%;">
                            <p style="font-size: 0.75rem; color: #94A3B8; margin-bottom: 1rem;">Arahkan kamera ke barcode produk untuk membaca data WMS secara otomatis.</p>
                            <div style="display: flex; justify-content: center; gap: 1rem; align-items: center;">
                                <button class="shutter-btn" onclick="simulateBarcodeScan()" title="Klik untuk memindai Barcode">
                                    <i class="fa-solid fa-barcode" style="font-size: 1.25rem; color: var(--primary-orange);"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Add Product Form -->
                    <div class="card">
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin-bottom: 1.25rem;">Add Product / Penerimaan WMS</h3>

                        <form id="inboundForm" onsubmit="handleInboundSubmit(event)">
                            <div class="form-grid-2">
                                <div>
                                    <label class="form-label">SKU</label>
                                    <input type="text" id="inboundSku" class="form-input" value="BRG-00123" required oninput="updateLiveBarcode(this.value)">
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

                            <div style="display: flex; gap: 1rem; align-items: center; margin-top: 1rem;">
                                <button type="submit" class="btn-action btn-pdf" style="flex: 1; padding: 0.75rem; font-size: 0.9rem;">
                                    <i class="fa-solid fa-print"></i> Simpan & Print Barcode
                                </button>
                            </div>
                        </form>

                        <div style="margin-top: 1.5rem; text-align: center; background: #F8FAFC; padding: 1rem; border-radius: 12px; border: 1px solid #E2E8F0;">
                            <div style="font-size: 0.75rem; font-weight: 700; color: #64748B; margin-bottom: 0.5rem;">DYNAMIC BARCODE PREVIEW</div>
                            <svg id="liveBarcodeSvg"></svg>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- History Inbounds Table -->
                <div class="card" style="margin-top: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0F172A;">Inbound History</h3>
                    </div>
                    <div style="overflow-x: auto;">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Receive Date</th>
                                    <th>SKU</th>
                                    <th>Supplier</th>
                                    <th>Qty Received</th>
                                    <th style="text-align: right;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inbounds as $inbound)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($inbound->receive_date)->format('d M Y') }}</td>
                                    <td style="font-weight: 700; color: var(--primary-orange);">{{ $inbound->sku }}</td>
                                    <td>{{ $inbound->supplier ?? '-' }}</td>
                                    <td><span style="background: #F1F5F9; color: #1E293B; padding: 2px 8px; border-radius: 6px; font-weight: 800;">{{ $inbound->qty }}</span></td>
                                    <td style="text-align: right;">
                                        <button onclick="editInbound({{ $inbound->id }}, '{{ addslashes($inbound->sku) }}', {{ $inbound->qty }}, '{{ addslashes($inbound->supplier) }}', '{{ $inbound->receive_date }}')" class="btn-action" style="background: #F1F5F9; color: #3B82F6; padding: 0.4rem 0.6rem; margin-right: 0.25rem; display: inline-flex;"><i class="fa-solid fa-pen"></i></button>
                                        <button onclick="deleteInbound({{ $inbound->id }})" class="btn-action" style="background: #FEE2E2; color: #EF4444; padding: 0.4rem 0.6rem; display: inline-flex;"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @if($inbounds->isEmpty())
                                <tr>
                                    <td colspan="5" style="text-align: center; color: #94A3B8; padding: 1.5rem;">Belum ada data barang masuk.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection
