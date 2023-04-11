<?php
include("global/config.php");
include("carrito.php");
include("templates/cabecera.php");
?>
<h3>Lista del carrito</h3>
<div class="table-responsive">
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
      <td>@mdo</td>
    </tr>
    
  </tbody>
</table>
</div>

<?php
include("templates/pie.php")
?>