<div class="modal fade" id="modal_cart" tabindex="-1" aria-hidden="true">
  <div class="modal_dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Carrito de la compra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
        <div>
        <div class="p-2">
          <?
            if(isset($_SESSION['carrito'])){
              $total=0;
              for ($i=0;$i<=count($miCarrito)-1$i ++){
                if ($miCarrito[$i]!=NULL){
          ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div class="row col-12">
                <div class="col-6 p-0" style="text-align: left; color:#000000;">
                  <h6 class="my-0">Cantidad: <?php echo $miCarrito[$i]['cantidad'] ?> : <? echo $miCarrito[$i]['titulo']; ?> </h6>
                </div>
                <div class="col-6 p-0" style="text-align: right; color:#000000">
                  <span class="text-muted" style="text-align: right; color:#000000;"><? echo $miCarrito[$i]['precio'] * $miCarrito[$i]['cantidad']    ?>€</span>
                </div>
              </div>
            </li>
          <?
          $total=$total + ($miCarrito[$i]['precio'] * $miCarrito[$i]['cantidad']);
                }
              }
            }
          ?>
          <li class="list-group-item d-flex justify-content-between">
            <span style="text-align: left; color:#000000;"> Total (EUR) </span>
            <strong style="text-align: left; color:#000000;">
              <?php
              if(isset($_SESSION['carrito'])){
                $total=0;
                for ($i=0; $i<=count($miCarrito)-1; $i ++){
                  if ($miCarrito!=NULL){
                    $total=$total + ($miCarrito[$i]['precio'] * $miCarrito[$i]['cantidad']);
                  }
                }
              }
              echo $total ?> €
              </strong>
            </li>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a href="Carrito\borrarCarrito.php">Vaciar carrito</a>
      </div>
    </div>
  </div>
</div>