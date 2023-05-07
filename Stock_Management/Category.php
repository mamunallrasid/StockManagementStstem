<?php
include("Header.php");
include("Sidebar.php"); 
if(isset($_GET['type']))
{
	if($_GET['type']=="add")
	{

?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Product Category</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Product Category</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile" id="Value_Store_Form">
								<div class="row">
									<div class="col-12 m-t20">
									</div>
									<div class="col-12">
										<table id="item-add" style="width:100%;">
											<tr class="list-item">
												<td>
													<div class="row">
														<div class="col-md-5">
															<label class="col-form-label"><h6>Category Name</h6></label>
															<div>
																<input class="form-control" type="text" name="Category_Name[]" id="Category_Name" required>
															</div>
														</div>
														<div class="col-md-4">
															<label class="col-form-label"><h6>Category Status</h6></label>
															<select class="form-control"  name="status[]" required>
																	<option value="">Select Status</option>
																	<option value="Active">Active</option>
																	<option value="Deactive">Deactive</option>
															</select>
														</div>
														<div class="col-md-3 mt-2">
															<label class="col-form-label">Close</label>
															<div class="form-group">
																<a class="delete" href="#"><i class="fa fa-close"></i></a>
															</div>
														</div>
													</div>
												</td>
											</tr>
										</table>
									</div>
									<div class="col-12 mt-2">
										<button type="button" class="btn-secondry add-item m-r5"><i class="fa fa-fw fa-plus-circle"></i>Add Item</button>
										<input type="hidden" id="url" value="Action/Category.php">
										<input type="submit" class="btn" name="submit" id="submit">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<?php
	}
} 
   if($_GET['type']=="show")
   {
	?>
    <main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Show Product Category</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Total Product Category</h4>
						</div>
						<div class="widget-inner">
						<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
								<th scope="col">SL</th>
								<th scope="col">Name</th>
								<th scope="col">Status</th>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
								<th scope="col">Option</th>
								</tr>
							</thead>
							<?php $sql="SELECT * FROM category";
							 $result=$server->fetch_data($sql);
							 {
								foreach($result as $row)
								{
							?>
							<tbody>
								<tr>
								<th><?php echo $row['Id'];?></th>
								<td><?php echo $row['CategoryName'];?></td>
								<td><?php echo $row['CategoryStatus'];?></td>
								<td><?php echo $row['Date'];?></td>
								<td><?php echo $row['Time'];?></td>
								<td>
								<select class="form-control" required>
									<option value="">Select</option>
									<option value="Active">Active</option>
									<option value="Deactive">Deactive</option>
									</select>
								</td>
								</tr>
								<tr>
							</tbody>
							<?php
							}
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
   } 
	?>

	<div class="ttr-overlay"></div>
<?php 
include("Footer.php");
?>
<script>
// Pricing add
	function newMenuItem() {
		var newElem = $('tr.list-item').first().clone();
		newElem.find('input').val('');
		newElem.appendTo('table#item-add');
	}
	if ($("table#item-add").is('*')) {
		$('.add-item').on('click', function (e) {
			e.preventDefault();
			newMenuItem();
		});
		$(document).on("click", "#item-add .delete", function (e) {
			e.preventDefault();
			$(this).parent().parent().parent().parent().remove();
		});
	}
</script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/teacher-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>