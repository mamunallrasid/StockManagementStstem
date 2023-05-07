<?php
   require_once("../OOP_CLASS/db-connect/connect.php");
   require_once("../OOP_CLASS/class/common_class.php");
   require_once("../OOP_CLASS/function/function.php");
   $server=new Main_Class();


    $Name=$_POST['Name'];
    $PurchesDate=$_POST['date'];
    $referance_No=$_POST['referance'];
    $PhNo=$_POST['phno'];
    $Email=$_POST['Email'];
    $Address=$_POST['Address'];

    $category_Name=$_POST['Category_Name'];
    $Product_Name=$_POST['Product_Name'];
    $item_Amout=$_POST['ItemAmount'];
    $item_Code=$_POST['Itemid'];
    $Item_Quantity=$_POST['ItemQuantity'];
    $Item_Quantity_Amount=$_POST['Total'];


    $Discount=$_POST['Discount'];
    $Gst=$_POST['GST'];
    $Sub_Total=$_POST['TotalAmount'];
    $Total_Amount=$_POST['FinalAmount'];
    date_default_timezone_set("Asia/Kolkata");
    $date=date("Y-m-d");
    $time=date("H:i:s a");
    $type="SELL";
    $paymentType="pending";
    $payment_Status="Pending";
     $sql="INSERT INTO `customer_detalis`(`Name`, `PurchesDate`, `Referance`, `PhoneNo`, `Email`, `Address`, `Discount`, `Tax`, `SubTotal`, `TotalAmount`,`PaymentType`,`PaymentStatus`,`Date`, `Time`) VALUES
     ('$Name','$PurchesDate','$referance_No','$PhNo','$Email','$Address','$Discount','$Gst','$Sub_Total','$Total_Amount','$paymentType','$payment_Status','$date','$time')";
     if($result=$server->insert($sql))
     {
        foreach($category_Name as $data =>$key)
     {
        $All_category_Name=$key;
        $all_Product_Name=$Product_Name[$data];
        $all_item_Amout=$item_Amout[$data];
        $all_item_Code=$item_Code[$data];
        $all_item_Quantity=$Item_Quantity[$data];
        $all_Item_Quantity_Amount=$Item_Quantity_Amount[$data];

        $additem="INSERT INTO `purches_detalis`(`ReferanceNo`, `CategoryName`, `ItemName`, `ItemAmount`, `ItemCode`, `ItemQuantity`, `Itemtamount`, `Date`, `Time`) VALUES
        ('$referance_No','$All_category_Name','$all_Product_Name','$all_item_Amout','$all_item_Code','$all_item_Quantity','$all_Item_Quantity_Amount','$date','$time')";
        $itemresponse=$server->insert($additem);

        $quant="INSERT INTO `availability`(`Quantity`, `Type`, `ItemCode`, `date`, `Time`) VALUES 
        ('$all_item_Quantity','$type','$all_item_Code','$date','$time')";
         $quantresponse=$server->insert($quant);
    }

    if($itemresponse && $quantresponse)
    {
        $payment=array(
            'name'=>$Name,
            'mobile'=>$PhNo,
            'amount'=>$Total_Amount,
            'email'=>$Email,
            'ref_id'=>$referance_No,
            );
            $_SESSION['paymentdetails']=$payment;

        echo json_encode(
            [
                'status'=>true,
                'redirect'=>true,
                'reload'=>false,
                'url'=>"PaymentMethod.php",
                'message'=>'Purchesing Successfully Completed'
            ]
            );
    }
    else
    {
        echo json_encode(
            [
                'status'=>false,
                'redirect'=>false,
                'reload'=>true,
                'message'=>'Error, Please Try Again !'
            ]
            );   
    }
     }
     else
     {
        echo json_encode(
            [
                'status'=>false,
                'redirect'=>false,
                'reload'=>true,
                'message'=>'Error, Please Try Again !'
            ]
            );
     }

    
?>