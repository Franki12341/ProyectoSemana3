<?php
include("conexion.php");
 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
 
    $sql = "DELETE FROM ventas WHERE id = $id";

    if ($conn->query($sql)) {
        echo "<script>
                alert('Venta eliminada con éxito');
                window.location='index.php';
              </script>";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "<script>
            alert('No se recibió un ID válido');
            window.location='index.php';
          </script>";
}
?>
