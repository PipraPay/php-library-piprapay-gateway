# PipraPay PHP Library

A simple PHP integration library for [PipraPay](https://piprapay.com).

## Features
- Create payment/charge
- Handle success, cancel, and IPN (webhook)
- Verify payments via API

## Setup
1. Edit `index.php` and configure your API key, base URL, and currency.
2. Upload all files to your server.
3. Use `success.php`, `cancel.php`, and `ipn.php` as callback URLs in your charge request.

## Example

### Create Charge
```php
require 'PipraPay.php';
$pipra = new PipraPay('YOUR_API_KEY', 'https://sandbox.piprapay.com', 'BDT');
$response = $pipra->createCharge([
    'full_name' => 'John Doe',
    'email_mobile' => 'john@example.com',
    'amount' => 50,
    'metadata' => ['invoiceid' => 'INV-123'],
    'redirect_url' => 'success.php',
    'cancel_url' => 'cancel.php',
    'webhook_url' => 'ipn.php'
]);
header("Location: " . $response['pp_url']);
```

### IPN Handler (Webhook)
```php
require 'PipraPay.php';
$pipra = new PipraPay('YOUR_API_KEY', 'https://sandbox.piprapay.com');
$result = $pipra->handleWebhook('YOUR_API_KEY');
if ($result['status']) {
    // Process payment data
}
```

---
MIT License
