<?php

session_start();
include '../connection.php';
include '../components/header.php';
include '../components/navbar.php';
include '../components/sidebar.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Select inventory item by ID
  $sql = "SELECT * FROM lists WHERE id=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  

  if (isset($_POST['update'])) {
    // Get new attribute values from form submission
    $product_code = $_POST['product_code'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $label = $_POST['label'];
    $descriptions = $_POST['descriptions'];

    // Update inventory item with new attribute values
    $sql = "UPDATE lists SET product_code='$product_code',category='$category', brand_id='$brand', quantity='$quantity', price='$price', label='$label', descriptions='$descriptions' WHERE id='$id'";
    $result = $conn->query($sql);

    // Redirect back to inventory list page
  }
}
?>

<div class="content-wrapper">
  <div class="wrapper">
     <div class="content">
         <div class="container">
            <div class="card">
              <div class="card-header font-weight-bold text-info">Update Inventory Item</div>
                <div class="card-body">
                    <form method="POST">
                          <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" class="form-control" name="product_code" value="<?php echo $row['product_code']; ?>"readonly>
                          </div>
                          <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" value="<?php echo $row['category']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="brand">Brand</label>
                            <select class="form-control" name="brand">
                              <?php
                                  include '../connection.php';
                                  $sql = "SELECT * FROM brands";
                                  $result = mysqli_query($conn,$sql);
          
                                  while($row1 = mysqli_fetch_assoc($result)) {
                                      echo '<option value="'.$row1['brand_id'].'" '.($row1["brand_id"]== $row["brand_id"]?"selected":"").'>'.$row1["brand_name"].'</options>';
                                  }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                          <label for="quantity">Quantity</label>
                          <input type="number" class="form-control" name="quantity" value="<?php echo $row['quantity']; ?>">
                          </div>
                          <div class="form-group">
                          <label for="price">Price</label>
                          <input type="number" class="form-control" name="price" step="0.01" value="<?php echo $row['price']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="label">Label</label>
                              <input type="text" class="form-control" name="label" id="label" value="<?php echo $row['label']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="descriptions">Description</label>
                              <input type="text" class="form-control" name="descriptions" id="descriptions" value="<?php echo $row['descriptions']; ?>">
                          </div>
                          <button type="submit" class="btn btn-primary" name="update">Update</button>
                      </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php 
include '../components/footer.php'; 
?>
