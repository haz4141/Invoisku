<?php
session_start();
define('TOYYIBPAY_SECRET_KEY', 'your-secret-key-here');
define('TOYYIBPAY_CATEGORY_CODE', 'your-category-code');
define('TOYYIBPAY_API_URL', 'https://toyyibpay.com/index.php/api/createBill');
define('SITE_URL', 'https://yourdomain.com');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: index.php'); exit; }

$orderId = $_POST['order_id'] ?? $_SESSION['order_id'] ?? '';
$amount = floatval($_POST['amount'] ?? 12);
$buyerName = $_POST['buyer_name'] ?? '';
$buyerEmail = $_POST['buyer_email'] ?? '';
$buyerPhone = $_POST['buyer_phone'] ?? '';

if (empty($buyerName) || empty($buyerEmail)) { header('Location: checkout.php?error=missing'); exit; }

$_SESSION['buyer_name'] = $buyerName;
$_SESSION['buyer_email'] = $buyerEmail;
$_SESSION['buyer_phone'] = $buyerPhone;

$billData = [
    'userSecretKey' => TOYYIBPAY_SECRET_KEY,
    'categoryCode' => TOYYIBPAY_CATEGORY_CODE,
    'billName' => 'Pakej Invois - InvoisKu',
    'billDescription' => '10 Invois Profesional PDF',
    'billPriceSetting' => 1,
    'billPayorInfo' => 1,
    'billAmount' => $amount * 100,
    'billReturnUrl' => SITE_URL . '/success.php',
    'billCallbackUrl' => SITE_URL . '/callback.php',
    'billExternalReferenceNo' => $orderId,
    'billTo' => $buyerName,
    'billEmail' => $buyerEmail,
    'billPhone' => $buyerPhone,
    'billSplitPayment' => 0,
    'billPaymentChannel' => 0,
    'billChargeToCustomer' => 1,
    'billExpiryDays' => 1
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, TOYYIBPAY_API_URL);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($billData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
if ($result && isset($result[0]['BillCode'])) {
    $_SESSION['bill_code'] = $result[0]['BillCode'];
    header('Location: https://toyyibpay.com/' . $result[0]['BillCode']);
    exit;
} else {
    echo '<!DOCTYPE html><html><head><title>Ralat</title><link rel="stylesheet" href="style.css"></head><body style="min-height:100vh;display:flex;align-items:center;justify-content:center"><div style="text-align:center;padding:40px"><h1>Ralat Pembayaran</h1><p>Sila cuba lagi.</p><a href="index.php" class="btn btn-primary">Kembali</a></div></body></html>';
}
?>
