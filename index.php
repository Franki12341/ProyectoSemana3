<?php
$cliente = $_POST['cliente'] ?? "";
$producto = $_POST['producto'] ?? "";
$cantidad = $_POST['cantidad'] ?? "";
$precio = $_POST['precio'] ?? "";
$total = "";

if (isset($_POST['calcular'])) {
    $total = $cantidad * $precio;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ventas</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f2f2f2;
        }

        .contenedor {
            width: 350px;
            margin: 80px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #ccc;
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 7px;
            margin: 5px 0 15px 0;
        }

        button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="contenedor">
    <h2>Registro de Venta</h2>

    <form method="POST">
        Cliente:
        <input type="text" name="cliente" value="<?php echo $cliente; ?>">

        Producto:
        <input type="text" name="producto" value="<?php echo $producto; ?>">

        Cantidad:
        <input type="number" name="cantidad" value="<?php echo $cantidad; ?>" min="1">

        Precio:
        <input type="number" step="0.01" name="precio" value="<?php echo $precio; ?>" min="0.01">

        Total:
        <input type="text" value="<?php echo $total; ?>" readonly>

        <button type="submit" name="calcular">Calcular Total</button>
    </form>

    <form action="guardar.php" method="POST">
        <input type="hidden" name="cliente" value="<?php echo $cliente; ?>">
        <input type="hidden" name="producto" value="<?php echo $producto; ?>">
        <input type="hidden" name="cantidad" value="<?php echo $cantidad; ?>">
        <input type="hidden" name="precio" value="<?php echo $precio; ?>">
        <input type="hidden" name="total" value="<?php echo $total; ?>">

        <button type="submit">Guardar Venta</button>
    </form>
</div>

</body>
</html>