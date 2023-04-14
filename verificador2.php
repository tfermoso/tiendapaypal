<?php
$json=file_get_contents('php://input');
$datos=json_decode($json);
//Con los datos recibidos actualizar pago en la bbdd

//print_r($datos);
echo $json
?>