<?php
include("Header.php");
include("Sidebar.php"); 
?>
     <main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Product Availability</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Availability</h4>
						</div>
						<div class="table-responsive">
						<table class="table table-hover" id="allinfo">
							<thead>
								<tr>
								<th scope="col">SL</th>
                                <th scope="col">Category Name</th>
								<th scope="col">Item Name</th>
                                <th scope="col">ITEM Code</th>
								<th scope="col">Total Num Of ITEM</th>
								</tr>
							</thead>
							<?php
                            $i="1";
                             $sql="SELECT *,(SELECT SUM(availability.Quantity) FROM availability WHERE availability.Type='BUY' AND availability.ItemCode=itemes.ItemCode)totalBuy,(SELECT SUM(availability.Quantity) FROM availability WHERE availability.Type='SELL' AND availability.ItemCode=itemes.ItemCode)totalSell,

((SELECT IFNULL(SUM(availability.Quantity),0) FROM availability WHERE availability.Type='BUY' AND availability.ItemCode=itemes.ItemCode)-
 
 (SELECT IFNULL(SUM(availability.Quantity),0) FROM availability WHERE availability.Type='SELL' AND availability.ItemCode=itemes.ItemCode))totalAvailable,category.CategoryName FROM `itemes` INNER JOIN category ON category.Id=itemes.ItemCategory";
							 $result=$server->fetch_data($sql);
							 {
								foreach($result as $row)
								{
							?>
							<tbody>
                            <!-- `Name`, `Referance`, ``, ``, `Email`, `Date`, `Time` -->
								<tr>
								<th><?php echo $i++;?></th>
								<td><?php echo $row['CategoryName'];?></td>
								<td><?php echo $row['ItemName'];?></td>
								<td><?php echo $row['ItemCode'];?></td>
								<td><?php echo $row['totalAvailable'];?></td>

								<tr>
							</tbody>
							<?php
							}
						} ?>
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
	$("#findrange").submit(function(e){
		e.preventDefault();
    $.ajax({
		url:'Action/findData.php',
		method:'post',
		data:$(this).serialize(),
		success:function(response)
		{
            // alert(response);
			$("#allinfo tbody").html(response);
		}
	})
	});
  </script>