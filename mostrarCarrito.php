<?php
include("global/config.php");
include("carrito.php");
include("templates/cabecera.php");
?>
<h3>Lista del carrito</h3>
<div class="table-responsive">
    <?php if ($mensaje != "") { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php } ?>
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
                        <td><?php echo number_format($producto["Precio"], 2, ",", "."); ?></td>
                        <td><?php echo number_format($producto["Cantidad"] * $producto["Precio"], 2, ",", "."); ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="ID" id="id" value="<?php echo openssl_encrypt($producto["ID"], COD, KEY); ?>">
                                <button  class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php
                    $total += $producto["Cantidad"] * $producto["Precio"];
                } ?>
                <tr>
                    <td colspan=3 align="right">
                        <h3>Total</h3>
                    </td>
                    <td align="right">
                        <h3><?php echo number_format($total, 2, ",", "."); ?></h3>
                    </td>
                    <td></td>


                </tr>
                <tr>
                    <td colspan=5>
                        <form action="pagar.php" method="post">
                            <div class="alert alert-success" role="alert">
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Por favor escribe tu correo" aria-describedby="helpId" required>
                                    <small id="helpId" class="text-muted">Los productos se enviarán a este email</small>
                                </div>
                                <div class="d-grid gap-2">
                                  <button type="submit" name="btnAccion" value="pagar" id="" class="btn btn-primary btn-lg btn-block">Proceder a pagar >></button>
                                </div>
                            </div>


                        </form>
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