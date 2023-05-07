<?php
require_once("OOP_CLASS/db-connect/connect.php");
require_once("OOP_CLASS/class/common_class.php");
require_once("OOP_CLASS/function/function.php");
 require_once("OOP_CLASS/sending_mail/PHPMailerAutoload.php");
require_once ("OOP_CLASS/sending_mail/class.phpmailer.php");
$server=new Main_Class();

if(!empty($_SESSION['paymentdetails']))
{
    $name=$_SESSION['paymentdetails']['name'];
    $mobile=$_SESSION['paymentdetails']['mobile'];
    $Email=$_SESSION['paymentdetails']['email'];
    $Referance=$_SESSION['paymentdetails']['ref_id'];
    $Amount=$_SESSION['paymentdetails']['amount'];
    $date=date("Y-m-d");
    $time=date("H:i:s a");
    $paymentStatus="Success";
    $paymenttype="Online";
    $TransactionID=$_POST['razorpay_payment_id'];
    
    $msg="Hey,"."<br><br>"."    ".$name."<br>"." "."Your Purchesing Successfully Completed"."<br>"."Your Referance Number Is:".$Referance;
    $subject="Purchesing Detalis";

    $insertData="INSERT INTO `paymentdetalis`(`Name`, `Referance`, `TransactionID`,`Amount`, `PhNo`, `Email`, `Date`, `Time`)
     VALUES ('$name','$Referance','$TransactionID',' $Amount','$mobile','$Email','$date','$time')";
    $result=$server->insert($insertData);
    if($result)
    {
        send_email($Email,$subject,$msg);
        $updateData="UPDATE `customer_detalis` SET  `PaymentType`='$paymenttype',`PaymentStatus`='$paymentStatus' WHERE `Referance`='$Referance'";
        $server->insert($updateData);
        echo "<script>alert('Payment Successfull Completed')</script>";
        unset($_SESSION['paymentdetails']);
         echo "<script>window.location='Billing.php?type=show'</script>";
        
    }
    else
    {
        echo "<script>alert('Payment Failed')</script>";
    }
    
    
}
else
{
    echo "<script>window.location='Billing.php?type=show'</script>";
}
?>