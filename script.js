document.addEventListener('DOMContentLoaded', function () {
    initForm();
    initAddItem();
    setDefaultDate();
    updatePreview();
});

function setDefaultDate() {
    document.querySelector('[name="invoice_date"]').value = new Date().toISOString().split('T')[0];
}

function initForm() {
    document.querySelectorAll('#invoiceForm input, #invoiceForm textarea, #invoiceForm select').forEach(el => {
        el.addEventListener('input', debounce(updatePreview, 300));
    });
    document.getElementById('refreshBtn')?.addEventListener('click', updatePreview);
}

function initAddItem() {
    document.getElementById('addItemBtn').addEventListener('click', addItem);
    document.getElementById('itemsList').addEventListener('input', e => {
        if (e.target.matches('[name="item_qty[]"], [name="item_price[]"]')) {
            updateItemTotal(e.target.closest('.item-row'));
            updateTotals();
            updatePreview();
        }
    });
}

function addItem() {
    const container = document.getElementById('itemsList');
    const row = document.createElement('div');
    row.className = 'item-row';
    row.innerHTML = `
        <button type="button" class="remove-btn" onclick="this.parentElement.remove();updateTotals();updatePreview();">×</button>
        <div class="form-grid items-grid">
            <div class="form-group desc"><label>Penerangan</label><input type="text" name="item_desc[]"></div>
            <div class="form-group qty"><label>Kty</label><input type="number" name="item_qty[]" value="1" min="1"></div>
            <div class="form-group price"><label>Harga</label><input type="number" name="item_price[]" step="0.01"></div>
            <div class="form-group total"><label>Jumlah</label><input type="text" class="item-total" readonly value="RM 0.00"></div>
        </div>
    `;
    container.appendChild(row);
}

function updateItemTotal(row) {
    const qty = parseFloat(row.querySelector('[name="item_qty[]"]').value) || 0;
    const price = parseFloat(row.querySelector('[name="item_price[]"]').value) || 0;
    row.querySelector('.item-total').value = 'RM ' + (qty * price).toFixed(2);
}

function updateTotals() {
    let subtotal = 0;
    document.querySelectorAll('.item-row').forEach(row => {
        const qty = parseFloat(row.querySelector('[name="item_qty[]"]')?.value) || 0;
        const price = parseFloat(row.querySelector('[name="item_price[]"]')?.value) || 0;
        subtotal += qty * price;
        updateItemTotal(row);
    });

    const applySst = document.getElementById('sstSelect').value === '1';
    const sst = applySst ? subtotal * 0.06 : 0;
    const grand = subtotal + sst;

    document.getElementById('subtotal').textContent = 'RM ' + subtotal.toFixed(2);
    document.getElementById('sstAmount').textContent = 'RM ' + sst.toFixed(2);
    document.getElementById('grandTotal').textContent = 'RM ' + grand.toFixed(2);
    document.querySelector('.sst-row').style.display = applySst ? 'flex' : 'none';
}

function updatePreview() {
    updateTotals();
    const form = document.getElementById('invoiceForm');
    const fd = new FormData(form);
    const data = Object.fromEntries(fd);

    const items = [];
    const descs = fd.getAll('item_desc[]');
    const qtys = fd.getAll('item_qty[]');
    const prices = fd.getAll('item_price[]');

    descs.forEach((desc, i) => {
        if (desc || prices[i]) {
            const qty = parseFloat(qtys[i]) || 0;
            const price = parseFloat(prices[i]) || 0;
            items.push({ desc, qty, price, total: qty * price });
        }
    });

    const subtotal = items.reduce((sum, item) => sum + item.total, 0);
    const applySst = data.apply_sst === '1';
    const sst = applySst ? subtotal * 0.06 : 0;
    const grand = subtotal + sst;

    const preview = document.getElementById('invoicePreview');
    preview.innerHTML = `
        <div class="inv-header">
            <div>
                <div class="inv-company">${data.business_name || 'Nama Perniagaan'}</div>
                <div style="font-size:10px;color:#64748b">${data.business_address || ''}<br>${data.business_phone || ''}</div>
            </div>
            <div class="inv-title">INVOIS</div>
        </div>
        <div class="inv-meta">
            <div><strong>No:</strong> ${data.invoice_no || 'INV-001'}</div>
            <div><strong>Tarikh:</strong> ${data.invoice_date || '-'}</div>
        </div>
        <div class="inv-customer" style="background:#f8fafc;padding:12px;border-radius:8px;margin:16px 0">
            <strong>Kepada:</strong> ${data.customer_name || '-'}<br>${data.customer_address || ''}
        </div>
        <table class="inv-table">
            <thead><tr><th>Penerangan</th><th>Kty</th><th>Harga</th><th>Jumlah</th></tr></thead>
            <tbody>
                ${items.length ? items.map(item => `
                    <tr><td>${item.desc}</td><td>${item.qty}</td><td>RM ${item.price.toFixed(2)}</td><td>RM ${item.total.toFixed(2)}</td></tr>
                `).join('') : '<tr><td colspan="4" style="text-align:center;color:#999">Tiada item</td></tr>'}
            </tbody>
        </table>
        <div class="inv-totals" style="text-align:right;margin-top:16px">
            <div>Subtotal: RM ${subtotal.toFixed(2)}</div>
            ${applySst ? `<div>SST (6%): RM ${sst.toFixed(2)}</div>` : ''}
            <div style="font-weight:bold;font-size:16px">Jumlah: RM ${grand.toFixed(2)}</div>
        </div>
        ${data.bank_name ? `<div style="margin-top:16px;font-size:10px;border-top:1px solid #e2e8f0;padding-top:12px"><strong>Bank:</strong> ${data.bank_name} - ${data.bank_account}</div>` : ''}
    `;

    saveInvoiceData({ ...data, items, subtotal, sst, grand });
}

function saveInvoiceData(invoiceData) {
    const form = document.getElementById('invoiceForm');
    const fd = new FormData(form);
    const data = Object.fromEntries(fd);

    const items = [];
    const descs = fd.getAll('item_desc[]');
    const qtys = fd.getAll('item_qty[]');
    const prices = fd.getAll('item_price[]');
    descs.forEach((desc, i) => {
        items.push({ desc, qty: parseFloat(qtys[i]) || 0, price: parseFloat(prices[i]) || 0 });
    });

    const subtotal = items.reduce((sum, item) => sum + (item.qty * item.price), 0);
    const sst = data.apply_sst === '1' ? subtotal * 0.06 : 0;

    localStorage.setItem('invoiceData', JSON.stringify({ ...data, items, subtotal, sst, grand: subtotal + sst }));
}

function debounce(fn, wait) {
    let t;
    return (...args) => { clearTimeout(t); t = setTimeout(() => fn(...args), wait); };
}
