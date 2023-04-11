<?php
$mensaje="";
if(isset($_POST["btnAccion"])){
    switch ($_POST["btnAccion"]) {
        case 'Agregar':
            if(is_numeric(openssl_decrypt($_POST["ID"],COD,KEY))){
                $ID=openssl_decrypt($_POST["ID"],COD,KEY);
                $mensaje="OK ID Correcto ".$ID;
            }else{
                $mensaje="Upss ID Incorrecto ".$ID;
            }
            break;
        
        default:
            # code...
            break;
    }
}
?>