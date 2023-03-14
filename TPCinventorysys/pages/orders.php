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
                            <p>Cash or Reservation:</p>
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

                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">Deny</button>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Deny Request</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to deny this request?</p>
                                        <select name="" id="" class="form-control">
                                            Reason of Denying
                                            <option value="">Invalid Reference Number</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger">Deny</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <p>Cash or Reservation:</p>
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

                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal">Deny</button>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Deny Request</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to deny this request?</p>
                                        <select name="" id="" class="form-control">
                                            Reason of Denying
                                            <option value="">Invalid Reference Number</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger">Deny</button>
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