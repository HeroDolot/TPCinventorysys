<?php
    include '../connection.php';
    include '../components/header.php';
    include '../components/navbar-logged.php';
    include '../components/sidebar-logged.php';
    $id = $_GET['lists_id'];
    // echo '<h1>'. $id . '</h1>';
?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-4">
            <div class="container-fluid">
                <div class="wrapper">
                <div class="content-header">
                    <h2 class="text-info">Edit Quantity</h2>
                </div>
                <div class="form-group">
                         <form action="../CRUD/cart-edit.php" method="get">
                            <input type="hidden" name="lists_id" value="<?=$id?>">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include '../components/footer.php';
?>