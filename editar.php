<?php
include("conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM ventas WHERE id=$id";
$resultado = $conn->query($sql);
$row = $resultado->fetch_assoc();
?>

<h2>Editar Venta</h2>

<form action="actualizar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    Cliente:
    <input type="text" name="cliente" value="<?php echo $row['cliente']; ?>"><br><br>

    Producto:
    <input type="text" name="producto" value="<?php echo $row['producto']; ?>"><br><br>

    Cantidad:
    <input type="number" name="cantidad" value="<?php echo $row['cantidad']; ?>"><br><br>

    Precio:
    <input type="number" step="0.01" name="precio" value="<?php echo $row['precio']; ?>"><br><br>

    <button type="submit">Actualizar</button>
</form>