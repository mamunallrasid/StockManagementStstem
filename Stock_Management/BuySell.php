<?php
include("Header.php");
include("Sidebar.php"); 
?>
     <main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li> Selling & Buying Report</li>
				</ul>
			</div>	
			<div class="row">
				<div class="col-md-12 m-b30">
					<div class="widget-box">
						<div class="wc-title bg-success">
							<h4>Seling Report</h4>
						</div>
						<div>
						<form id="findsell" method="post">
							<div class="widget-inner">
							<label for="from">From</label>
							<input type="text" class="Startfrom" name="from" required>
							<label for="to">To</label>
							<input type="text" class="Endto" name="to" required>
                            <input type="hidden" name="Sellinfo">
							<input type="submit" value="Seaech" name="search">
						</form>
						</div>
						<div class="table-responsive">
						<table class="table table-hover" id="Sellingreport">
							<thead>
								<tr>
								<th scope="col">SL</th>
								<th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Item Code</th>
								<th scope="col">Product Number</th>
                                <th scope="col">Date</th>
								</tr>
							</thead>
							<?php 
							date_default_timezone_set("Asia/Kolkata");
							$date=date("Y-m-d");
                            $i=1;
                            $sql="SELECT *, SUM(availability.Quantity) FROM availability LEFT JOIN itemes ON availability.ItemCode=itemes.ItemCode
                            LEFT JOIN category ON category.Id=itemes.ItemCategory  WHERE Type='SELL'  && availability.date='$date' GROUP BY availability.ItemCode;";
							 if($result=$server->fetch_data($sql))
							 {
								foreach($result as $row)
								{
							?>
							<tbody>
								<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $row['CategoryName'];?></td>
								<td><?php echo $row['ItemName'];?></td>
								<td><?php echo $row['ItemCode'];?></td>         
                                <td><?php echo $row['SUM(availability.Quantity)'];?></td>
								<td><?php echo $row['date'];?></td>

								</tr>
							</tbody>
							<?php
							}
						} 
						else
						{
							?>

							<tr><td>No Record Found</td></tr>
							<?php
						} 
							?>
							</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>

    <main class="ttr-wrapper mt-2">
		<div class="container-fluid">
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-md-12 m-b30">
					<div class="widget-box">
						<div class="wc-title bg-info">
							<h4>Buying Report</h4>
						</div>
						<div>
						<form id="findbuy" method="post">
							<div class="widget-inner">
							<label for="from">From</label>
							<input type="text" class="Startfrom" name="buyfrom" required>
							<label for="to">To</label>
							<input type="text" class="Endto" name="buyto" required>
                            <input type="hidden" name="Buyinfo">
							<input type="submit" value="Seaech" name="search">
						</form>
						</div>
						<div class="table-responsive">
						<table class="table table-hover" id="BuyingReport">
                            <thead id="report">
								<tr>
								<th scope="col">SL</th>
								<th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Item Code</th>
								<th scope="col">Product Number</th>
                                <th scope="col">Date</th>
								</tr>
							</thead>
							<?php 
							date_default_timezone_set("Asia/Kolkata");
							$date=date("Y-m-d");
                            $i=1;
							$sql="SELECT *, SUM(availability.Quantity) FROM availability LEFT JOIN itemes ON availability.ItemCode=itemes.ItemCode
                            LEFT JOIN category ON category.Id=itemes.ItemCategory  WHERE Type='BUY' && availability.date='$date' GROUP BY availability.ItemCode;";
							 if($result=$server->fetch_data($sql))
							 {
								foreach($result as $row)
								{
							?>
								<tbody>
									<tr>
									<td><?php echo $i++;?></td>
									<td><?php echo $row['CategoryName'];?></td>
									<td><?php echo $row['ItemName'];?></td>
									<td><?php echo $row['ItemCode'];?></td>         
									<td><?php echo $row['SUM(availability.Quantity)'];?></td>
									<td><?php echo $row['date'];?></td>
									</tr>
								</tbody>
							<?php
							}
							} 
							else
							{
							?>

							<tr><td>No Record Avali</td></tr>
							<?php
						    } 
							?>
							</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
<?php 
include("Footer.php");
?>
<script>
  $( function() {
    var dateFormat = "yy-mm-dd",
      from = $( ".Startfrom" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
		  dateFormat: 'yy-mm-dd',
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( ".Endto" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
		dateFormat: 'yy-mm-dd',
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
  <script>
	$("#findsell").submit(function(e){
		e.preventDefault();
         $.ajax({
            url:'Action/findBuySell.php',
            method:'post',
            data:$(this).serialize(),
            success:function(response)
            {
				if(response==1)
				{
					 $("#Sellingreport tbody").html("<tr><td>Record Not Found</td></tr>");
				}
				else
				{
					$("#Sellingreport tbody").html(response);
				}
            }
	    })
	});

    $("#findbuy").submit(function(e){
		e.preventDefault();
         $.ajax({
            url:'Action/findBuySell.php',
            method:'post',
            data:$(this).serialize(),
            success:function(response)
            {
                $("#BuyingReport tbody").html(response);
            }
	    })
	});
  </script>