<?php 
include("Header.php");
include("Sidebar.php");
?>
<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Report </li>
				</ul>
			</div>	
			<div class="container">

<?php
$sql="SELECT * FROM customer_detalis";
    $result=$server->total_row($sql);

 $itemes="SELECT * FROM itemes";
    $Titemes=$server->total_row($itemes);

$paymentdetalis="SELECT * FROM paymentdetalis";
    $Tpaymentdetalis=$server->total_row($paymentdetalis);

$category="SELECT * FROM category";
    $Tcategory=$server->total_row($category); 

$SELL="SELECT * FROM `availability` WHERE Type='SELL'";
    $TSELL=$server->total_row($SELL);

$BUY="SELECT * FROM `availability` WHERE Type='BUY'";
    $TBUY=$server->total_row($BUY);  
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ['Total Customar',<?php echo $result;?>],
          ['Total Itemes',<?php echo $Titemes;?>],
          ['Total Category',<?php echo $Tcategory;?>],
          ['Online Payment',<?php echo $Tpaymentdetalis;?>],
          ['Total BUY',<?php echo $TBUY;?>],
          ['Total SELL',<?php echo $TSELL;?>]
        ]);

      var options = {
        legend: 'none',
        pieSliceText: 'label',
        title: 'Total Report Analysis',
        is3D: true,
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

                </div>
			</div>
		</div>
	</main>
<?php 
include("Footer.php");
?>