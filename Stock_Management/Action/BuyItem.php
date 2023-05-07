<?php
   require_once("../OOP_CLASS/db-connect/connect.php");
   require_once("../OOP_CLASS/class/common_class.php");
   require_once("../OOP_CLASS/function/function.php");
   $server=new Main_Class();

    $category=$_POST['Category_Name'];
    $ItemName=$_POST['Product_Name'];
    $ItemQuantity=$_POST['ItemQuantity'];
    $Itemcode=$_POST['ItemId'];
    $BuyingAmount=$_POST['buyAmount'];
    $sellingAmount=$_POST['sellingAmount'];
    $Type="BUY";
date_default_timezone_set("Asia/Kolkata");
    $date=date("Y-m-d");
    $time=date("H:i:s a");

     foreach($category as $data =>$key)
     {
        $TotalCategory=$key;
        $totalItem=$ItemName[$data];
        $TItemQuantity=$ItemQuantity[$data];
        $TItemcode=$Itemcode[$data];
        $TBuyingAmount=$BuyingAmount[$data];
        $TsellingAmount=$sellingAmount[$data];
        $sql="INSERT INTO `buying`(`Category`, `ItemName`, `ItemCode`, `ItemQuantity`, `BuyingAmount`, `SellingAmount`, `Date`, `Time`) VALUES
         ('$TotalCategory','$totalItem','$TItemQuantity','$TItemcode','$TBuyingAmount','$TsellingAmount','$date','$time')";
         
         $result=$server->insert($sql);

         $changeamount="UPDATE `itemes` SET `ItemAmount`='$TsellingAmount' WHERE `ItemCode`='$TItemcode'";

         $result1=$server->insert($changeamount);

         $insertav="INSERT INTO `availability`(`Quantity`, `Type`, `ItemCode`, `date`, `Time`) VALUES 
         ('$TItemQuantity','$Type','$TItemcode','$date','$time')";

         $result2=$server->insert($insertav);
       }

       if($result && $result1 && $result2)
         {
            echo json_encode(
                [
                    'status'=>true,
                    'redirect'=>false,
                    'reload'=>true,
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
?>