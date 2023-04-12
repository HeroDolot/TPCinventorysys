<?php
    include '../connection.php';
    include '../components/header.php';
    include '../components/navbar-logged.php';
    include '../components/sidebar-logged.php';
    
   

    $sql = "SELECT brands.brand_name AS brand_name, lists.names, lists.descriptions, lists.ptype, lists.label, lists.quantity, lists.price, lists.id FROM lists INNER JOIN brands ON lists.brand_id = brands.brand_id";
    $result = mysqli_query($conn, $sql);

?>

    <div class="container-fluid">
        <div class="content-wrapper p-5">
            <div class="row">
            <?php $i = 0; ?>

            <?php while ($row = $result->fetch_assoc()) : 
                    $markup = 10;
                    $markup_amount = $row['price'] * ($markup / 100);
                    $total_price = $row['price'] + $markup_amount; ?>
                <div class="col-md-4">
                <div class="card" style="width: 100%;">
                   <img src="../assets/images/AddItem/<?php echo $row['names']; ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                             <h2 class="card-title font-weight-bolder">Type: <?php  echo $row['ptype']; ?></h5>
                             <br>
                             <h2 class="card-title">Brand: <?php echo  $row['brand_name']; ?></h5>
                             <br>
                             <h3 class="card-title">Model: <?php echo $row['label']; ?></h5>
                             <br>
                             <h3 class="card-title">Quantity: <?php echo $row['quantity']; ?> </h3>
                             <br>
                             <h3 class="card-title">Price: <?php echo number_format($total_price, 2); ?></h3>
                            <p class="card-text">About: <?php echo $row['descriptions']; ?> </p>
                             <br>   
                             <br>   
                             <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>">About</button>
                             <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addToCartModal<?php echo $row['id']; ?>">Add To Cart</button>
                         </div>
                     </div>
                 </div>
                
                 <div class="modal fade" id="myModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h4 class="modal-title" id="myModalLabel">Product Description</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                <img src="../assets/images/AddItem/<?php echo $row['names']; ?>" class="card-img-top" alt="...">
                                <h5><?php echo $row['descriptions']; ?></h5>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                             </div>
                         </div>
                     </div>
                 </div>
                
                 <div class="modal fade" id="addToCartModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h4 class="modal-title" id="myModalLabel">Add to Cart</h4>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <form method="get" action="../controller/authentication/cart-view.php">
                                     <input type="hidden" name="lists_id" value="<?php echo $row['id']; ?>">
                                      <div class="form-group">
                                          <label for="cart_quantity">Quantity</label>
                                          <input type="number" class="form-control" id="quantity" name="cart_quantity" min="1" max="<?php echo $row['quantity']; ?>">
                                      </div>                
                                     <button type="submit" class="btn btn-outline-primary">Add to Cart</button>
                                 </form>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                             </div>
                         </div>
                     </div>
                 </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>


<?php
    include '../components/footer.php';
?>