<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Pago de Equipos Electrónicos</title>
    <style>
         body {
        font-family: Arial, sans-serif;
        background: url('mundo.gif'); 
        background-size: cover; 
        background-repeat: no-repeat; 
        background-position: center center;
        background-attachment: fixed; 
        margin: 0;
        padding: 20px;
    }
        .container {
            background-color: rgba(255, 255, 255, 0.4); 
            padding: 30px;
            max-width: 500px;
            margin: 50px auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        h1 {
            text-align: center;
            color: #white;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color:rgb(9, 255, 0);
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color:rgb(225, 0, 255);
        }
        .resultado {
            margin-top: 30px;
            background-color:rgba(254, 254, 254, 0.4);
            padding: 20px;
            border-radius: 8px;
        }
        .resultado p {
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Compra de Equipo Electrónico</h1>

    <form method="post">
        <label for="precio">Precio ($):</label>
        <input type="number" name="precio" id="precio" step="0.01" min="0" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required>

        <button type="submit">Calcular Pago</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar y validar los datos
        $precio = floatval($_POST['precio']);
        $cantidad = intval($_POST['cantidad']);

        if ($precio > 0 && $cantidad > 0) {
            // Calcular subtotal
            $subtotal = $precio * $cantidad;

            // Calcular impuestos
            $cesc = $subtotal * 0.05;
            $iva = $subtotal * 0.13;  

            // Calcular total
            $total = $subtotal + $cesc + $iva;

            // Mostrar resultados
            echo "<div class='resultado'>";
            echo "<h2>Detalle del Pago</h2>";
            echo "<p><strong>Subtotal:</strong> $" . number_format($subtotal, 2) . "</p>";
            echo "<p><strong>CESC (5%):</strong> $" . number_format($cesc, 2) . "</p>";
            echo "<p><strong>IVA (13%):</strong> $" . number_format($iva, 2) . "</p>";
            echo "<p><strong>Total a pagar:</strong> $" . number_format($total, 2) . "</p>";
            echo "</div>";
        } else {
            echo "<p style='color: red; margin-top: 20px;'>Por favor, ingrese un precio y una cantidad válidos.</p>";
        }
    }
    ?>
</div>

</body>
</html>