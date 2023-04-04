<?php
session_start();

include '../connection.php';
include '../components/header.php';
include '../components/navbar.php';
include '../components/sidebar.php';
?>
 
<div class="content-wrapper">
    <h2 class="text-success p-3">File Upload Item List</h2>
    <div class="content-header">
        <div class="container-fluid">
            <form action="../controller/authentication/file-upload-items-con.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="foldername">Folder Name:</label>
                    <select name="foldername" id="foldername" class="form-control-file" required>
                        <option>AddItem</option>
                    <select>
                </div>

                <div class="form-group">
                    <label for="pc">Product Code</label>
                    <input type="text" name="product_code" id="pc">
                </div>

                <div class="form-group">
                    <label for="upload">Image Upload</label>
                    <input type="file" class="form-control-file" name="upload" id="upload" required>
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category" required>
                    <?php
                    include '../connection.php';
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<option value='.$row["product_type"].'>'.$row["product_type"].'</option>';
                    }
                    
                    ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ptype">Type:</label>
                    <select name="ptype" id="ptype" required>
                        <option>Brand New</option>
                        <option>Surplus</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brand">Brand:</label>
                    <select name="brand" id="brand" required>
                    <?php
                        include '../connection.php';
                        $sql = "SELECT * FROM brands";
                        $result = mysqli_query($conn,$sql);

                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<option value='.$row["brand_name"].'>'.$row["brand_name"].'</options>';
                        }
                    ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" required>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" id="price" required>
                </div>

                <div class="form-group">
                    <label for="label">Label:</label>
                    <input type="text" name="label" id="label" required>
                </div>

                <div class="form-group">
                    <label for="descriptions">Description:</label>
                    <input type="text" name="descriptions" id="descriptions" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
include '../components/footer.php';
?>

