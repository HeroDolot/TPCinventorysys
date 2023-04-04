<?php
    include '../connection.php';
    include '../components/header.php';
    include '../components/navbar-unlog.php';
    include '../components/sidebar-unlog.php';
    
    $sql = "SELECT brands.brand_name AS brand_name, lists.names, lists.descriptions ,lists.ptype, lists.label, lists.quantity, lists.price, lists.id FROM lists INNER JOIN brands ON lists.brand_id = brands.brand_id";
    $result = mysqli_query($conn, $sql);
?>

<div class="container-fluid">
    <div class="content-wrapper p-5">
        <div class="row">
            <?php
            $i = 0;
            while($row = mysqli_fetch_assoc($result)){
                echo ' <div class="col-md-4">';
                echo '     <div class="card" style="width: 100%;">';
                echo '         <img src="../assets/images/AddItem' . "/" . $row['names'] . '" class="card-img-top" alt="...">';
                echo '         <div class="card-body">';
                echo '             <h2 class="card-title font-weight-bolder">Type: ' . $row['ptype'] . '</h5>';
                echo '             <br>';
                echo '             <h2 class="card-title">Brand: ' . $row['brand_name'] . '</h5>';
                echo '             <br>';
                echo '             <h3 class="card-title">Model: ' . $row['label'] . '</h5>';
                echo '             <br>';
                echo '             <h3 class="card-title">Quantity: ' . $row['quantity'] . '</h3>';
                echo '             <br>';
                echo '             <h3 class="card-title">Price: ' . '₱' . number_format($row['price']) . '</h3>';
                echo '             <br>';
                echo '             <br>';
                echo '             <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal' . $row['id'] . '">About</button>';
                
                // check if user is authenticated
                if(isset($_SESSION['uname'])) {
                    echo '             <button type ="button" class=" btn btn-outline-primary">Add To Cart</button>';
                } else {
                    echo '             <button type ="button" class=" btn btn-outline-primary" disabled title="Please log in first">Add To Cart</button>';
                }
                
                echo '         </div>';
                echo '     </div>';
                echo ' </div>';

                echo ' <div class="modal fade" id="myModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
                echo '     <div class="modal-dialog" role="document">';
                echo '         <div class="modal-content">';
                echo '             <div class="modal-header">';
                echo '                 <h4 class="modal-title" id="myModalLabel">Product Description</h4>';
                echo '                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                echo '                     <span aria-hidden="true">&times;</span>';
                echo '                 </button>';
                echo '             </div>';
                echo '             <div class="modal-body">';
                echo '                <h5>'. $row['descriptions'] . '</h5>';
                echo '             </div>';
                echo '             <div class="modal-footer">';
                echo '                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                echo '             </div>';
                echo '         </div>';
                echo '     </div>';
                echo ' </div>';
            }

?>
             </div>
        </div>
    </div>
<?php
    include '../components/footer.php';
?>