@extends('layouts.app')

@section('content')
<div id="outbound-view" class="page-view active">
                <div class="outbound-grid">
                    <!-- Left: Shipment Form & Picking List -->
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <!-- Create Shipment -->
                        <div class="card">
                            <h3 style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;">Outbound / Create Shipment</h3>

                            <div class="form-grid-2">
                                <div>
                                    <label class="form-label">Customer / Receiver</label>
                                    <select class="form-select" id="shipmentCustomer" onchange="updateSuratJalanInfo()">
                                        <option value="PT Berdikari Jaya">PT Berdikari Jaya</option>
                                        <option value="Gudang Cabang Surabaya">Gudang Cabang Surabaya</option>
                                        <option value="CV Maju Logistics">CV Maju Logistics</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="form-label">Shipment Date</label>
                                    <input type="date" class="form-input" id="shipmentDate" value="2026-08-15" onchange="updateSuratJalanInfo()">
                                </div>
                            </div>

                            <div>
                                <label class="form-label">Destination Address</label>
                                <input type="text" class="form-input" id="shipmentDestination" value="Jl. Raya Industri No. 45, Kawasan Logistik, Surabaya" oninput="updateSuratJalanInfo()">
                            </div>
                        </div>

                        <!-- Picking List -->
                        <div class="card">
                            <h3 style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem; display: flex; justify-content: space-between;">
                                <span>Picking List</span>
                                <span style="font-size: 0.8rem; color: var(--primary-orange);" id="pickingSelectedCount">4 Selected Items</span>
                            </h3>

                            <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-bottom: 1.25rem;">
                                <label style="display: flex; align-items: center; justify-content: space-between; padding: 0.65rem 0.85rem; background: #F8FAFC; border-radius: 8px; border: 1px solid #E2E8F0; cursor: pointer;">
                                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                                        <input type="checkbox" checked class="pick-item" onchange="syncPickingListToSuratJalan()" data-name="List Inmet" data-qty="5" data-date="25/09/2026">
                                        <span style="font-size: 0.85rem; font-weight: 700;">List Inmet</span>
                                    </div>
                                    <span style="font-size: 0.8rem; font-weight: 800; color: var(--primary-orange);">5 units</span>
                                </label>

                                <label style="display: flex; align-items: center; justify-content: space-between; padding: 0.65rem 0.85rem; background: #F8FAFC; border-radius: 8px; border: 1px solid #E2E8F0; cursor: pointer;">
                                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                                        <input type="checkbox" checked class="pick-item" onchange="syncPickingListToSuratJalan()" data-name="Laptop Dell" data-qty="5" data-date="25/09/2026">
                                        <span style="font-size: 0.85rem; font-weight: 700;">Laptop Dell</span>
                                    </div>
                                    <span style="font-size: 0.8rem; font-weight: 800; color: var(--primary-orange);">x5</span>
                                </label>

                                <label style="display: flex; align-items: center; justify-content: space-between; padding: 0.65rem 0.85rem; background: #F8FAFC; border-radius: 8px; border: 1px solid #E2E8F0; cursor: pointer;">
                                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                                        <input type="checkbox" checked class="pick-item" onchange="syncPickingListToSuratJalan()" data-name="Mouse Logitech" data-qty="10" data-date="25/09/2026">
                                        <span style="font-size: 0.85rem; font-weight: 700;">Mouse Logitech</span>
                                    </div>
                                    <span style="font-size: 0.8rem; font-weight: 800; color: var(--primary-orange);">x10</span>
                                </label>

                                <label style="display: flex; align-items: center; justify-content: space-between; padding: 0.65rem 0.85rem; background: #F8FAFC; border-radius: 8px; border: 1px solid #E2E8F0; cursor: pointer;">
                                    <div style="display: flex; align-items: center; gap: 0.65rem;">
                                        <input type="checkbox" checked class="pick-item" onchange="syncPickingListToSuratJalan()" data-name="Link Cable HighSpeed" data-qty="10" data-date="25/09/2026">
                                        <span style="font-size: 0.85rem; font-weight: 700;">Link Cable HighSpeed</span>
                                    </div>
                                    <span style="font-size: 0.8rem; font-weight: 800; color: var(--primary-orange);">x10</span>
                                </label>
                            </div>

                            <button class="btn-action btn-pdf" style="width: 100%; padding: 0.85rem; font-size: 0.9rem;" onclick="processOutboundStockUpdate()">
                                <i class="fa-solid fa-rotate"></i> Update Stock Automatically
                            </button>
                        </div>
                    </div>

                    <!-- Right: Surat Jalan Preview -->
                    <div id="printableSuratJalan" class="surat-jalan-paper">
                        <div class="sj-header">
                            <div>
                                <div class="sj-title">Surat Jalan</div>
                                <div style="font-size: 0.8rem; color: #64748B;">Shipment Number: <strong style="color: #0F172A;" id="sjNumberDisplay">SJ-30241028-001</strong></div>
                            </div>
                            <div>
                                <svg id="suratJalanBarcode"></svg>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; font-size: 0.8rem; margin-bottom: 1.25rem;">
                            <div>
                                <div style="color: #64748B; font-weight: 600;">Penerima / To:</div>
                                <div style="font-weight: 800; color: #0F172A;" id="sjReceiverDisplay">PT Berdikari Jaya</div>
                                <div style="color: #475569;" id="sjAddressDisplay">Gudang Utama Jakarta</div>
                                <div style="color: #475569;">PIC: Yohanes Jalan</div>
                            </div>
                            <div style="text-align: right;">
                                <div style="color: #64748B; font-weight: 600;">Nomor Surat Jalan:</div>
                                <div style="font-weight: 800; color: var(--primary-orange);" id="sjNoDisplay">SJ-30241028-001</div>
                                <div style="color: #475569;">Tanggal: <span id="sjDateDisplay">25/09/2026</span></div>
                            </div>
                        </div>

                        <table class="custom-table" style="margin-bottom: 1.25rem;">
                            <thead>
                                <tr style="background: #1E293B; color: white;">
                                    <th style="color: white;">Item</th>
                                    <th style="color: white; text-align: center;">Quantity</th>
                                    <th style="color: white; text-align: right;">Date</th>
                                </tr>
                            </thead>
                            <tbody id="suratJalanTableBody">
                                <!-- Populated dynamically based on picking list selection -->
                            </tbody>
                        </table>

                        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 2px solid #E2E8F0; padding-top: 0.85rem; font-size: 0.85rem; font-weight: 800;">
                            <span>Total Item Outbound:</span>
                            <span style="color: var(--primary-orange);" id="sjTotalSummary">Total: SJ-302415-001</span>
                        </div>

                        <!-- Action Bar -->
                        <div class="action-bar">
                            <button class="btn-action btn-pdf" onclick="downloadSuratJalanPDF()">
                                <i class="fa-solid fa-file-pdf"></i> Download PDF
                            </button>
                            <button class="btn-action btn-share" onclick="shareSuratJalan()">
                                <i class="fa-solid fa-share-nodes"></i> Share
                            </button>
                            <button class="btn-action btn-print" onclick="window.print()">
                                <i class="fa-solid fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
@endsection
