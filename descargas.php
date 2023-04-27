<?php
include("global/config.php");
include("global/conexion.php");
include("carrito.php");
include("templates/cabecera.php");

if (isset($_SESSION["idVenta"])) {
    $idventa = $_SESSION["idVenta"];
    unset($_SESSION["idVenta"]);
    //Obtengo los datos de los libros que puedo descargar
    $sentencia = $pdo->prepare("SELECT
    T0.Correo,
    T0.Fecha, 
    T0.ClaveTransaccion,
    T2.Nombre,
    T1.Cantidad,
    T1.Descargado FROM tblventas T0 left join tbldetalleventas T1 on T0.ID=T1.IDVenta left join tblproductos T2 on T1.IDProducto=T2.ID where T0.ID=?;");
    $sentencia->bindParam(1, $idventa);
    $sentencia->execute();
    $venta = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
    $descargasHTML = "";
    foreach ($venta as $key => $libro) {
        $correo=$libro["Correo"];
        $cod_venta=$libro["ClaveTransaccion"];
        $descargasHTML .= '
        <tr>
                        <th scope="row">'.$libro["Nombre"].'</th>
                        <td>'.$libro["Cantidad"].'</td>
                        <td>'.$libro["Descargado"].'</td>
                        <td><a href="#">descargar</a></td>                        
                    </tr>
        ';
    }
    require_once "enviar_mail.php";
    echo "Completado el pago de la venta <strong>" . $cod_venta . "</strong> y enviado el mail con los detalles ";
} else {
    header("Location:index.php");
}
?>
<hr>
<h3>Descargas</h3>
<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">Descripción</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Descargas</th>
            <th scope="col" style="text-align:center"><i class="fas download fa-download"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php echo $descargasHTML; ?>
    </tbody>
</table>

<?php
include("templates/pie.php")
?>