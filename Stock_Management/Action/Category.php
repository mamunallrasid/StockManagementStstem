<?php
     require_once("../OOP_CLASS/db-connect/connect.php");
     require_once("../OOP_CLASS/class/common_class.php");
     require_once("../OOP_CLASS/function/function.php");
     $server=new Main_Class();

    $Category_Name=$_POST['Category_Name'];
    $status=$_POST['status'];
    date_default_timezone_set("Asia/Kolkata");
    $date=date("Y-m-d");
    $time=date("H:i:s a");
 foreach($Category_Name as $row =>$key)
 {
    $All_Category_Name=$key;
    $All_status=$status[$row];
    $Category_Name=$_POST['Category_Name'];
    $sql="INSERT INTO `category`(`CategoryName`, `CategoryStatus`, `Date`, `Time`) VALUES ('$All_Category_Name','$All_status','$date','$time')";
    $result=$server->insert($sql);
 }
   if($result)
   {
    echo json_encode(
        [
            'status'=>true,
            'redirect'=>false,
            'reload'=>true,
            'message'=>'Category Added Successfully'
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