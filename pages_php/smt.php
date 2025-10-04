<?php 
$money = filter_input(INPUT_GET, "money", FILTER_VALIDATE_FLOAT);
$currency = filter_input(INPUT_GET, "currency", FILTER_SANITIZE_STRING);
$result = "";

if ($money === null || $money === false || empty($currency)) {
    header("Location: ../index.html");
    exit;
}

// Função que calcula a conversão e retorna o resultado formatado
function converterMoeda($money, $currency) {
    switch ($currency) {
        case "USD":
            return number_format($money * 0.1876172607879925, 2, ",", ".");
        case "EUR":
            return number_format($money * 0.1594896331738437, 2, ",", ".");
        case "JPY":
            return number_format($money * 27.777, 2, ",", ".");
        case "CAD":
            return number_format($money * 0.2617801047120419, 2, ",", ".");
        case "CHF":
            return number_format($money * 0.15, 2, ",", ".");
        case "GBP":
            return number_format($money * 0.139, 2, ",", ".");
        case "AUD":
            return number_format($money * 0.284, 2, ",", ".");
        default:
            return "Moeda inválida.";
    }
}

// Chama a função e armazena o resultado
$result = converterMoeda($money, $currency);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESULTADO DA CONVERSÃO</title>
    <link rel="stylesheet" href="./../css/style.css" />
</head>
<body>
    <div id="result">
        <h1>O resultado da conversão é:</h1>
        <p><?= htmlspecialchars($result) ?></p>
    </div>
</body>
</html>