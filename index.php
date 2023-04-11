<?php
include("global/config.php");
include("global/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Tienda</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Carrito(0)</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <br>
    <div class="container">

        <div class="alert alert-success" role="alert">
            Pantalla de mensajes
            <a href="#" class="badge bg-success">Ver carrito</a>
        </div>
        <div class="row  align-items-center g-2">
            <?php
            $sentencia = $pdo->prepare("select * from tblproductos");
            $sentencia->execute();
            $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            print_r($listaProductos);
            ?>
            <?php
            foreach ($listaProductos as $producto) {
            ?>
                <div class="col-3">
                    <div class="card ">
                        <img data-bs-toggle="popover" data-bs-content="<?php echo $producto["Descripcion"]; ?>" data-bs-trigger="hover" class="card-img-top" title="<?php echo $producto["Nombre"]; ?>" src="<?php echo $producto["Imagen"]; ?>" alt="Title">
                        <div class="card-body">
                            <span><?php echo $producto["Nombre"]; ?></span>
                            <h4 class="card-title"><?php echo $producto["Precio"]; ?> €</h4>
                            <button name="btnAccion" value="Agregar" type="submit" class="btn btn-primary">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>



        </div>

    </div>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
</body>

</html>