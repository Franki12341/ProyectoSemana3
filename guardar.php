<?php
include("conexion.php");

$cliente = trim($_POST['cliente']);
$producto = trim($_POST['producto']);
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$total = $_POST['total'];

// VALIDACIONES
if (empty($cliente) || empty($producto) || empty($cantidad) || empty($precio)) {
    echo "<script>
    alert('Todos los campos son obligatorios');
    window.location='index.php';
    </script>";
    exit();
}

if ($cantidad <= 0) {
    echo "<script>
    alert('La cantidad debe ser mayor a 0');
    window.location='index.php';
    </script>";
    exit();
}

if ($precio <= 0) {
    echo "<script>
    alert('El precio debe ser mayor a 0');
    window.location='index.php';
    </script>";
    exit();
}

if ($total == "" || $total == 0) {
    echo "<script>
    alert('Debe calcular el total antes de guardar');
    window.location='index.php';
    </script>";
    exit();
}

// INSERTAR
$sql = "INSERT INTO ventas (cliente, producto, cantidad, precio, total)
VALUES ('$cliente','$producto','$cantidad','$precio','$total')";

if ($conn->query($sql)) {
    echo "<script>
    alert('Venta registrada correctamente');
    window.location='index.php';
    </script>";
} else {
    echo "<script>
    alert('Error al guardar');
    window.location='index.php';
    </script>";
}

$conn->close();
?>