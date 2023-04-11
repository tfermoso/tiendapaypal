<?php
session_start();
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
                            $producto=array(
                                "ID"=>$ID,
                                "Nombre"=>$Nombre,
                                "Precio"=>$Precio,
                                "Cantidad"=>$Cantidad
                            );
                            if(!isset($_SESSION["CARRITO"])){                               
                                $_SESSION["CARRITO"][0]=$producto;
                            }else{
                                $idproductos=array_column($_SESSION["CARRITO"],"ID");
                                if(in_array($producto["ID"],$idproductos)){
                                    $mensaje="El artículo ya esta en el carrito";
                                }else{
                                    array_push($_SESSION["CARRITO"],$producto);
                                    $mensaje="Artículo añadido al carrito";
                                }
                                
                            }
                           
                       
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
        
        case "Eliminar":
            if(is_numeric(openssl_decrypt($_POST["ID"],COD,KEY))){
                $ID=openssl_decrypt($_POST["ID"],COD,KEY);
                foreach ($_SESSION["CARRITO"] as $indice => $producto) {
                  if($producto["ID"]==$ID){
                    unset($_SESSION["CARRITO"][$indice]);
                    $mensaje="Artículo borrado";
                  }   
                }
            }else{
                $mensaje.="Upss ID Incorrecto ";
            }
            break;
    }
}
?>