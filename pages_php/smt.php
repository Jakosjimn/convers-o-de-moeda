<?php
$money = $_GET['money'] ?? 0;
$currency = $_GET['currency'] ?? '';
$result = "";
$rates = [
    "USD" => 0.18,
    "EUR" => 0.16,
    "JPY" => 28.0,
    "CAD" => 0.27,
    "CHF" => 0.18,
    "GBP" => 0.16,
    "AUD" => 0.30
];

if (isset($rates[$currency])) {
    $converted = $money * $rates[$currency];
    $result = number_format($converted, 2, ",", ".") . " $currency";
}

echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Conversor de Moeda</title>
  <link rel="stylesheet" href="./pages_css/smt.css" />
</head>
<body>
      <h2>O resultado da conversão é:</h2>
      <p>'.$result.'</p>
    </div>';


echo '</body>
</html>';
?>