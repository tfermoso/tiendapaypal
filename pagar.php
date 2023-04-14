<?php
include("global/config.php");
include("global/conexion.php");
include("carrito.php");
include("templates/cabecera.php");
?>
<?php
if ($_POST) {
    $total = 0;
    $SID = session_id();
    foreach ($_SESSION["CARRITO"] as $indice => $producto) {
        $total += $producto["Cantidad"] * $producto["Precio"];
    }
    if (!isset($_SESSION["idVenta"])) {
        $sentencia = $pdo->prepare("insert into tblventas values (NULL,:claveTransaccion,'',now(),:correo,:total,'pendiente')");
        $sentencia->bindParam(":claveTransaccion", $SID);
        $sentencia->bindParam(":correo", $_POST["email"]);
        $sentencia->bindParam(":total", $total);
        $sentencia->execute();
        $idVenta = $pdo->lastInsertId();
        //Guardamos el idVenta en la sesión para no insertar
        //si ya hemos insertado.
        $_SESSION["idVenta"] = $idVenta;
        foreach ($_SESSION["CARRITO"] as $indice => $producto) {
            $sentencia = $pdo->prepare("insert into tbldetalleventas values 
        (NULL," . $idVenta . ",:IDProducto,:Precio,:Cantidad,0)");
            $sentencia->bindParam(":IDProducto", $producto["ID"]);
            $sentencia->bindParam(":Cantidad", $producto["Cantidad"]);
            $sentencia->bindParam(":Precio", $producto["Precio"]);
            $sentencia->execute();
        }
        // echo "<h3>".$total."</h3>";
    } else {
        $idVenta = $_SESSION["idVenta"];
    }
} else {
    header("Location:index.php");
}
?>

<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENTIDPAYPAL ?>&currency=EUR"></script>
<div class="p-5 mb-4 bg-light rounded-3 text-center">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold"> ¡Paso Final! </h1>
        <hr>
        <p class="col-md-8 fs-4"> Estas a punto de pagar con paypal la cantidad de:
        <h4> <?php echo number_format($total, 2); ?>€ </h4> <!--Set up a container elementfor the button-->
        <div id="paypal-button-container">
        </div>
        </p>
        <p> Los productos podrán ser descargados una vez completado el pago </p>
    </div>
</div>



<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        style: {
            color: 'blue',
            shape: 'pill',
            label: 'pay',
            height: 40
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $total ?>',
                        currency: 'EUR'
                    },
                    description: 'Compra en la tienda',
                    reference_id: '<?php echo $SID ?>#<?php echo openssl_encrypt($idVenta, COD, KEY) ?>'

                }]

            });
        },
        onCancel: function(data) {
            alert("Pago cancelado");
            console.log(data);
        },

        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture()
                .then(function(details) {
                    /*
                    console.log("Pago completado")
                    console.log(details);

                    let custom=details.purchase_units[0].reference_id.split("#");
                    let user=details.payer.email_address;
                    let status=details.status;
                    let importe=details.purchase_units[0].amount.value;
                    let resp={
                    custom,
                    user,
                    status,
                    importe
                    }
                    window.location="verificador.php?respuestaventa="+JSON.stringify(resp);
                    */
                    fetch("verificador2.php", {
                            method: "POST",
                            headers: {
                                'content-type': 'application/json'
                            },
                            body: JSON.stringify({
                                datos: details
                            })
                        }).then(data => data.text())
                        .then(datos => {
                            console.log(datos);
                        }).catch(err => {
                            console.log(err);
                        })
                })
        }

    }).render('#paypal-button-container');
</script>
<?php
include("templates/pie.php")
?>