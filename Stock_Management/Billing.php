<style>
	.mt-1,.my-1 {
    margin-top: -1.75rem!important;
}
</style>
<?php
include("Header.php");
include("Sidebar.php"); 
if(isset($_GET['type']))
{
	if($_GET['type']=="add")
	{
   ?>
       <main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Billing</li>
				</ul>
			</div>	
			<?php
			$ref="CCMP".date('dmms'); 
			?>
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title bg-success">
							<h4>Create Invoice</h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile" id="Value_Store_Form">
								<div class="row bg-info mt-0 pb-4">
									<div class="col-md-4">
										<label class="col-form-label"><h6>Customer Name</h6></label>
										<input class="form-control" type="text" name="Name" required>
									</div>
									<div class="col-md-5"></div>
									<div class="col-md-3">
										<label class="col-form-label"><h6>Purches Date</h6></label>
										<input class="form-control" type="date" name="date" id="datePicker" required>
									</div>
									<div class="col-md-4">
									    <label class="col-form-label"><h6>Referance</h6></label>
										<input class="form-control" type="text" name="referance" value="<?php echo $ref; ?>" readonly>
									</div>

									<div class="col-md-4">
									    <label class="col-form-label"><h6>Customer Ph No</h6></label>
										<input class="form-control" type="text" name="phno" required>
									</div>
                                    
									<div class="col-md-4">
									    <label class="col-form-label"><h6>Customer Email</h6></label>
										<input class="form-control" type="text" name="Email" required>
									</div>

									<div class="col-md-12">
									<label class="col-form-label"><h6>Customer Address</h6></label>
										<input class="form-control" type="text" name="Address" required>
									</div>
								</div>
								<div class="row">
									<div class="col-12 m-t20">
									</div>
									<div class="col-12">
										<table id="item-add" style="width:100%;">
											<tr class="list-item list_1">
												<td>
													<div class="row" style="background-color:#f7eac6;">
														<div class="col-md-2 mb-3">
															<label class="col-form-label"><h6>Category Name</h6></label>
															<div>
                                                            <select class="form-control" id="Category_Name_1" name="Category_Name[]" onchange="finditem(this.value,1)" required>
                                                            <option value="">Select Category</option>
                                                            <?php 
                                                                $sql="SELECT * FROM category";
                                                                $result=$server->fetch_data($sql);
                                                                {
                                                                    foreach($result as $row)
                                                                    {
                                                                 ?>
																	<option value="<?php echo $row['Id'];?>"><?php echo $row['CategoryName'];?></option>
														
                                                                <?php
                                                                }
                                                                    }
                                                                ?>
                                                                 </select>  
															</div>
														</div>

														<div class="col-md-3">
														<label class="col-form-label"><h6>Item Name</h6></label>
															<div>
                                                            <select class="form-control"  name="Product_Name[]" onchange="findAmount(this.value,1)" id="item_1" required>
                                                            <option value="">Select Item</option>
                                                                 </select>  
															</div>
														</div>
                                                        <div class="col-md-2">
															<label class="col-form-label"><h6>Item Amount</h6></label>
                                                            <input class="form-control" type="number" id="Amount_1" name="ItemAmount[]" readonly>
															<input class="form-control" type="hidden" id="ItemCode_1" name="Itemid[]">
														</div>
                                                        <div class="col-md-2">
															<label class="col-form-label"><h6>Item Quantity</h6></label>
                                                            <input class="form-control" type="number" onkeyup="totalAmount(this.value,1)" name="ItemQuantity[]" id="ItemQuantity_1" required>
														</div>
														<div class="col-md-1 mt-2">
															<label class="col-form-label">Close</label>
															<div class="form-group">
																<a class="delete" href="#" onclick="deleteItem(1)"><i class="fa fa-close"></i></a>
															</div>
														</div>
														<div class="col-md-2">
															<label class="col-form-label"><h6>Total </h6></label>
                                                            <input class="form-control" type="number" name="Total[]" id="Total_1" required>
														</div>
													</div>
												</td>
											</tr>
										</table>
									</div>
									<div class="col-12">
										<div class="row pb-4 mt-3" style="background-color:#c1aef2">
											<div class="col-md-3">
												<label class="col-form-label"><h6>Discount</h6></label>
												<input class="form-control" type="number" name="Discount" id="Discount" onkeyup="Total_discount(this.value,$('#GST').val())" required>
											</div>	
											<div class="col-md-3">
												<label class="col-form-label"><h6>GST</h6></label>
												<input class="form-control" type="number" name="GST" id="GST" onkeyup="Total_discount($('#Discount').val(),this.value)" required>
											</div>
											<div class="col-md-3"></div>
											<div class="col-md-3">
												<label class="col-form-label"><h6>Sub Total</h6></label>
												<input class="form-control" type="number" id="TotalAmount" name="TotalAmount" required>
											</div>		
										</div>

										<div class="row pb-4" style="background-color:#c1aef2">
											<div class="col-md-3">
											</div>	
											<div class="col-md-3">
											</div>
											<div class="col-md-3"></div>
											<div class="col-md-3" style="margin-top:-27px;">
												<label class="col-form-label"><h6>Total Amount</h6></label>
												<input class="form-control" type="number" id="FinalAmount" name="FinalAmount" required>
											</div>		
										</div>
										
									</div>
									<div class="col-12 mt-2">
										<button type="button" class="btn-secondry add-item m-r5" onclick="addItem()"><i class="fa fa-fw fa-plus-circle"></i>Add Item</button>
										<input type="hidden" id="url" value="Action/Bill.php">
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
	?>
	<?php
   if($_GET['type']=="show")
   {
	?>
     <main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Show Items</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Purches Detalis</h4>
						</div>
						<div class="widget-inner">
						<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
								<th scope="col">SL</th>
								<th scope="col">Name</th>
								<th scope="col">Purches Date</th>
								<th scope="col">Referance No</th>
								<th scope="col">Phone No</th>
								<th scope="col">Email</th>
								<th scope="col">Address</th>
								<th scope="col">Discount%</th>
								<th scope="col">Tax%</th>
								<th scope="col">SubTotal</th>
								<th scope="col">TotalAmount</th>
								<th scope="col">PaymentStatus</th>
								<th scope="col">Date</th>
								<th scope="col">Time</th>
								<th scope="col">option</th>
								</tr>
							</thead>
							<?php 
							date_default_timezone_set("Asia/Kolkata");
							$date=date("Y-m-d");
							$sql="SELECT * FROM customer_detalis WHERE `Date`='$date'";
							 if($result=$server->fetch_data($sql))
							 {
								foreach($result as $row)
								{
							?>
							<tbody>
								<tr>
								<th><?php echo $row['csl'];?></th>
								<td><?php echo $row['Name'];?></td>
								<td><?php echo $row['PurchesDate'];?></td>
								<td><?php echo $row['Referance'];?></td>
								<td><?php echo $row['PhoneNo'];?></td>
								<td><?php echo $row['Email'];?></td>
								<td><?php echo $row['Address'];?></td>
								<td><?php echo $row['Discount'];?></td>
								<td><?php echo $row['Tax'];?></td>
								<td><?php echo $row['SubTotal'];?></td>
								<td><?php echo number_format($row['TotalAmount'],2);?></td>
								<td><?php echo $row['PaymentStatus'];?></td>
								<td><?php echo $row['Date'];?></td>
								<td><?php echo $row['Time'];?></td>
				                 <td>
								 <button type="button" class="btn btn-primary" id="allinfo" value="<?php echo $row['Referance'];?>" onclick="refid('<?php echo $row['Referance'];?>')">View Details</button>
								 </td>
								</tr>
								<tr>
							</tbody>
							<?php
							}
						} 
						else
						{ 
						  ?>
						     <td colspan="4">No Record Found</td>
							<?php 
						}?>
							</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
<!-- view  User Detalis Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Purches Detalis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="info" id="detalis"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="print" onclick="window.print()">Print</button>
      </div>
    </div>
  </div>
  <!-- view User Detalis Model -->
</div>
   <?php 
   }
} 
	?>
	<div class="ttr-overlay"></div>
<?php 
include("Footer.php");
?>
<script>
	$(document).ready()
	{
		function refid(referance)
		{
			let referance_no=referance;
			$.ajax({
			url:'Action/BillDetalis.php',
			type:'post',
			data:{referance_no:referance_no,BillDetalis:"BillDetalis"},
			success:function(response)
			{
				$("#exampleModal").modal("show");
                 $("#detalis").html(response);
			}
			});
			
		}
	}
</script>
<script>
	var no = 1;
	function addItem(){
		no = no+1;
		var add = `<tr class="list-item list_${no}">
						<td>
							<div class="row" style="background-color:#f7eac6">
								<div class="col-md-2">
									<label class="col-form-label"><h6>Category Name</h6></label>
									<div>
									<select class="form-control" id="Category_Name_${no}" name="Category_Name[]" onchange="finditem(this.value,${no})" required>
									<option value="">Select Category</option>
									<?php 
										$sql="SELECT * FROM category";
										$result=$server->fetch_data($sql);
										{
											foreach($result as $row)
											{
											?>
											<option value="<?php echo $row['Id'];?>"><?php echo $row['CategoryName'];?></option>
								
										<?php
										}
											}
										?>
											</select>  
									</div>
								</div>

								<div class="col-md-3">
								<label class="col-form-label"><h6>Item Name</h6></label>
									<div>
									<select class="form-control"  name="Product_Name[]" onchange="findAmount(this.value,${no})" id="item_${no}" required>
									<option value="">Select Item</option>
											</select>  
									</div>
								</div>
								<div class="col-md-2">
									<label class="col-form-label"><h6>Item Amount</h6></label>
									<input class="form-control" type="number" id="Amount_${no}" name="ItemAmount[]" readonly>
									<input class="form-control" type="hidden" id="ItemCode_${no}" name="Itemid[]">
								</div>
								<div class="col-md-2">
									<label class="col-form-label"><h6>Item Quantity</h6></label>
									<input class="form-control" type="number" onkeyup="totalAmount(this.value,${no})" name="ItemQuantity[]" id="ItemQuantity_${no}" required>
								</div>
								<div class="col-md-1 mt-2">
									<label class="col-form-label">Close</label>
									<div class="form-group">
										<a class="delete" href="#" onclick="deleteItem(${no})"><i class="fa fa-close"></i></a>
									</div>
								</div>
								<div class="col-md-2">
									<label class="col-form-label"><h6>Total </h6></label>
									<input class="form-control" type="number" name="Total[]" id="Total_${no}" required>
								</div>
							</div>
						</td>
					</tr>
					`;
		$('#item-add').append(add);
																	
	}
	function deleteItem(no)
	{
		$('.list_'+no).remove();
	}

	function totalAmount(quantity,no){
		var itemAmount = $('#Amount_'+no).val();
	
		if(isNaN(itemAmount) || itemAmount==''){
			itemAmount = 0;
		}
		var Total = quantity*itemAmount;
		$('#Total_'+no).val(Total);
		allTotalAmount(no);
	}

	function allTotalAmount(no){
		var allTotal = 0;
		for(var i=1;i<=no;i++){
			allTotal = sum(allTotal,$('#Total_'+i).val());
		}
		$('#TotalAmount').val(allTotal);
	}

	function sum(a,b){
		return parseFloat(a) + parseFloat(b);
	}
	function Total_discount(discount,gst)
	{
		var subAmount = $('#TotalAmount').val();
		if(discount=='' || isNaN(discount)){
			discount = 0;
		}
		if(gst=='' || isNaN(gst)){
			gst = 0;
		}

		discount =  (subAmount*discount/100);
		gst =(subAmount*gst/100);
		console.log(discount);
		console.log(gst);


		var total_price=(parseFloat(subAmount)+parseFloat(gst))-parseFloat(discount);

		// let dis=amount;
		// let subamount=$("#TotalAmount").val();
		// var totalValue = subamount * ( (100-dis) / 100 );
	    $("#FinalAmount").val(total_price);

		
	}
	function Total_Gst(tgst)
	{
		let Totalgst=tgst;
		let subamount=$("#FinalAmount").val();
		var price =(subamount * Totalgst)/100;
		var total_price=parseFloat(price)+parseFloat(subamount);
		$("#FinalAmount").val(total_price)
		
	}
</script>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/teacher-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>
<script>
	function finditem(id,no)
	{
		$.ajax({
         url:'Action/Find.php',
		 type:'post',
		 data:{ctid:id,finditem:"finditem"},
		 success:function(response)
		 {
			$("#item_"+no).html(response);
		 }
		});
	}
	function findAmount(id,no)
	{
		$.ajax({
         url:'Action/Find.php',
		 type:'post',
		 data:{itemid:id,findamount:"findamount"},
		 success:function(response)
		 {
			var data =JSON.parse(response);
			$("#Amount_"+no).val(data.Amount);
			$("#ItemCode_"+no).val(data.itemCode);
		 }
		});
	}
</script>
<script>
	$(document).ready( function() {
    var now = new Date();
    var month = (now.getMonth() + 1);               
    var day = now.getDate();
    if (month < 10) 
        month = "0" + month;
    if (day < 10) 
        day = "0" + day;
    var today = now.getFullYear() + '-' + month + '-' + day;
    $('#datePicker').val(today);
});
</script>