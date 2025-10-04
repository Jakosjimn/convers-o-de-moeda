<?php 
$valor = filter_input(INPUT_GET, "money", FILTER_VALIDATE_FLOAT);
$opcao = filter_input(INPUT_GET, "currency", FILTER_SANITIZE_STRING);
$result = "";

// ---------------------- FUNÇÕES ----------------------

function validarNotNull($val1, $val2) {
    if ($val1 === null || $val1 === false || empty($val2)) {
        header("Location: ../index.html");
        exit;
    }
}

function converterMoeda($val, $opcao) {
    switch (strtoupper($opcao)) {
        case "USD":
            $resultado = number_format($val * 0.1876172607879925, 2, ",", ".");
            break;
        case "EUR":
            $resultado = number_format($val * 0.1594896331738437, 2, ",", ".");
            break;
        case "JPY":
            $resultado = number_format($val * 27.777, 2, ",", ".");
            break;
        case "CAD":
            $resultado = number_format($val * 0.2617801047120419, 2, ",", ".");
            break;
        case "CHF":
            $resultado = number_format($val * 0.15, 2, ",", ".");
            break;
        case "GBP":
            $resultado = number_format($val * 0.139, 2, ",", ".");
            break;
        case "AUD":
            $resultado = number_format($val * 0.284, 2, ",", ".");
            break;
        default:
            $resultado = "Moeda inválida.";
            break;
    }
    return $resultado;
}

function moeda($opcao) {
    switch (strtoupper($opcao)) {
        case "USD": $resultado = "Dólar Americano"; break;
        case "EUR": $resultado = "Euro"; break;
        case "JPY": $resultado = "Iene Japonês"; break;
        case "CAD": $resultado = "Dólar Canadense"; break;
        case "CHF": $resultado = "Franco Suíço"; break;
        case "GBP": $resultado = "Libra Esterlina"; break;
        case "AUD": $resultado = "Dólar Australiano"; break;
        default: $resultado = "Moeda desconhecida"; break;
    }
    return $resultado;
}

function exibirMsg($msg, $result, $moeda) {
    return "{$msg} {$result} {$moeda}";
}

// ---------------------- EXECUÇÃO ----------------------

validarNotNull($valor, $opcao);
$result = converterMoeda($valor, $opcao);
$moedaTipo = moeda($opcao);
$msg = exibirMsg("O resultado da conversão é:", $result, $moedaTipo);
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
        <h1><?= htmlspecialchars($msg) ?></h1>
    </div>
</body>
</html>
