<?php
$mensaje="";
if(isset($_POST["btnAccion"])){
    switch ($_POST["btnAccion"]) {
        case 'Agregar':
            if(is_numeric(openssl_decrypt($_POST["ID"],COD,KEY))){
                $ID=openssl_decrypt($_POST["ID"],COD,KEY);
                $mensaje.="OK ID Correcto ".$ID."<br>";
                if(is_string(openssl_decrypt($_POST["Nombre"],COD,KEY))){
                    $Nombre=openssl_decrypt($_POST["Nombre"],COD,KEY);
                    $mensaje.="OK Nombre Correcto ".$Nombre."<br>";
                    if(is_numeric(openssl_decrypt($_POST["Precio"],COD,KEY))){
                        $Precio=openssl_decrypt($_POST["Precio"],COD,KEY);
                        $mensaje.="OK Precio Correcto ".$Precio."<br>";
                        if(is_numeric(openssl_decrypt($_POST["Cantidad"],COD,KEY))){
                            $Cantidad=openssl_decrypt($_POST["Cantidad"],COD,KEY);
                            $mensaje.="OK Cantidad Correcto ".$Cantidad."<br>";
                        }else{
                            $mensaje.="Upss Cantidad Incorrecto ";
                        }
                    }else{
                        $mensaje.="Upss Precio Incorrecto ";
                    }
                }else{
                    $mensaje.="Upss Nombre Incorrecto ";
                }    
            }else{
                $mensaje.="Upss ID Incorrecto ";
            }
            break;
        
        default:
            # code...
            break;
    }
}
?>