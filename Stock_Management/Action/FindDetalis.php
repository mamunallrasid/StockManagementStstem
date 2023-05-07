<?php
require_once("../OOP_CLASS/db-connect/connect.php");
require_once("../OOP_CLASS/class/common_class.php");
require_once("../OOP_CLASS/function/function.php");
$server=new Main_Class();

 $Name=$_POST['name'];
 $information="";
 $i="1";
 $sql="SELECT * FROM `customer_detalis` WHERE  `Name`='$Name' || `PhoneNo`='$Name'";
 if($result=$server->fetch_data($sql))
 {
    foreach($result As $data)
    {
        $information.="<tr>
        <td>".$i."</td>
        <td>".$data['Name']."</td>
        <td>".$data['PhoneNo']."</td>
        <td>".$data['Referance']."</td>
        <td>".$data['Address']."</td>
        <td>".$data['TotalAmount']."</td>
        <td>".$data['PurchesDate']."</td>
        </tr>";
    }
  
 }
 else
 {
    echo "No Record Found";
 }
 echo $information;
?>