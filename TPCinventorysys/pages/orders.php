<?php
session_start();
include '../connection.php';
include '../components/header.php';
include '../components/navbar.php';
include '../components/sidebar.php';
?>

<div class="container-fluid mt-3">
    <div class="content-wrapper">
        <div class="card-header text-xl text-primary mb-3">
            Pending Orders
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">CUSTOMER ACC NAME</h5>
                        <br>
                        <hr>
                        <div class="font-weight-bold">
                            <p>Date:</p>
                            <p>Pick-up or Reservation:</p>
                            <p>Reference Number:</p>
                        </div>
                    </div>
                    <div class="card-header bg-secondary text-white">
                        ITEMS ORDERED
                    </div>
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>ITEM NAME</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>MOUSE</td>
                                <td>3</td>
                                <td>400</td>
                                <td>1,200</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" align="right"><strong>Total: 1,200</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">Approve</button>
                        <button type="submit" class="btn btn-danger btn-block">Deny</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">CUSTOMER ACC NAME</h5>
                        <br>
                        <hr>
                        <div class="font-weight-bold">
                            <p>Date:</p>
                            <p>Pick-up or Reservation:</p>
                            <p>Reference Number:</p>
                        </div>
                    </div>
                    <div class="card-header bg-secondary text-white">
                        ITEMS ORDERED
                    </div>
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>ITEM NAME</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>MOUSE</td>
                                <td>3</td>
                                <td>400</td>
                                <td>1,200</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" align="right"><strong>Total: 1,200</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block">Approve</button>
                            <button type="submit" class="btn btn-danger btn-block">Deny</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    include '../components/footer.php';
    ?>