<?php
  session_start();
  if(isset($_SESSION['adminTPC']) != "abc123"){
    header('location:../index.php');
  }
  include "../components/header.php";
  include "../components/sidebar.php";
  include "../components/navbar.php";
  include '../connection.php';
?>

<div class="content-wrapper">
  <div class="content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-2 text-info">TPCsurplus&nbsp |&nbsp Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Reports</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body text-lg">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <a href="./procurement-report.php">Procurement Reports</a>
                </li>
                <li class="list-group-item">
                <a href="#">Receiving Report</a>
                </li>
                <li class="list-group-item">
                  <a href="#">Purchase Report</a>
                </li>
                <li class="list-group-item">
                  <a href="#">Sales Report</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header border-0">
                <div id="chart_div" style="width: 900px; height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    include "../components/footer.php";
  ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        function drawChart() {
            <?php
            $sql = "SELECT order_user.date_now AS date, SUM(ls.price) AS total_sales FROM orders order_user LEFT JOIN users us ON 
                    order_user.user_id = us.id LEFT JOIN lists ls ON order_user.list_id = ls.id LEFT JOIN cart ca 
                    ON ca.id = order_user.cart_id LEFT JOIN brands br ON br.brand_id = order_user.brand_id 
                    WHERE STATUS = 1 GROUP BY order_user.date_now";
            $result = mysqli_query($conn, $sql);
            ?>

            // JavaScript code to draw chart
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Date');
            data.addColumn('number', 'Sales');
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            data.addRow([new Date("<?php echo $row['date']; ?>"), <?php echo $row['total_sales']; ?>]);
            <?php } ?>
            var options = {
                title: 'Sales by Date',
                curveType: 'function',
                legend: { position: 'bottom' }
            };
            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
    </script>