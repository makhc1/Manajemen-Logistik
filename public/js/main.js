    let cachedProducts = [];

    async function fetchProducts() {
        try {
            const res = await fetch('/api/products');
            cachedProducts = await res.json();
            renderAll();
        } catch (e) {
            console.error('Failed to fetch products', e);
        }
    }

    function getProducts() {
        return cachedProducts;
    }

    // Initialize Chart & Barcodes
    let flowChartInstance = null;

    document.addEventListener('DOMContentLoaded', () => {
        initChart();
        fetchProducts();
        updateLiveBarcode('BRG-00123');
        renderSuratJalanBarcode();
        syncPickingListToSuratJalan();
    });

    function initChart() {
        const ctx = document.getElementById('weeklyFlowChart');
        if (!ctx) return;
        flowChartInstance = new Chart(ctx.getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [
                    {
                        label: 'Barang Masuk',
                        data: [42, 30, 42, 45, 38, 35, 40],
                        backgroundColor: '#E85A1C',
                        borderRadius: 6,
                    },
                    {
                        label: 'Barang Keluar',
                        data: [25, 25, 28, 25, 30, 45, 25],
                        backgroundColor: '#1E3A8A',
                        borderRadius: 6,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { font: { family: 'Plus Jakarta Sans', weight: '600' } }
                    }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#F1F5F9' } },
                    x: { grid: { display: false } }
                }
            }
        });
    }

    function renderAll() {
        const products = getProducts();

        // 1. Calculate Metrics
        const totalStock = products.reduce((sum, item) => sum + parseInt(item.stock), 0);
        const lowStockItems = products.filter(item => parseInt(item.stock) <= 50);

        const statTotalStock = document.getElementById('statTotalStock');
        if (statTotalStock) statTotalStock.innerText = totalStock.toLocaleString();
        
        const statLowStockCount = document.getElementById('statLowStockCount');
        if (statLowStockCount) statLowStockCount.innerHTML = `${lowStockItems.length} <span style="font-size: 0.85rem; font-weight: 600;">Items</span>`;

        // 2. Render Low Stock Table
        const lowStockBody = document.getElementById('lowStockTableBody');
        if (lowStockBody) {
            lowStockBody.innerHTML = lowStockItems.map(item => `
                <tr>
                    <td style="font-weight: 700;">${item.name}</td>
                    <td style="color: #64748B;">${item.sku}</td>
                    <td><span style="background: #F1F5F9; padding: 2px 8px; border-radius: 6px; font-weight: 600; font-size: 0.75rem;">${item.category}</span></td>
                    <td><span style="color: #C2410C; font-weight: 800;">${item.stock}</span></td>
                    <td>${item.location}</td>
                    <td><button class="btn-reorder" onclick="triggerReorder('${item.sku}')">Reorder</button></td>
                </tr>
            `).join('');
        }

        // 3. Render Master Table
        const masterBody = document.getElementById('masterTableBody');
        if (masterBody) {
            masterBody.innerHTML = products.map((item, idx) => `
                <tr onclick="selectProductDetail('${item.sku}')" style="cursor: pointer;">
                    <td><input type="checkbox" ${idx === 0 ? 'checked' : ''}></td>
                    <td style="font-weight: 700; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fa-solid fa-box" style="color: var(--primary-orange);"></i>
                        ${item.name}
                    </td>
                    <td style="color: #64748B; font-weight: 600;">${item.sku}</td>
                    <td><span style="background: #F1F5F9; padding: 2px 8px; border-radius: 6px; font-weight: 600; font-size: 0.75rem;">${item.category}</span></td>
                    <td style="font-weight: 800;">${item.stock}</td>
                    <td><span style="color: var(--primary-orange); font-weight: 700;">${item.location}</span></td>
                    <td><button class="btn-reorder" onclick="event.stopPropagation(); triggerReorder('${item.sku}')">Reorder</button></td>
                </tr>
            `).join('');
        }

        // 4. Select default preview
        if (products.length > 0) {
            selectProductDetail(products[0].sku);
        }
    }

    function selectProductDetail(sku) {
        const products = getProducts();
        const p = products.find(item => item.sku === sku);
        if (!p) return;

        const detailName = document.getElementById('detailName');
        if (detailName) {
            detailName.innerText = p.name;
            document.getElementById('detailSku').innerText = `SKU: ${p.sku}`;
            document.getElementById('detailBrand').innerText = p.brand || 'Sanco Hsciera';
            document.getElementById('detailBrandTitle').innerText = p.brand || 'Sanco Hsciera';
            document.getElementById('detailDimension').innerText = p.dimension || '1000ml';
            document.getElementById('detailSpec').innerText = p.spec || '100 of 02 mm';
            document.getElementById('detailOrigin').innerText = p.origin || 'Indonesia';
            document.getElementById('detailLocation').innerText = p.location;

            try {
                JsBarcode("#detailBarcodeSvg", p.sku, { format: "CODE128", width: 1.5, height: 40, displayValue: true });
            } catch (e) {}
        }
    }

    function updateLiveBarcode(val) {
        if (!val) val = 'BRG-00123';
        try {
            JsBarcode("#liveBarcodeSvg", val, { format: "CODE128", width: 2, height: 50, displayValue: true });
        } catch (e) {}
    }

    function renderSuratJalanBarcode() {
        try {
            JsBarcode("#suratJalanBarcode", "SJ-30241028-001", { format: "CODE128", width: 1.4, height: 36, displayValue: true, fontSize: 10 });
        } catch (e) {}
    }

    // Switch View Tabs
    function switchTab(viewName, element) {
        document.querySelectorAll('.page-view').forEach(v => v.classList.remove('active'));
        document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));

        const targetView = document.getElementById(`${viewName}-view`);
        if (targetView) targetView.classList.add('active');

        if (element) {
            element.classList.add('active');
        } else {
            const matchNav = document.querySelector(`.nav-item[data-view="${viewName}"]`);
            if (matchNav) matchNav.classList.add('active');
        }
    }

    // Trigger Reorder -> Navigates to Inbound and populates SKU
    function triggerReorder(sku) {
        const products = getProducts();
        const p = products.find(item => item.sku === sku);
        
        switchTab('inbound', null);
        if (p) {
            document.getElementById('inboundSku').value = p.sku;
            document.getElementById('inboundName').value = p.name;
            document.getElementById('inboundCategory').value = p.category;
            document.getElementById('inboundLocation').value = p.location;
            document.getElementById('inboundOrigin').value = p.origin || 'Indonesia';
            updateLiveBarcode(p.sku);
        }
        showToast(`Membuat pesanan ulang Inbound untuk SKU: ${sku}`);
    }

    // Inbound Form Submission & Barcode Modal
    async function handleInboundSubmit(e) {
        e.preventDefault();
        const sku = document.getElementById('inboundSku').value;
        const name = document.getElementById('inboundName').value;
        const category = document.getElementById('inboundCategory').value;
        const qty = parseInt(document.getElementById('inboundQty').value);
        const location = document.getElementById('inboundLocation').value;
        const origin = document.getElementById('inboundOrigin').value;
        const supplier = document.getElementById('inboundSupplier').value;
        const receive_date = document.getElementById('inboundDate').value;

        try {
            const res = await fetch('/api/inbound', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ sku, name, category, qty, location, origin, supplier, receive_date })
            });
            const data = await res.json();
            if (data.success) {
                fetchProducts();
                document.getElementById('modalProdName').innerText = name;
                document.getElementById('modalProdLoc').innerText = `${location} • ${origin}`;
                try { JsBarcode('#modalBarcodeSvg', sku, { format: 'CODE128', width: 2, height: 60, displayValue: true }); } catch(err) {}
                document.getElementById('barcodePrintModal').classList.add('active');
            }
        } catch (e) {
            showToast('Gagal menyimpan data ke server!');
        }
    }

    function closeBarcodeModal() {
        document.getElementById('barcodePrintModal').classList.remove('active');
        switchTab('master', null);
    }

    function executeBarcodePrint() {
        closeBarcodeModal();
        showToast('Label Barcode dikirim ke printer!');
        window.print();
    }

    // Simulate Camera Scan with Synth Audio Beep
    function simulateBarcodeScan() {
        showToast('Pemindai Kamera aktif...');
        
        // Play audio synth beep
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            osc.type = 'sine';
            osc.frequency.value = 1200;
            osc.connect(ctx.destination);
            osc.start();
            osc.stop(ctx.currentTime + 0.15);
        } catch(e) {}

        setTimeout(() => {
            const sampleSkus = ['BRG-00123', 'BRG-00124', 'BRG-00125'];
            const randomSku = sampleSkus[Math.floor(Math.random() * sampleSkus.length)];
            document.getElementById('inboundSku').value = randomSku;
            updateLiveBarcode(randomSku);
            showToast(`PEMINDAIAN BERHASIL! Barcode Terbaca: ${randomSku}`);
        }, 600);
    }

    // Outbound & Picking List Sync
    function syncPickingListToSuratJalan() {
        const checkboxes = document.querySelectorAll('.pick-item');
        const tableBody = document.getElementById('suratJalanTableBody');
        let selectedCount = 0;
        let html = '';

        checkboxes.forEach(cb => {
            if (cb.checked) {
                selectedCount++;
                const name = cb.dataset.name;
                const qty = cb.dataset.qty;
                const date = cb.dataset.date;
                html += `
                    <tr>
                        <td style="font-weight: 700;">${name}</td>
                        <td style="text-align: center; font-weight: 800;">x${qty}</td>
                        <td style="text-align: right;">${date}</td>
                    </tr>
                `;
            }
        });

        if (html === '') {
            html = `<tr><td colspan="3" style="text-align: center; color: #94A3B8;">Belum ada item dipilih</td></tr>`;
        }
        
        if (tableBody) tableBody.innerHTML = html;
        const countSpan = document.getElementById('pickingSelectedCount');
        if (countSpan) countSpan.innerText = `${selectedCount} Selected Items`;
    }

    function updateSuratJalanInfo() {
        const cust = document.getElementById('shipmentCustomer').value;
        const date = document.getElementById('shipmentDate').value;
        const dest = document.getElementById('shipmentDestination').value;

        document.getElementById('sjReceiverDisplay').innerText = cust;
        document.getElementById('sjAddressDisplay').innerText = dest;
        document.getElementById('sjDateDisplay').innerText = date;
    }

    async function processOutboundStockUpdate() {
        const checkboxes = document.querySelectorAll('.pick-item:checked');
        const items = [];
        checkboxes.forEach(cb => {
            items.push({
                name: cb.dataset.name,
                qty: parseInt(cb.dataset.qty)
            });
        });

        const cust = document.getElementById('shipmentCustomer').value;
        const date = document.getElementById('shipmentDate').value;
        const dest = document.getElementById('shipmentDestination').value;
        const shipment_number = 'SJ-' + Math.floor(Math.random() * 1000000);

        try {
            const res = await fetch('/api/outbound', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ shipment_number: shipment_number, customer: cust, shipment_date: date, destination: dest, items: items })
            });
            const data = await res.json();
            if (data.success) {
                fetchProducts();
                document.getElementById('sjNoDisplay').innerText = shipment_number;
                document.getElementById('sjNumberDisplay').innerText = shipment_number;
                showToast('Stok berkurang otomatis! Surat Jalan Terupdate!');
            }
        } catch (e) {
            showToast('Gagal memproses outbound!');
        }
    }

    function downloadSuratJalanPDF() {
        showToast('Mengunduh Surat Jalan PDF...');
        setTimeout(() => window.print(), 500);
    }

    function shareSuratJalan() {
        showToast('Link Surat Jalan SJ-30241028-001 berhasil disalin ke Clipboard!');
    }

    function changeWarehouse(val) {
        showToast(`Pindah Lokasi Gudang: ${val}`);
    }

    function filterCategory(cat) {
        const rows = document.querySelectorAll('#masterTableBody tr');
        rows.forEach(r => {
            if (cat === 'all') {
                r.style.display = '';
            } else {
                r.style.display = r.innerText.includes(cat) ? '' : 'none';
            }
        });
    }

    function filterMasterTable(query) {
        const rows = document.querySelectorAll('#masterTableBody tr');
        rows.forEach(r => {
            const text = r.innerText.toLowerCase();
            r.style.display = text.includes(query.toLowerCase()) ? '' : 'none';
        });
    }

    function handleGlobalSearch(query) {
        if (!query) return;
        switchTab('master', null);
        filterMasterTable(query);
    }

    function showToast(message) {
        const toast = document.getElementById('toast');
        if (!toast) return;
        document.getElementById('toastMessage').innerText = message;
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3200);
    }

    // Add Product UI
    function openAddProductModal() {
        document.getElementById('addProductModal').classList.add('active');
        document.getElementById('addProductForm').reset();
    }
    
    function closeAddProductModal() {
        document.getElementById('addProductModal').classList.remove('active');
    }
    
    async function handleAddProductSubmit(e) {
        e.preventDefault();
        const sku = document.getElementById('addProdSku').value;
        const name = document.getElementById('addProdName').value;
        const category = document.getElementById('addProdCategory').value;
        const stock = parseInt(document.getElementById('addProdStock').value);
        const location = document.getElementById('addProdLocation').value;
        const brand = document.getElementById('addProdBrand').value;

        try {
            const res = await fetch('/api/products', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ sku, name, category, stock, location, brand })
            });
            const data = await res.json();
            if (data.success) {
                fetchProducts();
                closeAddProductModal();
                showToast('Produk baru berhasil ditambahkan!');
            }
        } catch (e) {
            showToast('Gagal menambahkan produk!');
        }
    }