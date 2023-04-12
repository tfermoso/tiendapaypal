<?php
include("global/config.php");
include("global/conexion.php");
include("carrito.php");
include("templates/cabecera.php");
?>
<?php
if($_POST){
    $total=0;
    $SID=session_id();
    foreach ($_SESSION["CARRITO"] as $indice=>$producto) {
        $total+=$producto["Cantidad"]*$producto["Precio"];
    }
    $sentencia=$pdo->prepare("insert into tblventas values (NULL,:claveTransaccion,'',now(),:correo,:total,'pendiente')");
    $sentencia->bindParam(":claveTransaccion",$SID);
    $sentencia->bindParam(":correo",$_POST["email"]);
    $sentencia->bindParam(":total",$total);
    $sentencia->execute();
    $idVenta=$pdo->lastInsertId();
    foreach ($_SESSION["CARRITO"] as $indice=>$producto) {
        $sentencia=$pdo->prepare("insert into tbldetalleventas values 
        (NULL,".$idVenta.",:IDProducto,:Precio,:Cantidad,0)");
        $sentencia->bindParam(":IDProducto",$producto["ID"]);
        $sentencia->bindParam(":Cantidad",$producto["Cantidad"]);
        $sentencia->bindParam(":Precio",$producto["Precio"]);
        $sentencia->execute();
    }

    echo "<h3>".$total."</h3>";
}

?>

<?php
include("templates/pie.php")
?>