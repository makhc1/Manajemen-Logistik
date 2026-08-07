<div id="barcodePrintModal" class="modal-overlay">
    <div class="modal-card">
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;">Print Label Barcode WMS</h3>
        <div style="background: #F8FAFC; border: 1px dashed #CBD5E1; padding: 1.25rem; border-radius: 12px; margin-bottom: 1.25rem;">
            <div style="font-size: 0.9rem; font-weight: 800;" id="modalProdName">Wireless Scanner Zebra</div>
            <div style="font-size: 0.75rem; color: #64748B; margin-bottom: 0.5rem;" id="modalProdLoc">Rak C-01 • Indonesia</div>
            <svg id="modalBarcodeSvg"></svg>
        </div>
        <div style="display: flex; gap: 0.75rem;">
            <button class="btn-action btn-print" style="flex: 1;" onclick="executeBarcodePrint()"><i class="fa-solid fa-print"></i> Cetak Sekarang</button>
            <button class="btn-action" style="background: #E2E8F0; color: #475569; flex: 1;" onclick="closeBarcodeModal()">Batal</button>
        </div>
    </div>
</div>

<div id="toast">
    <i class="fa-solid fa-circle-check" style="color: #10B981; font-size: 1.1rem;"></i>
    <span id="toastMessage">Sistem WMS Siap Digunakan</span>
</div>