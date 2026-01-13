<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="InvoisKu - Jana invois dan resit profesional untuk perniagaan kecil Malaysia. Mudah, pantas, dan mampu milik.">
    <title>InvoisKu - Invois Profesional Untuk Perniagaan Anda</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container nav-container">
            <a href="index.php" class="logo">📑 InvoisKu</a>
            <div class="nav-links">
                <a href="#features">Ciri-ciri</a>
                <a href="#pricing">Harga</a>
                <a href="#generator" class="btn btn-primary">Jana Invois</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-bg"></div>
        <div class="container hero-content">
            <span class="badge">💼 Dipercayai 5000+ Usahawan</span>
            <h1>Invois <span class="gradient-text">Profesional</span><br>Untuk Perniagaan Anda</h1>
            <p class="subtitle">Jana invois dan resit profesional dalam sekejap. Termasuk pengiraan SST automatik. Sesuai untuk freelancer, peniaga online, dan PKS.</p>
            <div class="hero-cta">
                <a href="#generator" class="btn btn-primary btn-large">
                    Jana Invois Sekarang
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="hero-stats">
                <div class="stat"><span class="num">RM12</span><span>10 Invois</span></div>
                <div class="stat"><span class="num">1min</span><span>Siap</span></div>
                <div class="stat"><span class="num">Tiada</span><span>Langganan</span></div>
            </div>
        </div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">CIRI-CIRI</span>
                <h2>Semua Yang Perniagaan Anda Perlukan</h2>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <span class="feature-icon">⚡</span>
                    <h3>Jana Dalam 1 Minit</h3>
                    <p>Isi maklumat, pilih template, terus muat turun PDF profesional.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">🧮</span>
                    <h3>SST Automatik</h3>
                    <p>Pengiraan SST 6% secara automatik. Patuh dengan peraturan Malaysia.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">🏢</span>
                    <h3>Logo Syarikat</h3>
                    <p>Masukkan logo syarikat anda untuk invois yang lebih profesional.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">📊</span>
                    <h3>Nombor Auto</h3>
                    <p>Penomboran invois automatik untuk rekod yang teratur.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">💳</span>
                    <h3>Butiran Bank</h3>
                    <p>Sertakan maklumat akaun bank untuk memudahkan pembayaran.</p>
                </div>
                <div class="feature-card">
                    <span class="feature-icon">📱</span>
                    <h3>Mesra Mobile</h3>
                    <p>Jana invois dari telefon atau komputer. Bila-bila, di mana sahaja.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="generator" class="generator">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">JANA INVOIS</span>
                <h2>Buat Invois Anda</h2>
            </div>
            <div class="generator-container">
                <div class="generator-form">
                    <form id="invoiceForm">
                        <div class="form-section">
                            <h3><span class="num">1</span> Maklumat Perniagaan</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Nama Perniagaan</label>
                                    <input type="text" name="business_name" required placeholder="Syarikat ABC Sdn Bhd">
                                </div>
                                <div class="form-group">
                                    <label>No. SSM / SST (pilihan)</label>
                                    <input type="text" name="ssm_no" placeholder="202001234567">
                                </div>
                                <div class="form-group full">
                                    <label>Alamat Perniagaan</label>
                                    <textarea name="business_address" rows="2" placeholder="Alamat penuh perniagaan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>No. Telefon</label>
                                    <input type="tel" name="business_phone" placeholder="012-345 6789">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="business_email" placeholder="bisnes@email.com">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3><span class="num">2</span> Maklumat Pelanggan</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Nama Pelanggan / Syarikat</label>
                                    <input type="text" name="customer_name" required placeholder="Nama pelanggan">
                                </div>
                                <div class="form-group">
                                    <label>Email Pelanggan</label>
                                    <input type="email" name="customer_email" placeholder="pelanggan@email.com">
                                </div>
                                <div class="form-group full">
                                    <label>Alamat Pelanggan</label>
                                    <textarea name="customer_address" rows="2" placeholder="Alamat pelanggan"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3><span class="num">3</span> Butiran Invois</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>No. Invois</label>
                                    <input type="text" name="invoice_no" value="INV-001" required>
                                </div>
                                <div class="form-group">
                                    <label>Tarikh Invois</label>
                                    <input type="date" name="invoice_date" required>
                                </div>
                                <div class="form-group">
                                    <label>Tarikh Tamat Tempoh</label>
                                    <input type="date" name="due_date">
                                </div>
                                <div class="form-group">
                                    <label>Kenakan SST (6%)</label>
                                    <select name="apply_sst">
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3><span class="num">4</span> Item / Perkhidmatan</h3>
                            <div id="itemsList">
                                <div class="item-row">
                                    <div class="form-grid items-grid">
                                        <div class="form-group desc">
                                            <label>Penerangan</label>
                                            <input type="text" name="item_desc[]" placeholder="Perkhidmatan / Produk">
                                        </div>
                                        <div class="form-group qty">
                                            <label>Kuantiti</label>
                                            <input type="number" name="item_qty[]" value="1" min="1">
                                        </div>
                                        <div class="form-group price">
                                            <label>Harga (RM)</label>
                                            <input type="number" name="item_price[]" step="0.01" placeholder="0.00">
                                        </div>
                                        <div class="form-group total">
                                            <label>Jumlah</label>
                                            <input type="text" class="item-total" readonly value="RM 0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-add" id="addItemBtn">+ Tambah Item</button>
                            
                            <div class="totals-box">
                                <div class="total-row"><span>Subtotal</span><span id="subtotal">RM 0.00</span></div>
                                <div class="total-row sst-row" style="display:none"><span>SST (6%)</span><span id="sstAmount">RM 0.00</span></div>
                                <div class="total-row grand"><span>Jumlah Besar</span><span id="grandTotal">RM 0.00</span></div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3><span class="num">5</span> Maklumat Pembayaran</h3>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input type="text" name="bank_name" placeholder="Maybank / CIMB / etc">
                                </div>
                                <div class="form-group">
                                    <label>No. Akaun</label>
                                    <input type="text" name="bank_account" placeholder="1234567890">
                                </div>
                                <div class="form-group full">
                                    <label>Nota Tambahan</label>
                                    <textarea name="notes" rows="2" placeholder="Terima kasih atas urusniaga anda!"></textarea>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="invoice_data" id="invoiceDataField">
                    </form>
                </div>

                <div class="generator-preview">
                    <div class="preview-header">
                        <h4>Pratonton Invois</h4>
                        <button type="button" id="refreshBtn" class="btn btn-small">🔄</button>
                    </div>
                    <div class="preview-container">
                        <div id="invoicePreview" class="invoice-preview">
                            <div class="inv-header">
                                <div class="inv-company">Nama Perniagaan</div>
                                <div class="inv-title">INVOIS</div>
                            </div>
                            <div class="inv-body">
                                <div class="inv-meta">
                                    <div>No: INV-001</div>
                                    <div>Tarikh: -</div>
                                </div>
                                <div class="inv-customer">Kepada: Pelanggan</div>
                                <table class="inv-table">
                                    <thead><tr><th>Penerangan</th><th>Kty</th><th>Harga</th><th>Jumlah</th></tr></thead>
                                    <tbody><tr><td colspan="4" style="text-align:center;color:#999">Tiada item</td></tr></tbody>
                                </table>
                                <div class="inv-totals">
                                    <div>Jumlah: RM 0.00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">HARGA</span>
                <h2>Harga Berpatutan</h2>
            </div>
            <div class="pricing-card">
                <div class="price-tag">
                    <span class="currency">RM</span>
                    <span class="amount">12</span>
                    <span class="period">/ 10 invois</span>
                </div>
                <h3>Pakej Invois Profesional</h3>
                <ul class="features-list">
                    <li>✓ 10 invois PDF berkualiti</li>
                    <li>✓ Pengiraan SST automatik</li>
                    <li>✓ Template profesional</li>
                    <li>✓ Boleh masukkan logo</li>
                    <li>✓ Tiada langganan bulanan</li>
                </ul>
                <form action="checkout.php" method="POST" id="checkoutForm">
                    <input type="hidden" name="amount" value="12">
                    <input type="hidden" name="invoice_data" id="checkoutInvoiceData">
                    <button type="submit" class="btn btn-primary btn-large btn-full">
                        Beli Sekarang
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </form>
                <p class="note">💳 Pembayaran selamat via ToyyibPay</p>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <span class="logo">📑 InvoisKu</span>
                    <p>Membantu usahawan Malaysia menjadi lebih profesional.</p>
                </div>
                <div class="footer-links">
                    <h4>Pautan</h4>
                    <a href="#features">Ciri-ciri</a>
                    <a href="#pricing">Harga</a>
                    <a href="#generator">Jana Invois</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 InvoisKu. Hak cipta terpelihara.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
