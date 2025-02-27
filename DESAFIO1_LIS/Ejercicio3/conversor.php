<?php
// convert.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $distancia = floatval($_POST['distancia']);
    $vehiculo = $_POST['vehiculo'];
    
    // Consumos por vehículo en Km/Gal en arreglo
    $consumos = [
        'camion_5' => 12,
        'camion_3' => 16,
        'pickup' => 22,
        'panel' => 28,
        'moto' => 42
    ];
    
    // Calcular consumo
    $consumo = $distancia / $consumos[$vehiculo];
    
    // Nombres de los vehículos
    $nombresVehiculos = [
        'camion_5' => 'Camión 5 Ton',
        'camion_3' => 'Camión 3 Ton',
        'pickup' => 'Pickup',
        'panel' => 'Panel',
        'moto' => 'Moto'
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Consumo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-ligth text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-transparent border-light shadow-lg">
                    <div class="card-body text-center">
                        <h2 class="mb-4">Resultado del Consumo</h2>
                        <p class="fw-bold">En <?php echo $nombresVehiculos[$vehiculo]; ?> recorrerá <?php echo number_format($distancia, 2); ?> Km consumiendo <?php echo number_format($consumo, 2); ?> Galones.</p>
                        <a href="index.html" class="btn btn-secondary w-100">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
