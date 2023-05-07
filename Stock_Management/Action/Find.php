<?php
require_once("../OOP_CLASS/db-connect/connect.php");
require_once("../OOP_CLASS/class/common_class.php");
require_once("../OOP_CLASS/function/function.php");
$server=new Main_Class();

if(isset($_POST['finditem']))
{
    $id=$_POST['ctid'];
    $sql="SELECT * FROM `itemes` WHERE ItemCategory=$id";
    $result=$server->fetch_data($sql);

    $item="";
    $Amount="";
    $item.="<option value=''>Select Item </option>";
    if($result)
    {
        foreach($result as $row)
        {
            $item.="<option value='{$row['ItemSl']}'>{$row['ItemName']}</option>";
        }
    }
   else
   {
    $item.="<option value=''>No Item Available</option>";
   }
    echo $item;
    echo $Amount;
}

if(isset($_POST['findamount']))
{
    $id=$_POST['itemid'];
    $sql="SELECT * FROM `itemes` WHERE ItemSl=$id";
    $result=$server->single_row_fetch($sql);
    $Amount=$result['ItemAmount']; 
    $itemCode=$result['ItemCode']; 
    $arr=array(
    "Amount"=>$Amount,
    "itemCode"=>$itemCode,
    );
    echo json_encode($arr);
}

?>