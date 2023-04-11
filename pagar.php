<?php
include("global/config.php");
include("global/conexion.php");
include("carrito.php");
include("templates/cabecera.php");
?>
<?php
if($_POST){
    $total=0;
    foreach ($_SESSION["CARRITO"] as $indice=>$producto) {
        $total+=$producto["Cantidad"]*$producto["Precio"];
    }
    echo "<h3>".$total."</h3>";
}

?>

<?php
include("templates/pie.php")
?>