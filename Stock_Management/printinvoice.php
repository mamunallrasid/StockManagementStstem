<?php 
include("Header.php");
include("Sidebar.php");
print_r($_POST);
//$refid=$_POST['refid'];
$refid="CCMP04040425";
?>
<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Print Invoice</li>
				</ul>
			</div>	
			<div class="row">
                <?php $sql="SELECT * FROM customer_detalis WHERE Referance='$refid'";
							 $result=$server->fetch_data($sql);
							 {
								foreach($result as $row)
								{
							?>            
                <table class="table">
                   <th>
                    <td><b>Name:</b>&nbsp<?php echo $row['Name']?></td>
                    <td><b>Purches Date:</b>&nbsp<?php echo $row['PurchesDate'];?></td>
                    </th>
                    <th> <td><b>Referance No:</b>&nbsp<?php echo $row['Referance'];?></td></th>
                    <th><td><b>Ph No:</b>&nbsp<?php echo $row['PhoneNo'];?></td></th>
                    <th><td><b>Email:</b>&nbsp<?php echo $row['Email'];?></td></th>
                    
                    <th><td><b>Address:</b>&nbsp<?php echo $row['Address'];?></td></th>
                </table>
                <?php
                 }
                 } 
                ?>
                <?php
                $sql="SELECT * FROM `purches_detalis` LEFT JOIN `itemes` ON  `purches_detalis`.ItemCode=`itemes`.ItemCode LEFT JOIN `customer_detalis` ON  `purches_detalis`.ReferanceNo=`customer_detalis`.Referance WHERE purches_detalis.ReferanceNo='$refid'";
                $result=$server->fetch_data($sql);
                 ?>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Produce Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Total Amount</th>
                        </tr>
                    </thead>
                    <?php
                    $i=1;
                    foreach($result as $row)
                    {
                    ?>
                    <tbody>
                        <tr>
                        <th><?php echo $i++;?></th>
                        <td><?php echo $row['ItemName'];?></td>
                        <td><?php echo $row['ItemQuantity'];?></td>
                        <td><?php echo $row['ItemAmount'];?></td>
                        <td><?php echo $row['Itemtamount'];?></td>
                        </tr>
                       <?php
                            }
                        ?>
                        <tr>
                        <td colspan="4"><b style="text-align:right; margin-left:750px;">Sub Total:</b></td>
                        <td><?php echo $row['SubTotal'];?></td>
                        </tr>
                        <tr>
                        <td colspan="4"><b style="text-align:right; margin-left:780px;">Discount:</b></td>
                        <td><?php echo $row['Discount'];?>%</td>
                        </tr>
                        <tr>
                        <td colspan="4"><b style="text-align:right; margin-left:820px;">Tax:</b></td>
                        <td><?php echo $row['Tax'];?>%</td>
                        </tr>
                        <tr>
                        <td colspan="4"><b style="text-align:right; margin-left:742px;">Total Amount:</b></td>
                        <td><?php echo $row['TotalAmount'];?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
			</div>
		</div>
        <div col-md-12>
        <button class="d-flex justify-content-center btn btn-success" onclick="window.print()" style="margin-bottom: 35px; margin-left:500px;">Print</button>
        </div>
	</main>
<?php 
include("Footer.php");
?>