<?php
session_start();
$refNo = $_GET['refno'] ?? '';
$orderId = $_SESSION['order_id'] ?? '';
$invoiceData = isset($_SESSION['invoice_data']) ? json_decode($_SESSION['invoice_data'], true) : null;
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berjaya - InvoisKu</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .success-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 20px; }
        .success-card { background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-xl); padding: 48px; max-width: 550px; width: 100%; text-align: center; }
        .success-icon { width: 80px; height: 80px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 36px; }
        .success-card h1 { font-size: 28px; margin-bottom: 12px; }
        .success-card .subtitle { color: var(--text-secondary); margin-bottom: 32px; }
        .order-info { background: rgba(0,0,0,0.2); border-radius: var(--radius-md); padding: 16px; margin-bottom: 24px; text-align: left; }
        .order-info div { display: flex; justify-content: space-between; padding: 6px 0; color: var(--text-secondary); font-size: 13px; }
        .credits-box { background: rgba(59, 130, 246, 0.1); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 20px; margin-bottom: 24px; }
        .credits-box .num { font-size: 48px; font-weight: 700; color: var(--primary-light); }
        .credits-box span { display: block; color: var(--text-secondary); font-size: 14px; }
    </style>
</head>
<body>
    <div class="success-page">
        <div class="success-card">
            <div class="success-icon">✓</div>
            <h1>Pembayaran Berjaya! 🎉</h1>
            <p class="subtitle">Terima kasih! Pakej invois anda telah diaktifkan.</p>
            
            <div class="credits-box">
                <div class="num">10</div>
                <span>Kredit Invois Tersedia</span>
            </div>
            
            <div class="order-info">
                <div><span>No. Pesanan</span><span><?php echo htmlspecialchars($orderId); ?></span></div>
                <div><span>No. Rujukan</span><span><?php echo htmlspecialchars($refNo); ?></span></div>
                <div><span>Pakej</span><span>10 Invois Profesional</span></div>
                <div><span>Status</span><span style="color:#10b981">✓ Aktif</span></div>
            </div>
            
            <button id="downloadPdf" class="btn btn-primary btn-large btn-full">📥 Muat Turun Invois Pertama</button>
            <br><br>
            <a href="index.php#generator" class="btn btn-secondary">Jana Invois Baru</a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        const invoiceData = <?php echo $invoiceData ? json_encode($invoiceData) : 'null'; ?>;
        document.getElementById('downloadPdf').addEventListener('click', function() {
            if (!invoiceData) { alert('Data invois tidak ditemui.'); return; }
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            let y = 20;
            
            doc.setFontSize(18);
            doc.setFont('helvetica', 'bold');
            doc.text(invoiceData.business_name || 'Perniagaan', 20, y);
            doc.setFontSize(24);
            doc.text('INVOIS', 200, y, { align: 'right' });
            y += 15;
            
            doc.setFontSize(10);
            doc.setFont('helvetica', 'normal');
            if (invoiceData.business_address) { doc.text(invoiceData.business_address, 20, y); y += 5; }
            if (invoiceData.business_phone) { doc.text(invoiceData.business_phone, 20, y); y += 5; }
            y += 5;
            
            doc.text('No. Invois: ' + (invoiceData.invoice_no || 'INV-001'), 20, y);
            doc.text('Tarikh: ' + (invoiceData.invoice_date || '-'), 200, y, { align: 'right' });
            y += 15;
            
            doc.setFillColor(241, 245, 249);
            doc.rect(20, y, 170, 20, 'F');
            doc.text('Kepada: ' + (invoiceData.customer_name || '-'), 25, y + 13);
            y += 30;
            
            doc.setFont('helvetica', 'bold');
            doc.text('Penerangan', 20, y);
            doc.text('Kty', 100, y);
            doc.text('Harga', 130, y);
            doc.text('Jumlah', 170, y);
            y += 8;
            doc.line(20, y, 190, y);
            y += 5;
            
            doc.setFont('helvetica', 'normal');
            if (invoiceData.items && invoiceData.items.length) {
                invoiceData.items.forEach(item => {
                    doc.text(item.desc || '-', 20, y);
                    doc.text(String(item.qty), 100, y);
                    doc.text('RM ' + parseFloat(item.price).toFixed(2), 130, y);
                    doc.text('RM ' + parseFloat(item.total).toFixed(2), 170, y);
                    y += 8;
                });
            }
            
            y += 10;
            doc.line(130, y, 190, y);
            y += 8;
            doc.text('Subtotal:', 130, y);
            doc.text('RM ' + parseFloat(invoiceData.subtotal || 0).toFixed(2), 190, y, { align: 'right' });
            
            if (invoiceData.sst > 0) {
                y += 8;
                doc.text('SST (6%):', 130, y);
                doc.text('RM ' + parseFloat(invoiceData.sst).toFixed(2), 190, y, { align: 'right' });
            }
            
            y += 10;
            doc.setFont('helvetica', 'bold');
            doc.text('Jumlah:', 130, y);
            doc.text('RM ' + parseFloat(invoiceData.grand || 0).toFixed(2), 190, y, { align: 'right' });
            
            doc.save('Invois_' + (invoiceData.invoice_no || 'INV001') + '.pdf');
        });
    </script>
</body>
</html>
