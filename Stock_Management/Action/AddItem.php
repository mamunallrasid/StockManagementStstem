<?php

require_once("../OOP_CLASS/db-connect/connect.php");
require_once("../OOP_CLASS/class/common_class.php");
require_once("../OOP_CLASS/function/function.php");
$server=new Main_Class();


date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d");
$time=date("H:i:s a");
$Category_Name=$_POST['Category_Name'];
$ItemName=$_POST['ItemName'];
$ItemAmount=$_POST['ItemAmount'];
$ItemQuantity=$_POST['ItemQuantity'];
$type="BUY";
foreach($Category_Name as $row =>$key)
{
    $itemcode="ITEM".rand(10,898);
    $allCategory=$key;
    $AllItemName=$ItemName[$row];
    $AllItemAmount=$ItemAmount[$row];
    $AllItemQuantity=$ItemQuantity[$row];
    $itm="INSERT INTO `itemes`(`ItemCategory`, `ItemName`, `ItemAmount`, `ItemCode`, `Date`, `Time`) VALUES ('$allCategory','$AllItemName','$AllItemAmount','$itemcode','$date','$time')";
    $quant="INSERT INTO `availability`(`Quantity`, `Type`, `ItemCode`, `Date`, `Time`) VALUES ('$AllItemQuantity','$type','$itemcode','$date','$time')";
    $additm=$server->insert($itm);
    $addqu=$server->insert($quant);

}
if($addqu)
{
    echo json_encode(
        [
            'status'=>true,
            'redirect'=>false,
            'reload'=>true,
            'message'=>'Product Added Successfully'
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