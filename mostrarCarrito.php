<?php
include("global/config.php");
include("carrito.php");
include("templates/cabecera.php");
?>
<h3>Lista del carrito</h3>
<div class="table-responsive">
    <?php if (!empty($_SESSION["CARRITO"])) { ?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                    <th scope="col">--</th>
                </tr>
            </thead>
            <tbody>

                <?php $total = 0;
                foreach ($_SESSION["CARRITO"] as $indice => $producto) { ?>
                    <tr>
                        <th scope="row"><?php echo $producto["Nombre"]; ?></th>
                        <td><?php echo $producto["Cantidad"]; ?></td>
                        <td><?php echo $producto["Precio"]; ?></td>
                        <td><?php echo number_format($producto["Cantidad"] * $producto["Precio"], 2); ?></td>
                        <td><button>Eliminar</button></td>
                    </tr>
                <?php
                    $total+=$producto["Cantidad"] * $producto["Precio"];
                } ?>
                <tr>
                    <td colspan=3 align="right">
                        <h3>Total</h3>
                    </td>
                    <td colspan=2 align="right">
                        <h3><?php echo number_format($total, 2); ?></h3>
                    </td>

                </tr>

            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-primary" role="alert">
            <strong>No hay artículos en el carrito</strong>
        </div>

    <?php } ?>
</div>

<?php
include("templates/pie.php")
?>