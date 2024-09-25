<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51Oo0u3BqhRSajm5CK7IrpRjmDAdw3adXZZbit6fzZITFgn0kd6UJhj9TahqTglziU6jkrL6zX2yVKm6PFLOxJ8PD007ErBfk8V";

try {
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    $lineItems = [];
    foreach ($_SESSION['cart'] as $key => $value) {
        $lineItems[] = [
            "quantity" => $value['Quantity'], // You can adjust quantity as needed
            "price_data" => [
                "currency" => "NPR",
                "unit_amount" => $value['price'] * 100, // Convert price to cents
                "product_data" => [
                    "name" => $value['name']
                ]
            ]
        ];
    }

    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost/petshop/success.php",
        "cancel_url" => "http://localhost/petshop/index.php",
        "locale" => "auto",
        "line_items" => $lineItems
    ]);

    http_response_code(303);
    header("Location: " . $checkout_session->url);
} catch (\Stripe\Exception\ApiConnectionException $e) {
    // Network communication with Stripe failed
    echo "Network communication with Stripe failed: " . $e->getMessage();
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Display error message
    echo "An error occurred: " . $e->getMessage();
} catch (Exception $e) {
    // Other generic exception handling
    echo "An error occurred: " . $e->getMessage();
}
