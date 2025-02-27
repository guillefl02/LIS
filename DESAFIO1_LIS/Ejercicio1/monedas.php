<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiConversor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href ="css/style.css" rel ="stylesheet">
    <script>
        function invertirDivisas() {
            let currency1 = document.getElementById('currency1');
            let currency = document.getElementById('currency');
            let temp = currency1.value;
            currency1.value = currency.value;
            currency.value = temp;
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <div class="converter-box">
            <h1 class="text-primary fw-bold">MiConversor</h1>
            <form method="POST">
                <input type="number" name="amount" id="amount" class="form-control text-center mb-3" placeholder="1" required>
                <select name="currency1" id="currency1" class="form-select text-center mb-2" required>
                    <option value="USD">Dólares Americanos</option>
                    <option value="EUR">Euros</option>
                    <option value="GBP">Libras Esterlinas</option>
                    <option value="JPY">Yenes Japoneses</option>
                </select>
                <button type="button" class="swap-btn" onclick="invertirDivisas()">&#x21C5;</button>
                <select name="currency" id="currency" class="form-select text-center mt-2" required>
                    <option value="USD">Dólares Americanos</option>
                    <option value="EUR">Euros</option>
                    <option value="GBP">Libras Esterlinas</option>
                    <option value="JPY">Yenes Japoneses</option>
                </select>
                <button type="submit" class="btn btn-primary w-100 mt-3">Convertir</button>
            </form>
            
            <?php 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['amount'], $_POST['currency1'], $_POST['currency'])) {
                    $amount = (float)$_POST['amount'];
                    $currency1 = $_POST['currency1'];
                    $currency = $_POST['currency'];
                    $conversion_rates = [
                        'USD' => ['EUR' => 0.95, 'GBP' => 0.79, 'JPY' => 149.41],
                        'EUR' => ['USD' => 1.05, 'GBP' => 0.83, 'JPY' => 156.64],
                        'GBP' => ['USD' => 1.26, 'EUR' => 1.21, 'JPY' => 188.98],
                        'JPY' => ['USD' => 0.0067, 'EUR' => 0.0064, 'GBP' => 0.0053]
                    ];
                    if ($currency1 == $currency) {
                        echo "<p class='mt-3'>La moneda de origen y destino son las mismas.</p>";
                    } else {
                        if (isset($conversion_rates[$currency1][$currency])) {
                            $rate = $conversion_rates[$currency1][$currency];
                            $converted = $amount * $rate;
                            echo "<h4 class='mt-3'>$amount $currency1 = " . number_format($converted, 2) . " $currency</h4>";
                        } else {
                            echo "<p class='mt-3'>Tasa de conversión no disponible.</p>";
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
