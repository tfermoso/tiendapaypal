<?php
include("global/config.php");
include("global/conexion.php");
include("carrito.php");
include("templates/cabecera.php");
?>


        <div class="alert alert-success" role="alert">
            <?php echo $mensaje;?>
            <a href="#" class="badge bg-success">Ver carrito</a>
        </div>
        <div class="row  align-items-center g-2">
            <?php
            $sentencia = $pdo->prepare("select * from tblproductos");
            $sentencia->execute();
            $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            //print_r($listaProductos);
            ?>
            <?php
            foreach ($listaProductos as $producto) {
            ?>
                <div class="col-3">
                    <div class="card ">
                        <img height="300px" data-bs-toggle="popover" data-bs-content="<?php echo $producto["Descripcion"]; ?>" data-bs-trigger="hover" class="card-img-top" title="<?php echo $producto["Nombre"]; ?>" src="<?php echo $producto["Imagen"]; ?>" alt="Title">
                        <div class="card-body">
                            <span><?php echo $producto["Nombre"]; ?></span>
                            <h4 class="card-title"><?php echo $producto["Precio"]; ?> €</h4>
                            <form action="" method="post">
                                <input type="hidden" name="ID" id="id" value="<?php echo openssl_encrypt($producto["ID"],COD,KEY); ?>">
                                <input type="hidden" name="Nombre" id="nombre" value="<?php echo openssl_encrypt($producto["Nombre"],COD,KEY); ?>">
                                <input type="hidden" name="Precio" id="precio" value="<?php echo openssl_encrypt($producto["Precio"],COD,KEY); ?>">
                                <input type="hidden" name="Cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">
                                <button name="btnAccion" value="Agregar" type="submit" class="btn btn-primary">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>



        </div>


    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
<?php
include("templates/pie.php")
?>