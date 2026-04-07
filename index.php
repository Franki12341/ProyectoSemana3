<?php
$cliente = $_POST['cliente'] ?? "";
$producto = $_POST['producto'] ?? "";
$cantidad = $_POST['cantidad'] ?? "";
$precio = $_POST['precio'] ?? "";
$total = "";

if (isset($_POST['calcular'])) {
    if ($cantidad > 0 && $precio > 0) {
        $total = $cantidad * $precio;
    }
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
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #ccc;
        }

        .tabla {
            width: 90%;
            margin: 20px auto;
        }

        h2, h3 {
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

        table {
            background: white;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="contenedor">
    <h2>Registro de Venta</h2>

    <form method="POST">
        Cliente:
        <input type="text" name="cliente" value="<?php echo $cliente; ?>" required>

        Producto:
        <input type="text" name="producto" value="<?php echo $producto; ?>" required>

        Cantidad:
        <input type="number" name="cantidad" value="<?php echo $cantidad; ?>" min="1" required>

        Precio:
        <input type="number" step="0.01" name="precio" value="<?php echo $precio; ?>" min="0.01" required>   

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

<?php
include("conexion.php");

$resultado = $conn->query("SELECT * FROM ventas");
?>

<div class="tabla">
    <h3>Lista de Ventas</h3>

    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>

        <?php if($resultado && $resultado->num_rows > 0): ?>
            <?php while($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['cliente']; ?></td>
                <td><?php echo $row['producto']; ?></td>
                <td><?php echo $row['cantidad']; ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No hay registros</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>