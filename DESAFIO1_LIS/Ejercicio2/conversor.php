<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = floatval($_POST['cantidad']);
    $unidad = $_POST['unidad'];
    
    // Factores de conversión
    $conversiones = [
        'metro' => 1,
        'pulgada' => 39.3701,
        'yarda' => 1.09361,
        'pie' => 3.28084
    ];
    
    // Convertir la cantidad a metros
    $cantidadEnMetros = $cantidad / $conversiones[$unidad];
    
    // Calcular equivalencias
    $resultados = [];
    foreach ($conversiones as $key => $factor) {
        if ($key !== $unidad) {
            $resultados[$key] = $cantidadEnMetros * $factor;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Conversión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-ligth text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-transparent border-light shadow-lg">
                    <div class="card-body text-center">
                        <h2 class="mb-4">Resultados de Conversión</h2>
                        <p class="fw-bold">Cantidad ingresada: <?php echo number_format($cantidad, 2) . " " . ucfirst($unidad); ?></p>
                        <table class="table table-bordered border-light text-white">
                            <thead>
                                <tr>
                                    <th>Unidad</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($resultados as $unidad => $valor): ?>
                                    <tr>
                                        <td><?php echo ucfirst($unidad); ?></td>
                                        <td><?php echo number_format($valor, 4); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="index.html" class="btn btn-secondary w-100">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
