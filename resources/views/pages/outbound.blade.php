@extends('layouts.app')

@section('content')
<div id="outbound-view" class="page-view active">
                <div class="outbound-grid">
                    <!-- Left: Shipment Form & Picking List -->
                    <div class="flex-col-gap-6">
                        <!-- Create Shipment -->
                        <div class="card">
                            <div class="mb-4">
                                <h3 class="outbound-title">Outbound / Create Shipment</h3>
                                <p class="page-subtitle">Pilih barang dari Picking List untuk membuat Surat Jalan. Pastikan data penerima sudah benar.</p>
                            </div>

                            <div class="form-grid-2">
                                <div>
                                    <label class="form-label">Customer / Receiver</label>
                                    <input type="text" class="form-input" id="shipmentCustomer" value="PT Berdikari Jaya" >
                                </div>
                                <div>
                                    <label class="form-label">Shipment Date</label>
                                    <input type="date" class="form-input" id="shipmentDate" value="2026-08-15" >
                                </div>
                            </div>

                            <div>
                                <label class="form-label">Destination Address</label>
                                <input type="text" class="form-input" id="shipmentDestination" value="Jl. Raya Industri No. 45, Kawasan Logistik, Surabaya" >
                            </div>
                        </div>

                        <!-- Picking List -->
                        <div class="card">
                            <h3 class="picking-title">
                                <span>Picking List</span>
                                <span class="picking-count" id="pickingSelectedCount">4 Selected Items</span>
                            </h3>

                            <div id="pickingListContainer" class="picking-container">
                                <div class="empty-state-text">Memuat daftar produk...</div>
                            </div>

                            <button class="btn-action btn-pdf w-full py-3 text-sm" id="processOutboundBtn">
                                <i class="fa-solid fa-rotate"></i> Update Stock Automatically
                            </button>
                        </div>
                    </div>

                    <!-- Right: Surat Jalan Preview -->
                    <div id="printableSuratJalan" class="surat-jalan-paper">
                        <div class="sj-header">
                            <div>
                                <div class="sj-title">Surat Jalan</div>
                                <div class="sj-subtitle">Shipment Number: <strong class="text-dark" id="sjNumberDisplay">SJ-30241028-001</strong></div>
                            </div>
                            <div>
                                <svg id="suratJalanBarcode"></svg>
                            </div>
                        </div>

                        <div class="sj-grid">
                            <div>
                                <div class="sj-label">Penerima / To:</div>
                                <div class="sj-value" id="sjReceiverDisplay">PT Berdikari Jaya</div>
                                <div class="sj-desc" id="sjAddressDisplay">Gudang Utama Jakarta</div>
                                <div class="sj-desc">PIC: Yohanes Jalan</div>
                            </div>
                            <div class="text-right">
                                <div class="sj-label">Nomor Surat Jalan:</div>
                                <div class="sj-value-orange" id="sjNoDisplay">SJ-30241028-001</div>
                                <div class="sj-desc">Tanggal: <span id="sjDateDisplay">25/09/2026</span></div>
                            </div>
                        </div>

                        <table class="custom-table mb-5">
                            <thead>
                                <tr class="bg-dark-header">
                                    <th class="text-white">Item</th>
                                    <th class="text-white text-center">Quantity</th>
                                    <th class="text-white text-right">Date</th>
                                </tr>
                            </thead>
                            <tbody id="suratJalanTableBody">
                                <!-- Populated dynamically based on picking list selection -->
                            </tbody>
                        </table>

                        <div class="sj-summary">
                            <span>Total Item Outbound:</span>
                            <span class="text-primary-orange" id="sjTotalSummary">Total: SJ-302415-001</span>
                        </div>

                        <!-- Action Bar -->
                        <div class="action-bar">
                            <button class="btn-action btn-pdf" id="downloadSuratJalanBtn">
                                <i class="fa-solid fa-file-pdf"></i> Download PDF
                            </button>
                            <button class="btn-action btn-share" id="shareSuratJalanBtn">
                                <i class="fa-solid fa-share-nodes"></i> Share
                            </button>
                            <button class="btn-action btn-print" id="printSuratJalanBtn">
                                <i class="fa-solid fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
@endsection
