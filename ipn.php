<?php
require 'PipraPay.php';
$pipra = new PipraPay('YOUR_API_KEY', 'https://sandbox.piprapay.com');
$webhook = $pipra->handleWebhook('YOUR_API_KEY');

if ($webhook['status']) {
    file_put_contents('ipn_log.txt', json_encode($webhook['data']) . PHP_EOL, FILE_APPEND);
    http_response_code(200);
    echo json_encode(['status' => true]);
} else {
    http_response_code(401);
    echo json_encode(['status' => false, 'message' => 'Unauthorized']);
}
