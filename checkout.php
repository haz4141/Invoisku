<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }
$amount = floatval($_POST['amount'] ?? 12);
$invoiceData = $_POST['invoice_data'] ?? '';
$_SESSION['invoice_data'] = $invoiceData;
$_SESSION['amount'] = $amount;
$_SESSION['order_id'] = 'INV-' . time() . '-' . rand(1000, 9999);
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - InvoisKu</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .checkout-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 20px; }
        .checkout-card { background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-xl); padding: 48px; max-width: 500px; width: 100%; }
        .checkout-header { text-align: center; margin-bottom: 32px; }
        .checkout-header h1 { font-size: 24px; margin-bottom: 8px; }
        .order-summary { background: rgba(0,0,0,0.2); border-radius: var(--radius-md); padding: 20px; margin-bottom: 24px; }
        .order-row { display: flex; justify-content: space-between; padding: 8px 0; color: var(--text-secondary); }
        .order-row.total { border-top: 1px solid var(--border-color); padding-top: 12px; margin-top: 8px; font-weight: 600; color: var(--text-primary); font-size: 18px; }
        .checkout-form .form-group { margin-bottom: 16px; }
        .checkout-form label { display: block; font-size: 13px; margin-bottom: 6px; color: var(--text-secondary); }
        .checkout-form input { width: 100%; padding: 12px 16px; background: rgba(0,0,0,0.2); border: 1px solid var(--border-color); border-radius: var(--radius-md); color: var(--text-primary); font-size: 14px; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: var(--text-secondary); font-size: 14px; text-decoration: none; }
    </style>
</head>
<body>
    <div class="checkout-page">
        <div class="checkout-card">
            <div class="checkout-header">
                <span style="font-size:32px">📑</span>
                <h1>Sahkan Pembayaran</h1>
            </div>
            <div class="order-summary">
                <div class="order-row"><span>Pakej Invois (10 invois)</span><span>1x</span></div>
                <div class="order-row"><span>SST Automatik</span><span>✓</span></div>
                <div class="order-row"><span>Template Profesional</span><span>✓</span></div>
                <div class="order-row total"><span>Jumlah</span><span>RM <?php echo number_format($amount, 2); ?></span></div>
            </div>
            <form action="toyyibpay.php" method="POST" class="checkout-form">
                <input type="hidden" name="order_id" value="<?php echo $_SESSION['order_id']; ?>">
                <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                <div class="form-group"><label>Nama</label><input type="text" name="buyer_name" required></div>
                <div class="form-group"><label>Email</label><input type="email" name="buyer_email" required></div>
                <div class="form-group"><label>No. Telefon</label><input type="tel" name="buyer_phone" required></div>
                <button type="submit" class="btn btn-primary btn-large btn-full">Bayar RM<?php echo $amount; ?></button>
            </form>
            <a href="index.php" class="back-link">← Kembali</a>
        </div>
    </div>
</body>
</html>
