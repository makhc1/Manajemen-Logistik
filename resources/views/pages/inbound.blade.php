@extends('layouts.app')

@section('content')
<div id="inbound-view" class="page-view active">
                <div class="inbound-grid">
                    <!-- Left: Scanner Simulator -->
                    <div class="scanner-container">
                        <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                            <div style="font-size: 0.9rem; font-weight: 700; display: flex; align-items: center; gap: 0.5rem;">
                                <i class="fa-solid fa-camera" style="color: var(--primary-orange);"></i>
                                <span>Live Barcode Scanning (Inbound)</span>
                            </div>
                        </div>

                        <!-- Step-by-step Guide -->
                        <div style="background: #F8FAFC; border: 1px solid #E2E8F0; padding: 1rem; border-radius: 12px; margin-bottom: 1rem; text-align: left;">
                            <h4 style="font-size: 0.85rem; font-weight: 800; color: #0F172A; margin-bottom: 0.5rem;">Panduan Singkat:</h4>
                            <ol style="font-size: 0.8rem; color: #475569; margin-left: 1.25rem; line-height: 1.6;">
                                <li>Klik tombol <strong>Kamera</strong> di bawah untuk mulai.</li>
                                <li>Arahkan kamera ke barcode barang.</li>
                                <li>Lengkapi detail di form sebelah kanan dan klik <strong>Simpan</strong>.</li>
                            </ol>
                        </div>

                        <div style="position: relative; width: 100%; max-width: 320px; border-radius: 16px; overflow: hidden; border: 2px dashed rgba(255,255,255,0.2); background: #000; min-height: 240px; display: flex; align-items: center; justify-content: center;">
                            <div id="reader" style="width: 100%;"></div>
                            <div class="laser-line" id="scannerLaser" style="display: none; z-index: 10; width: 100%; left: 0;"></div>
                            <i class="fa-solid fa-qrcode" id="scannerPlaceholder" style="font-size: 4rem; color: rgba(255,255,255,0.15); position: absolute;"></i>
                        </div>

                        <div style="text-align: center; width: 100%; margin-top: 1.5rem;">
                            <p style="font-size: 0.75rem; color: #94A3B8; margin-bottom: 1rem;">Arahkan kamera ke barcode produk untuk membaca data WMS secara otomatis.</p>
                            <div style="display: flex; justify-content: center; gap: 1rem; align-items: center;">
                                <button id="startScanBtn" class="shutter-btn" title="Mulai Kamera" type="button">
                                    <i class="fa-solid fa-camera" style="font-size: 1.25rem; color: var(--primary-orange);"></i>
                                </button>
                                <button id="stopScanBtn" class="shutter-btn" title="Hentikan Kamera" type="button" style="display: none; border-color: #EF4444;">
                                    <i class="fa-solid fa-stop" style="font-size: 1.25rem; color: #EF4444;"></i>
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
                    <div class="page-header-row">
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    let html5QrCode;
    const startScanBtn = document.getElementById('startScanBtn');
    const stopScanBtn = document.getElementById('stopScanBtn');
    const scannerLaser = document.getElementById('scannerLaser');
    const scannerPlaceholder = document.getElementById('scannerPlaceholder');

    function onScanSuccess(decodedText, decodedResult) {
        document.getElementById('inboundSku').value = decodedText;
        
        if (typeof updateLiveBarcode === 'function') {
            updateLiveBarcode(decodedText);
        }
        
        if (typeof showToast === 'function') {
            showToast('Barcode berhasil discan: ' + decodedText);
        }
        
        stopScanning();
    }

    function onScanFailure(error) {
        // Handle scan failure - ignore it for continuous scanning
    }

    function startScanning() {
        if (!html5QrCode) {
            html5QrCode = new Html5Qrcode("reader");
        }
        
        const config = { fps: 10, qrbox: { width: 250, height: 100 } };
        
        html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess, onScanFailure)
        .then(() => {
            startScanBtn.style.display = 'none';
            stopScanBtn.style.display = 'flex';
            scannerLaser.style.display = 'block';
            scannerPlaceholder.style.display = 'none';
        })
        .catch((err) => {
            console.error(err);
            if (typeof showToast === 'function') {
                showToast('Gagal mengakses kamera. Pastikan izin kamera diberikan.');
            }
        });
    }

    function stopScanning() {
        if (html5QrCode && html5QrCode.isScanning) {
            html5QrCode.stop().then(() => {
                startScanBtn.style.display = 'flex';
                stopScanBtn.style.display = 'none';
                scannerLaser.style.display = 'none';
                scannerPlaceholder.style.display = 'block';
            }).catch((err) => {
                console.error("Failed to stop scanning.", err);
            });
        }
    }

    if(startScanBtn) {
        startScanBtn.addEventListener('click', startScanning);
    }
    if(stopScanBtn) {
        stopScanBtn.addEventListener('click', stopScanning);
    }
});
</script>
@endsection
