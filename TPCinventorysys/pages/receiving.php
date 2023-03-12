<?php 
session_start();
include '../connection.php';
include '../components/header.php';
include '../components/navbar.php';
include '../components/sidebar.php';
?>

<div class="container-fluid">
    <div class="content-wrapper">
        <div class="card p-3 mt-3">
            <div class="card-header text-xl text-primary">Receiving</div>
            <div class="p-4">
                <label for="po_number" class="mb-3">
                    <strong>PO NUMBER:</strong>
                    <select name="" id="po_number" class="form-control">
                        <option value="">PO-1</option>
                        <option value="">PO-2</option>
                        <option value="">PO-3</option>
                    </select>
                </label>
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
                        <tr>
                            <td>03-13-2023</td>
                            <td>Mouse</td>
                            <td>13</td>
                            <td>1.00</td>
                            <td>13.00</td>
                        </tr>
                    </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td>Total: <span id="totalAmount">0.00</span></td>
                                <td></td>
                            </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../components/footer.php'; ?>
