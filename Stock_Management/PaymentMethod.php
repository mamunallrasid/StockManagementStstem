<?php
session_start();
include("Header.php");
include("Sidebar.php"); 
if(!empty($_SESSION['paymentdetails']))
{
    $name=$_SESSION['paymentdetails']['name'];
    $mobile=$_SESSION['paymentdetails']['mobile'];
    $Email=$_SESSION['paymentdetails']['email'];
    $Referance=$_SESSION['paymentdetails']['ref_id'];
    $Amount=$_SESSION['paymentdetails']['amount'];
}
?>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Payment</li>
				</ul>
			</div>	
			<div class="row bg-success">
				<!-- Your Profile Views Chart -->
				<h2 style="text-align:center;MARGIN-LEFT: 306px; color:white;">Select Payment Option</h2>
				<!-- Your Profile Views Chart END-->
			</div>
            <div class="row mt-6">
                <form id="Value_Store_Form">
                <div class="col-md-4" style="Margin-top:20px; margin-right:20px;">
                    <div class="card bg-info" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Payment Type (CASH)</h5>
                            <input class="form-control" type="text" name="Name" value="<?php echo $name;?>" readonly>
                            <input class="form-control" type="text" name="referance" value="<?php echo $Referance;?>" readonly>
                            <input class="form-control" type="text" name="amount" value="<?php echo $Amount;?>" readonly>
                            <input class="form-control" type="hidden" name="mobile" value="<?php echo $mobile;?>" readonly>
                            <input class="form-control" type="hidden" name="email" value="<?php echo $Email;?>" readonly>
                            <input type="hidden" id="url" value="Action/payment.php">
                            <input type="submit" class="btn btn-primary mt-2" id="Cash" Name="Cash" value="Make Payment">
                        </div>
                    </div>
                    </form>
                 </div>
                 <div class="col-md-2"></div>
                 <div class="col-md-4" style="Margin-top:20px; margin-right:20px;">
                    <div class="card bg-info" style="width: 18rem;">
                    <form class="Value_Store_Form">
                        <div class="card-body">
                            <h5 class="card-title">Payment Type (Online)</h5>

                            <input class="form-control" type="text" name="Name" value="<?php echo $name;?>" readonly>
                            <input class="form-control" type="text" name="referance" value="<?php echo $Referance;?>" readonly>
                            <input class="form-control" type="text" name="amount" value="<?php echo $Amount;?>" readonly>
                            <input class="form-control" type="hidden" name="mobile" value="<?php echo $mobile;?>" readonly>
                            <input class="form-control" type="hidden" name="email" value="<?php echo $Email;?>" readonly>
                            <input type="hidden" id="url" value="Action/payment.php">
                            <input type="submit" class="btn btn-primary mt-2" id="Online" Name="Online" value="Make Payment">
                        </div>
                    </form>
                    </div>
                 </div>
                  

            </div>
           
</main>
<?php 
 include("Footer.php");
 ?>