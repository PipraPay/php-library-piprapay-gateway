<?php
require 'PipraPay.php';
$pipra = new PipraPay('YOUR_API_KEY', 'https://sandbox.piprapay.com', 'BDT');

$response = $pipra->createCharge([
    'full_name' => 'Demo User',
    'email_mobile' => 'demo@example.com',
    'amount' => 100,
    'metadata' => ['invoiceid' => 'INV-0001'],
    'redirect_url' => 'success.php',
    'cancel_url' => 'cancel.php',
    'webhook_url' => 'ipn.php'
]);

if ($response['status']) {
    header("Location: " . $response['pp_url']);
} else {
    echo "Error: " . json_encode($response);
}
