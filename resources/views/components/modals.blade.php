<div id="barcodePrintModal" class="modal-overlay">
    <div class="modal-card">
        <h3 class="modal-title">Print Label Barcode WMS</h3>
        <div class="modal-body-box">
            <div class="modal-prod-name" id="modalProdName">Wireless Scanner Zebra</div>
            <div class="modal-prod-loc" id="modalProdLoc">Rak C-01 • Indonesia</div>
            <svg id="modalBarcodeSvg"></svg>
        </div>
        <div class="flex-gap-3">
            <button class="btn-action btn-print" class="flex-1" id="executeBarcodePrintBtn"><i class="fa-solid fa-print"></i> Cetak Sekarang</button>
            <button class="btn-action btn-cancel flex-1" id="closeBarcodeModalBtn">Batal</button>
        </div>
    </div>
</div>

<div id="toast">
    <i class="fa-solid fa-circle-check" class="toast-icon"></i>
    <span id="toastMessage">Sistem WMS Siap Digunakan</span>
</div>

<!-- Add Product Modal -->
<div id="addProductModal" class="modal-overlay">
    <div class="modal-card modal-card-wide">
        <h3 class="modal-title">Add New Product</h3>
        <form id="addProductForm">
            <div class="grid-2-col">

                <div>
                    <label class="form-label-custom">Product Name</label>
                    <input type="text" id="addProdName" class="form-input" required>
                </div>
                <div>
                    <label class="form-label-custom">Category</label>
                    <select id="addProdCategory" class="form-select" required>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Aksesori">Aksesori</option>
                        <option value="Hardware">Hardware</option>
                    </select>
                </div>
                <div>
                    <label class="form-label-custom">Initial Stock</label>
                    <input type="number" id="addProdStock" class="form-input" min="0" value="0" required>
                </div>
                <div>
                    <label class="form-label-custom">Location</label>
                    <input type="text" id="addProdLocation" class="form-input" required>
                </div>
                <div>
                    <label class="form-label-custom">Brand / Supplier</label>
                    <input type="text" id="addProdBrand" class="form-input">
                </div>
            </div>
            <div class="flex-gap-3">
                <button type="submit" class="btn-action btn-primary" class="flex-1"><i class="fa-solid fa-save"></i> Save Product</button>
                <button type="button" class="btn-action btn-cancel flex-1" id="closeAddProductModalBtn">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Product Modal -->
<div id="editProductModal" class="modal-overlay">
    <div class="modal-card modal-card-wide">
        <h3 class="modal-title">Edit Product</h3>
        <form id="editProductForm">
            <input type="hidden" id="editProdId">
            <div class="grid-2-col">
                <div>
                    <label class="form-label-custom">Product Name</label>
                    <input type="text" id="editProdName" class="form-input" required>
                </div>
                <div>
                    <label class="form-label-custom">Category</label>
                    <select id="editProdCategory" class="form-select" required>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Aksesori">Aksesori</option>
                        <option value="Hardware">Hardware</option>
                    </select>
                </div>
                <div>
                    <label class="form-label-custom">Initial Stock</label>
                    <input type="number" id="editProdStock" class="form-input" min="0" required>
                </div>
                <div>
                    <label class="form-label-custom">Location</label>
                    <input type="text" id="editProdLocation" class="form-input" required>
                </div>
                <div>
                    <label class="form-label-custom">Brand / Supplier</label>
                    <input type="text" id="editProdBrand" class="form-input">
                </div>
            </div>
            <div class="flex-gap-3">
                <button type="submit" class="btn-action btn-primary" class="flex-1"><i class="fa-solid fa-save"></i> Update Product</button>
                <button type="button" class="btn-action btn-cancel flex-1" id="closeEditProductModalBtn">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- User Modal -->
<div id="userModal" class="modal-overlay">
    <div class="modal-card modal-card-wide">
        <h3 id="userModalTitle" class="modal-title">Add New User</h3>
        <form id="userForm">
            <input type="hidden" id="userId">
            <div class="grid-1-col">
                <div>
                    <label class="form-label-custom">Name</label>
                    <input type="text" id="userName" class="form-input" required>
                </div>
                <div>
                    <label class="form-label-custom">Email</label>
                    <input type="email" id="userEmail" class="form-input" required>
                </div>
                <div>
                    <label class="form-label-custom">Password</label>
                    <input type="password" id="userPassword" class="form-input" placeholder="Leave blank to keep current password">
                </div>
                <div class="grid-2-col-no-margin">
                    <div>
                        <label class="form-label-custom">Role</label>
                        <select id="userRole" class="form-select" required>
                            <option value="Warehouse Staff">Warehouse Staff</option>
                            <option value="Warehouse Supervisor">Warehouse Supervisor</option>
                            <option value="WMS Head Manager">WMS Head Manager</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label-custom">Status</label>
                        <select id="userStatus" class="form-select" required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="form-label-custom">Profile Image Link (Optional)</label>
                    <input type="url" id="userProfileImage" class="form-input" placeholder="https://example.com/image.jpg">
                </div>
            </div>
            <div class="flex-gap-3">
                <button type="submit" class="btn-action btn-pdf" class="flex-1"><i class="fa-solid fa-save"></i> Save User</button>
                <button type="button" class="btn-action btn-cancel flex-1" id="closeUserModalBtn">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Inbound Modal -->
<div id="editInboundModal" class="modal-overlay">
    <div class="modal-card modal-card-wide">
        <h3 class="modal-title">Edit Inbound Record</h3>
        <form id="editInboundForm">
            <input type="hidden" id="editInboundId">
            <div class="grid-2-col">
                <div>
                    <label class="form-label-custom">SKU</label>
                    <input type="text" id="editInboundSku" class="form-input" required>
                </div>
                <div>
                    <label class="form-label-custom">Quantity</label>
                    <input type="number" id="editInboundQty" class="form-input" min="1" required>
                </div>
                <div>
                    <label class="form-label-custom">Supplier</label>
                    <input type="text" id="editInboundSupplier" class="form-input">
                </div>
                <div>
                    <label class="form-label-custom">Receive Date</label>
                    <input type="date" id="editInboundDate" class="form-input" required>
                </div>
            </div>
            <div class="flex-gap-3">
                <button type="submit" class="btn-action btn-pdf" class="flex-1"><i class="fa-solid fa-save"></i> Update Inbound</button>
                <button type="button" class="btn-action btn-cancel flex-1" id="closeEditInboundModalBtn">Cancel</button>
            </div>
        </form>
    </div>
</div>