<?php
 require_once("../OOP_CLASS/db-connect/connect.php");
 require_once("../OOP_CLASS/class/common_class.php");
 require_once("../OOP_CLASS/function/function.php");
 $server=new Main_Class();

if(isset($_POST['Cash']))
{
    $ref=$_POST['referance'];
    $paymentstatus="Success";
    $paymentype="Cash";
    $sql="UPDATE `customer_detalis` SET `PaymentStatus`='$paymentstatus',`PaymentType`='$paymentype' WHERE `Referance`='$ref'";
    $result=$server->insert($sql);
    if($result)
    {
        echo json_encode(
            [
                'status'=>true,
                'redirect'=>true,
                'reload'=>false,
                'url'=>"Billing.php?type=show",
                'message'=>'Payment Successfully Completed'
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

if(isset($_POST['Online']))
{
    echo json_encode(
        [
            'status'=>true,
            'redirect'=>true,
            'reload'=>false,
            'url'=>"Payment.php",
            'message'=>'You Select  online Payment'
        ]
        );
}

?>