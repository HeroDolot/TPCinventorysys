<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include '../connection.php';
include '../components/header.php';
include '../components/navbar.php';
include '../components/sidebar.php';
$sql = "SELECT DISTINCT po_code FROM procurement";
$result = mysqli_query($conn, $sql);
$result_table = mysqli_query($conn, $sql);
$total = 0.00;
$po_number = "";
?>

<div class="container-fluid">
    <div class="content-wrapper">
        <div class="card p-3 mt-3">
            <div class="card-header text-xl text-primary">Receiving</div>
            <div class="p-4">
                <form method="post" action="">
                <label for="po_number" class="mb-3">
                    <strong>PO NUMBER:</strong>
                    <select name="po_number" id="po_number" class="form-control">
                        <option value=""></option>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <option value="<?php echo $row['po_code']; ?>" <?php if ($row['po_code'] == $po_number) echo "selected"; ?>><?php echo $row['po_code']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </label>
                    <button type="submit" name="submit" class="btn btn-primary mb-3 adjust-button">Filter</button>
                </form>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>ITEMS</th>
                            <th>QUANTITY</th>
                            <th>UNIT PRICE</th>
                            <th>TOTAL PRICE</th>
                        </tr>
                    </thead>
                    <tbody class="tbody tbody-striped text-center">
                    <?php
                    ?>
                    <?php if (isset($_POST['po_number']) && !empty($_POST['po_number'])) : ?>
                        <?php
                        $po_number = mysqli_real_escape_string($conn, $_POST['po_number']);
                        $sql_filter = "SELECT * FROM procurement WHERE po_code = '$po_number'";
                        $result_filter = mysqli_query($conn, $sql_filter);
                        ?>
                        <?php while ($row = $result_filter->fetch_assoc()) : ?>
                            <?php $total += $row['unit_price']; ?>
                            <tr>
                                <td><?php echo $row['procurement_date']; ?></td>
                                <td><?php echo $row['item']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo number_format($row['unit_price']) ?></td>
                                <td><?php echo number_format($row['total_price']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                    <?php while ($row = $result_table->fetch_assoc()) : ?>
                    <?php $total += $row['unit_price']; ?>
                        <tr>
                            <td><?php echo $row['procurement_date']; ?></td>
                            <td><?php echo $row['item']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo number_format($row['unit_price']) ?></td>
                            <td><?php echo number_format($row['total_price']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td>Total: <span id="totalAmount"><?php echo number_format($total); ?></span></td>
                                <td></td>
                            </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../components/footer.php'; ?>

<style>
.adjust-button {
    margin-top: 1%;
    margin-left: 2%;
}
</style>