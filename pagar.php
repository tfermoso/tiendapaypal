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
    $sentencia = $pdo->prepare("insert into tblventas values (NULL,:claveTransaccion,'',now(),:correo,:total,'pendiente')");
    $sentencia->bindParam(":claveTransaccion", $SID);
    $sentencia->bindParam(":correo", $_POST["email"]);
    $sentencia->bindParam(":total", $total);
    $sentencia->execute();
    $idVenta = $pdo->lastInsertId();
    foreach ($_SESSION["CARRITO"] as $indice => $producto) {
        $sentencia = $pdo->prepare("insert into tbldetalleventas values 
        (NULL," . $idVenta . ",:IDProducto,:Precio,:Cantidad,0)");
        $sentencia->bindParam(":IDProducto", $producto["ID"]);
        $sentencia->bindParam(":Cantidad", $producto["Cantidad"]);
        $sentencia->bindParam(":Precio", $producto["Precio"]);
        $sentencia->execute();
    }
    // echo "<h3>".$total."</h3>";
}
?>

<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENTIDPAYPAL?>&currency=EUR"></script>
<div class="p-5 mb-4 bg-light rounded-3 text-center">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">¡Paso Final!</h1>
        <hr>
        <p class="col-md-8 fs-4">Estas a punto de pagar con paypal la cantidad de:
        <h4><?php echo number_format($total, 2); ?> €</h4>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        </p>
        <p>Los productos podrán ser descargados una vez completado el pago</p>
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
/*
        // Call your server to set up the transaction
        createOrder: function(data, actions) {
            return fetch('/demo/checkout/api/paypal/order/create/', {
                method: 'post'
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                return orderData.id;
            });
        },
*/
        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
            alert("Pago completado");
            /*
            return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                method: 'post'
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                // Three cases to handle:
                //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
                //   (2) Other non-recoverable errors -> Show a failure message
                //   (3) Successful transaction -> Show confirmation or thank you

                // This example reads a v2/checkout/orders capture response, propagated from the server
                // You could use a different API or structure for your 'orderData'
                var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                    return actions.restart(); // Recoverable state, per:
                    // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                }

                if (errorDetail) {
                    var msg = 'Sorry, your transaction could not be processed.';
                    if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                    if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                    return alert(msg); // Show a failure message (try to avoid alerts in production environments)
                }

                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // Replace the above to show a success message within this page, e.g.
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
            */
        }

    }).render('#paypal-button-container');
</script>
<?php
include("templates/pie.php")
?>