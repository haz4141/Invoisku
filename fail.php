<?php session_start(); $reason = $_GET['reason'] ?? 'Pembayaran tidak berjaya'; ?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gagal - InvoisKu</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .fail-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 20px; }
        .fail-card { background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-xl); padding: 48px; max-width: 500px; width: 100%; text-align: center; }
        .fail-icon { width: 80px; height: 80px; background: linear-gradient(135deg, #ef4444, #dc2626); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 36px; color: white; }
        .fail-card h1 { font-size: 24px; margin-bottom: 12px; }
        .fail-card p { color: var(--text-secondary); margin-bottom: 24px; }
        .error-box { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); border-radius: var(--radius-md); padding: 16px; margin-bottom: 24px; color: #ef4444; font-size: 14px; }
    </style>
</head>
<body>
    <div class="fail-page">
        <div class="fail-card">
            <div class="fail-icon">✕</div>
            <h1>Pembayaran Gagal</h1>
            <p>Tiada caj dikenakan. Sila cuba lagi.</p>
            <div class="error-box"><?php echo htmlspecialchars($reason); ?></div>
            <a href="index.php#generator" class="btn btn-primary btn-large">Cuba Lagi</a>
        </div>
    </div>
</body>
</html>
