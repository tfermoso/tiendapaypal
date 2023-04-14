<?php 
include("global/config.php");
include("global/conexion.php");
include("templates/cabecera.php");
?>
<?php
if(isset($_GET["respuestaventa"])){
    $datosVenta=json_decode($_GET["respuestaventa"]);
    //print_r($datosVenta->custom[1]);
    $idVenta=openssl_decrypt($datosVenta->custom[1], COD, KEY);
    $estado=$datosVenta->status;
    $sentencia=$pdo->prepare("update tblVentas set Status=:status, PayPalDatos=:paypaldatos where ID=:id");
    $sentencia->bindParam(":status",$estado);
    $sentencia->bindParam(":paypaldatos",$_GET["respuestaventa"]);
    $sentencia->bindParam(":id",$idVenta);
    $sentencia->execute();
    
    var_dump(openssl_decrypt($datosVenta->custom[1], COD, KEY));
}

/*
include("global/config.php");
$Login=curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($Login,CURLOPT_RETURNTRANSFER,true);
curl_setopt($Login,CURLOPT_USERPWD,CLIENTIDPAYPAL.":".SECRETPAYPAL);
curl_setopt($Login,CURLOPT_POSTFIELDS,"grant_type=client_credentials");

$result=json_decode(curl_exec($Login));
print_r($result->access_token);
*/
?>