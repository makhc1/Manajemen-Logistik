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

<!-- Add Product Modal -->
<div id="addProductModal" class="modal-overlay">
    <div class="modal-card" style="width: 500px; max-width: 90vw;">
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;">Add New Product</h3>
        <form id="addProductForm" onsubmit="handleAddProductSubmit(event)">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">

                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Product Name</label>
                    <input type="text" id="addProdName" class="form-input" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Category</label>
                    <select id="addProdCategory" class="form-select" required>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Aksesori">Aksesori</option>
                        <option value="Hardware">Hardware</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Initial Stock</label>
                    <input type="number" id="addProdStock" class="form-input" min="0" value="0" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Location</label>
                    <input type="text" id="addProdLocation" class="form-input" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Brand / Supplier</label>
                    <input type="text" id="addProdBrand" class="form-input">
                </div>
            </div>
            <div style="display: flex; gap: 0.75rem;">
                <button type="submit" class="btn-action btn-primary" style="flex: 1;"><i class="fa-solid fa-save"></i> Save Product</button>
                <button type="button" class="btn-action" style="background: #E2E8F0; color: #475569; flex: 1;" onclick="closeAddProductModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Product Modal -->
<div id="editProductModal" class="modal-overlay">
    <div class="modal-card" style="width: 500px; max-width: 90vw;">
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;">Edit Product</h3>
        <form id="editProductForm" onsubmit="handleEditProductSubmit(event)">
            <input type="hidden" id="editProdId">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Product Name</label>
                    <input type="text" id="editProdName" class="form-input" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Category</label>
                    <select id="editProdCategory" class="form-select" required>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Aksesori">Aksesori</option>
                        <option value="Hardware">Hardware</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Initial Stock</label>
                    <input type="number" id="editProdStock" class="form-input" min="0" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Location</label>
                    <input type="text" id="editProdLocation" class="form-input" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Brand / Supplier</label>
                    <input type="text" id="editProdBrand" class="form-input">
                </div>
            </div>
            <div style="display: flex; gap: 0.75rem;">
                <button type="submit" class="btn-action btn-primary" style="flex: 1;"><i class="fa-solid fa-save"></i> Update Product</button>
                <button type="button" class="btn-action" style="background: #E2E8F0; color: #475569; flex: 1;" onclick="closeEditProductModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- User Modal -->
<div id="userModal" class="modal-overlay">
    <div class="modal-card" style="width: 500px; max-width: 90vw;">
        <h3 id="userModalTitle" style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;">Add New User</h3>
        <form id="userForm" onsubmit="handleUserSubmit(event)">
            <input type="hidden" id="userId">
            <div style="display: grid; grid-template-columns: 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Name</label>
                    <input type="text" id="userName" class="form-input" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Email</label>
                    <input type="email" id="userEmail" class="form-input" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Password</label>
                    <input type="password" id="userPassword" class="form-input" placeholder="Leave blank to keep current password">
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Role</label>
                        <select id="userRole" class="form-select" required>
                            <option value="Warehouse Staff">Warehouse Staff</option>
                            <option value="Warehouse Supervisor">Warehouse Supervisor</option>
                            <option value="WMS Head Manager">WMS Head Manager</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Status</label>
                        <select id="userStatus" class="form-select" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Profile Image Link (Optional)</label>
                    <input type="url" id="userProfileImage" class="form-input" placeholder="https://example.com/image.jpg">
                </div>
            </div>
            <div style="display: flex; gap: 0.75rem;">
                <button type="submit" class="btn-action btn-pdf" style="flex: 1;"><i class="fa-solid fa-save"></i> Save User</button>
                <button type="button" class="btn-action" style="background: #E2E8F0; color: #475569; flex: 1;" onclick="closeUserModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Inbound Modal -->
<div id="editInboundModal" class="modal-overlay">
    <div class="modal-card" style="width: 500px; max-width: 90vw;">
        <h3 style="font-size: 1.1rem; font-weight: 800; color: #0F172A; margin-bottom: 1rem;">Edit Inbound Record</h3>
        <form id="editInboundForm" onsubmit="handleEditInboundSubmit(event)">
            <input type="hidden" id="editInboundId">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">SKU</label>
                    <input type="text" id="editInboundSku" class="form-input" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Quantity</label>
                    <input type="number" id="editInboundQty" class="form-input" min="1" required>
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Supplier</label>
                    <input type="text" id="editInboundSupplier" class="form-input">
                </div>
                <div>
                    <label style="display: block; font-size: 0.8rem; font-weight: 700; color: #64748B; margin-bottom: 0.25rem;">Receive Date</label>
                    <input type="date" id="editInboundDate" class="form-input" required>
                </div>
            </div>
            <div style="display: flex; gap: 0.75rem;">
                <button type="submit" class="btn-action btn-pdf" style="flex: 1;"><i class="fa-solid fa-save"></i> Update Inbound</button>
                <button type="button" class="btn-action" style="background: #E2E8F0; color: #475569; flex: 1;" onclick="closeEditInboundModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>