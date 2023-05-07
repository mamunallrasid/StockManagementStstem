<?php
require_once("Stock_Management/OOP_CLASS/db-connect/connect.php");
require_once("Stock_Management/OOP_CLASS/class/common_class.php");
require_once("Stock_Management/OOP_CLASS/function/function.php");
$server=new Main_Class();
if(isset($_POST['UserName']))
{
    $userName=$_POST['UserName'];
    $Password=$_POST['Password'];
    $sql="SELECT * FROM `login` WHERE `UserName`='$userName' && `Password`='$Password'";
    if($result=$server->fetch_data($sql))
    {
        $_SESSION['userName'] =$userName;
        echo json_encode(
            [
                'status'=>true,
                'redirect'=>true,
                'reload'=>false,
                'url'=>"Stock_Management/index.php",
                'message'=>'Login Successfully Complete'
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
                'message'=>'Invalid, Please Try Again !'
            ]
            );
    }

    
}

 if(isset($_POST['logout']))
 {
    unset($_SESSION['userNam']);
    session_destroy();
    
    echo json_encode(
        [
            'status'=>true,
            'redirect'=>true,
            'reload'=>false,
            'url'=>"../index.php",
            'message'=>'Logout Successfully Complete'
        ]
        );
 }

?>