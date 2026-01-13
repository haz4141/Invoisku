<?php
$logFile = __DIR__ . '/payment_logs.txt';
file_put_contents($logFile, date('Y-m-d H:i:s') . ' | ' . json_encode($_POST) . "\n", FILE_APPEND);
$refNo = $_POST['refno'] ?? '';
$status = $_POST['status'] ?? '';
$billCode = $_POST['billcode'] ?? '';
$orderId = $_POST['order_id'] ?? $_POST['billExternalReferenceNo'] ?? '';
if (empty($refNo) || empty($status)) { http_response_code(400); echo 'Invalid'; exit; }
$paymentRecord = ['order_id' => $orderId, 'bill_code' => $billCode, 'ref_no' => $refNo, 'status' => ($status == '1') ? 'success' : 'failed', 'timestamp' => date('Y-m-d H:i:s')];
$recordsFile = __DIR__ . '/payments.json';
$records = file_exists($recordsFile) ? json_decode(file_get_contents($recordsFile), true) : [];
$records[$orderId] = $paymentRecord;
file_put_contents($recordsFile, json_encode($records, JSON_PRETTY_PRINT));
http_response_code(200);
echo 'OK';
?>
