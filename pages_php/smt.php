<?php 
$money = filter_input(INPUT_GET, "money", FILTER_VALIDATE_FLOAT);
$currency = filter_input(INPUT_GET, "currency", FILTER_SANITIZE_STRING);
$result = "";

if ($money === null || $money === false || empty($currency)) {
    header("Location: ../index.html");
    exit;
}

switch ($currency) {
    case "USD":
        $result = number_format($money * 0.1876172607879925, 2, ",", ".");
        break;
        
    case "EUR":
        $result = number_format($money * 0.1594896331738437, 2, ",", ".");
        break;
    
    case "JPY":
        $result = number_format($money * 27.777, 2, ",", ".");
        break;
        
    case "CAD":
        $result = number_format($money * 0.2617801047120419, 2, ",", ".");
        break;
        
    case "CHF":
        $result = number_format($money * 0.15, 2, ",", ".");
        break;
        
    case "GBP":
        $result = number_format($money * 0.139, 2, ",", ".");
        break;
        
    case "AUD":
        $result = number_format($money * 0.284, 2, ",", ".");
        break;
        
    default:
        $result = "Moeda inválida.";
        break;
}
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