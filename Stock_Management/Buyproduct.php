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
					<li>Buy Product</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Buy Product </h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile" id="Value_Store_Form">
								<div class="row">
									<div class="col-12 m-t20">
									</div>
									<div class="col-12">
										<table id="item-add" style="width:100%;">
											<tr class="list-item list_1">
												<td>
													<div class="row">
														<div class="col-md-2">
															<label class="col-form-label"><h6>Selcct Category </h6></label>
															<div>
                                                                <select class="form-control"  name="Category_Name[]" onchange="finditem(this.value,1)" id="productCategory_1" required>
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

														<div class="col-md-2">
                                                        <label class="col-form-label"><h6>Selcct Product </h6></label>
                                                        <div>
                                                                <select class="form-control"  name="Product_Name[]"  id="Product_1" onchange="findAmount(this.value,1)" required>
                                                                <option value="">Select Product</option>
                            
                                                                </select>  
															</div>
														</div>
                                                        <div class="col-md-2">
															<label class="col-form-label"><h6>Quantity</h6></label>
                                                            <input class="form-control" type="number" name="ItemQuantity[]" id="Quantity_1" required>
                                                            <input class="form-control" type="hidden" name="ItemId[]" id="Itemcode_1" required>
														</div>
                                                        <div class="col-md-2">
															<label class="col-form-label"><h6>Buying Amount </h6></label>
                                                            <input class="form-control" type="number" name="buyAmount[]" id="buyamount_1" required>
														</div>
                                                        <div class="col-md-2">
															<label class="col-form-label"><h6>Selling Amount </h6></label>
                                                            <input class="form-control" type="number" name="sellingAmount[]" id="sellamount_1" required>
														</div>
														<div class="col-md-1 mt-2">
															<label class="col-form-label">Close</label>
															<div class="form-group">
																<a class="delete" href="#" onclick="deleteItem(1)"><i class="fa fa-close"></i></a>
															</div>
														</div>
													</div>
												</td>
											</tr>
										</table>
									</div>
									<div class="col-12 mt-2">
										<button type="button" class="btn-secondry add-item m-r5" onclick="addItem()"><i class="fa fa-fw fa-plus-circle"></i>Add Item</button>
										<input type="hidden" id="url" value="Action/BuyItem.php">
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
   }
} 
	?>
	<div class="ttr-overlay"></div>
<?php 
include("Footer.php");
?>
</body>

<!-- Mirrored from educhamp.themetrades.com/demo/admin/teacher-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Feb 2019 13:11:35 GMT -->
</html>
<script>
    var no = 1;
	function addItem(){
		no = no+1;
		var add =`<tr class="list-item list_${no}">
												<td>
													<div class="row">
														<div class="col-md-2">
															<label class="col-form-label"><h6>Selcct Category </h6></label>
															<div>
                                                                <select class="form-control"  name="Category_Name[]" onchange="finditem(this.value,${no})" id="productCategory_${no}" required>
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

                                                        <div class="col-md-2">
                                                        <label class="col-form-label"><h6>Selcct Product </h6></label>
                                                        <div>
                                                                <select class="form-control"  name="Product_Name[]" id="Product_${no}" onchange="findAmount(this.value,${no})" required>
                                                                <option value="">Select Product</option>
                            
                                                                </select>  
															</div>
														</div>
                                                        <div class="col-md-2">
															<label class="col-form-label"><h6> Quantity</h6></label>
                                                            <input class="form-control" type="number" name="ItemQuantity[]" id="Quantity_${no}" required>
                                                            <input class="form-control" type="hidden" name="ItemId[]" id="Itemcode_${no}" required>
														</div>
                                                        <div class="col-md-2">
															<label class="col-form-label"><h6>Buying Amount </h6></label>
                                                            <input class="form-control" type="number" name="buyAmount[]" id="buyamount_${no}" required>
														</div>
                                                        <div class="col-md-2">
															<label class="col-form-label"><h6>Selling Amount </h6></label>
                                                            <input class="form-control" type="number" name="sellingAmount[]" id="sellamount_${no}" required>
														</div>
														<div class="col-md-1 mt-2">
															<label class="col-form-label">Close</label>
															<div class="form-group">
																<a class="delete" href="#" onclick="deleteItem(${no})"><i class="fa fa-close"></i></a>
															</div>
														</div>
													</div>
												</td>
											</tr>`;
               
                                         $('#item-add').append(add); 
        }

    function deleteItem(no)
	{
		$('.list_'+no).remove();
	}
</script>
<script>
    function finditem(id,no)
	{
		$.ajax({
         url:'Action/Find.php',
		 type:'post',
		 data:{ctid:id,finditem:"finditem"},
		 success:function(response)
		 {
			$("#Product_"+no).html(response);
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
			$("#sellamount_"+no).val(data.Amount);
			$("#Itemcode_"+no).val(data.itemCode);
		 }
		});
	}

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
