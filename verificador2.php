<?php
include("global/config.php");
include("global/conexion.php");
session_start();
$json = file_get_contents('php://input');
$data = json_decode($json);
//Con los datos recibidos actualizar pago en la bbdd
$custom = $data->datos->purchase_units[0]->reference_id;
$custom_data = explode("#", $custom);
$idVenta = openssl_decrypt($custom_data[1], COD, KEY);
$status = $data->datos->status;
$total = 0;
$SID = session_id();
foreach ($_SESSION["CARRITO"] as $indice => $producto) {
    $total += $producto["Cantidad"] * $producto["Precio"];
}
$totalPaypal=$data->datos->purchase_units[0]->payments->captures[0]->amount->value;

$respuesta=array();
$respuesta["estado"]=$status;
$estado="";
if($status=="COMPLETED"){
    if($total==$totalPaypal){
        $respuesta["pago"]="completo";
    }else{
        $respuesta["pago"]="incompleto";
    }
}
$consulta = "UPDATE tblventas SET PaypalDatos = :paypaldatos,Status = :estado WHERE tblventas.ID = :IDVenta;";
$sentencia=$pdo->prepare($consulta);
$sentencia->bindParam(":paypaldatos",$json);
$sentencia->bindParam(":estado",$status);
$sentencia->bindParam(":IDVenta",$idVenta);
$sentencia->execute();
//borramos sesión
unset($_SESSION["CARRITO"]);
//unset($_SESSION["idVenta"]);

echo json_encode($respuesta);
