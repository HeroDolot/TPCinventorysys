<?php
    session_start();
    include '../connection.php';
    include '../components/header.php';
    include '../components/sidebar.php';
    include '../components/navbar.php';
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl mt-3">
                <div class="card">
                    <div class="card-header bg-primary text-white text-xl mb-3">Procurement Reports</div>
                    <div class="card-body">
                        <select class="form form-control mb-3" name="po_number">
                            <option value="po_number">PO 1</option>
                            <option value="po_number">PO 2</option>
                        </select>
                        <table class="table table-striped table-hover text-center text-lg">
                            <thead class="thead-dark">
                                <tr>
                                    <th>PO NUMBER</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PO 1</td>
                                    <td>12-07-11</td>
                                    <td><span class="badge badge-danger">On Process</span></td>
                                    <td><button class="btn btn-info"><i class="fas fa-eye"></i> View</button></td>
                                </tr>
                                <tr>
                                    <td>PO 2</td>
                                    <td>12-07-09</td>
                                    <td><span class="badge badge-success">Finished</span></td>
                                    <td><button class="btn btn-info"><i class="fas fa-eye"></i> View</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
    include '../components/footer.php';
?>
