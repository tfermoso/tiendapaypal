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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><button>Eliminar</button></td>
                </tr>
                <tr>
                    <td colspan=3 align="right">
                        <h3>Total</h3>
                    </td>
                    <td colspan=2 align="right">
                        <h3><?php echo number_format(300, 2); ?></h3>
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