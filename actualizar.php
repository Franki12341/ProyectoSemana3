<?php
include("conexion.php");

$id = $_POST['id'];
$cliente = $_POST['cliente'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$total = $cantidad * $precio;

$sql = "UPDATE ventas SET 
cliente='$cliente',
producto='$producto',
cantidad='$cantidad',
precio='$precio',
total='$total'
WHERE id=$id";

if ($conn->query($sql)) {
    echo "<script>
    alert('Venta actualizada');
    window.location='index.php';
    </script>";
} else {
    echo "Error";
}
?>