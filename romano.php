<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Números a Romanos</title>
    <style>
         body {
        font-family: Arial, sans-serif;
        background: url('futuro.gif'); 
        background-size: cover; 
        background-repeat: no-repeat; 
        background-position: center center;
        background-attachment: fixed; 
        margin: 0;
        padding: 20px;
        color: white;
        text-align: center;
    }
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
            margin-left: auto; 
            margin-right: auto;
        }
        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #333;
        }
        form {
            margin-top: 30px;
        }
        input, button {
            background-color: #222;
            color: white;
            border: 1px solid white;
            padding: 5px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Convertidor de número natural a número romano</h2>
    <form method="post">
        <label for="inicio">Número de inicio:</label>
        <input type="number" name="inicio" id="inicio" required>
        <br><br>
        <label for="fin">Número final:</label>
        <input type="number" name="fin" id="fin" required>
        <br><br>
        <button type="submit">Generar tabla</button>
    </form>

<?php
function aRomano($num) {
    $roma = [
        'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
        'C' => 100,  'XC' => 90,  'L' => 50,  'XL' => 40,
        'X' => 10,   'IX' => 9,   'V' => 5,   'IV' => 4,
        'I' => 1
    ];
    $res = '';
    foreach ($roma as $let => $val) {
        while ($num >= $val) {
            $res .= $let;
            $num -= $val;
        }
    }
    return $res;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $in = $_POST["inicio"];
    $fin = $_POST["fin"];

    if ($in === '' || $fin === '') {
        echo "<p class='error'>Por favor, completa ambos campos.</p>";
    } elseif (!is_numeric($in) || !is_numeric($fin)) {
        echo "<p class='error'>Los valores deben ser numéricos.</p>";
    } elseif ($in < $fin) {
        echo "<p class='error'>El número inicial debe ser mayor o igual que el final.</p>";
    } elseif ($in < 1 || $fin < 1) {
        echo "<p class='error'>Solo se permiten números enteros positivos.</p>";
    } else {
        echo "<table>";
        echo "<tr><th>Número</th><th>Romano</th></tr>";
        for ($i = $in; $i >= $fin; $i--) {
            echo "<tr><td>$i</td><td>" . aRomano($i) . "</td></tr>";
        }
        echo "</table>";
    }
}
?>
</body>
</html>

