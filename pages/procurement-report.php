<?php
    session_start();
    include '../connection.php';
    include '../components/header.php';
    include '../components/sidebar.php';
    include '../components/navbar.php';

    // $sql = "SELECT * FROM supplier";
    $result = mysqli_query($conn,$sql);

    echo '<div class="content-wrapper">
                <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header font-weight-bold">Procurement Details</div>
                            <div class="card-body">
                                <table class="table table-striped">
                                     <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Product Code</th>
                                            <th scope="col">Item list</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                 <tbody>';
                                 while ($row_once = $result->fetch_assoc()) { 
                                    echo '<td>'.$row_once['product_code'].'</td>'; 
                                    echo '<td><select id="item1">'; 
                                    echo '<option value="'.$row_once["item1"].'">'.$row_once["item1"].'</option>'; 
                                    while ($row = $result->fetch_assoc()) { 
                                      echo '<option value="'.$row["item1"].'">'.$row["item1"].'</option>'; 
                                    } 
                                    echo '</select></td>'; 
                                  } 
    echo '                       </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                </div>
            </div>';


?>


<?php 
    include '../components/footer.php';
?>
