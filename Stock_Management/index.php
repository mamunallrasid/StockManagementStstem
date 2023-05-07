<?php
include("Header.php"); 
include("Sidebar.php");
?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Dashboard</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Dashboard</li>
				</ul>
			</div>
			<?php
			date_default_timezone_set("Asia/Kolkata");
			$date=date("Y-m-d");
			$sql="SELECT TotalAmount FROM `customer_detalis` WHERE `Date`='$date'"; 
			if($result=$server->fetch_data($sql))
			{
				$total='0';
				foreach($result as $row)
				{
					$total+=$row['TotalAmount'];
				}
			}
			?>	
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
						<h4 class="wc-title">
								Total  Amount
							</h4>		
							<span class="wc-title">
							&#x20B9;<span class="counter"><?php echo $total;?></span>
							</span>
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<!-- <span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									78%
								</span>
							</span> -->
						</div>				      
					</div>
				</div>
		    <?php $sql="SELECT * FROM `itemes`"; 
			$totalitem=$server->total_row($sql);
			?>	
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								 Total Avaliable Item
							</h4>
							<span class="wc-des">
								Avaliable 
							</span>
							<span class="wc-stats counter">
								<?php echo $totalitem; ?>
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 88%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>				      
					</div>
				</div>
				<?php $sql="SELECT * FROM `category` WHERE `CategoryStatus`='Active'"; 
				$totalcategory=$server->total_row($sql);
				?>	
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
							Avaliable Category
							</h4>
							<span class="wc-des">
							      Avaliable
							</span>
							<span class="wc-stats counter">
							  <?php echo $totalcategory; ?>
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									65%
								</span>
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg4">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Customer
							</h4>
							<?php $sql="SELECT * FROM `customer_detalis`"; 
							$totalcategory=$server->total_row($sql);
							?>	
							<span class="wc-stats counter">
								<?php echo $totalcategory; ?>
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									Change
								</span>
								<span class="wc-number ml-auto">
									90%
								</span>
							</span>
						</div>				      
					</div>
				</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-md-12">
					<div class="widget-box">
						<div class="wc-title bg-success">
							<h4>Find Details</h4>
						</div>
						<div class="widget-inner">
							<form id="finddata" method="post">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
										<label for="exampleInputEmail1">Enter Name Or Ph No</label>
										<input type="text" class="form-control" id="name" name="name"  placeholder="Enter Namr Or Ph No" required>
                                   		</div>
									</div>
									<div class="col-md-4" style="margin-top:34px;">
										<input type="Submit" class="form-control bg-info" name="Submit" id="submit" Value="Find">
									</div>
							     </div>
							</form>
							<table class="table table-hover mt-4"  id="userinfo">
								<thead>
									<tr>
									<th scope="col">SL</th>
									<th scope="col">Name</th>
									<th scope="col">Ph No</th>
									<th scope="col">Referance No</th>
									<th scope="col">Address</th>
									<th scope="col">Total Amount</th>
									<th scope="col">Date</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<div class="ttr-overlay"></div>
	<?php
	include("Footer.php"); 
	?>
	<script>
		$(document).ready()
		{
			$("#finddata").submit(function(e){
				e.preventDefault();
              let  Name=$("#name").val();             
              $.ajax({
				url:"Action/FindDetalis.php",
                method:"POST",
				data:$(this).serialize(),
				success:function(response)
				{
					$("#userinfo tbody").html(response);
				}
			  })
			});
		}
	</script>