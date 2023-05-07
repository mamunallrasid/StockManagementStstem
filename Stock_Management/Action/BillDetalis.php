<?php
require_once("../OOP_CLASS/db-connect/connect.php");
require_once("../OOP_CLASS/class/common_class.php");
require_once("../OOP_CLASS/function/function.php");
$server=new Main_Class();

if(isset($_POST['BillDetalis']))
{
    $refid=$_POST['referance_no'];
    $sql="SELECT * FROM `purches_detalis` LEFT JOIN `itemes` ON  `purches_detalis`.ItemCode=`itemes`.ItemCode LEFT JOIN `customer_detalis` ON  `purches_detalis`.ReferanceNo=`customer_detalis`.Referance WHERE purches_detalis.ReferanceNo='$refid'";
    $result=$server->fetch_data($sql);
    $data="";
    $data.='<table class="table">
    <thead>
      <tr>
        <th scope="col">Item Name</th>
        <th scope="col">Item Quantity</th>
        <th scope="col">Amount</th>
        <th scope="col">Total Amount</th>
      </tr>
    </thead>';
    foreach($result as $row)
    {
        $data.="<tbody>
        <tr>
          <td>{$row['ItemName']}</td>
          <td>{$row['ItemQuantity']}</td>
          <td>{$row['ItemAmount']}</td>
          <td>{$row['Itemtamount']}</td>
        ";
       // $data.=$row['CategoryName'];
    }
    $data.="</table>";
    $data.="<table class='table'>
    <thead>
      <tr>
        <th>Discount</th>
        <td>{$row['Discount']}%</td>
      </td>
      <tr>
        <th>Tax</th>
        <td>{$row['Tax']}%</td>
      </td>
      <tr>
        <th>Sub Total Amount</th>
        <td>{$row['SubTotal']}</td>
      </tr>
      <tr>
      <th>Total Amount</th>
      <td>{$row['TotalAmount']}</td>
    </tr>
    </thead>";
    echo $data;
} 
?>
<!-- Array ( [Psl] => 1 [ReferanceNo] => CCMP04040425 [CategoryName] => 1 [ItemName] => 1 [ItemAmount] => 2837 [ItemCode] => ITEM311 [ItemQuantity] => [Itemtamount] => 5674 [Date] => 05-04-2023 [Time] => 01:55:04 am ) Array ( [Psl] => 2 [ReferanceNo] => CCMP04040425 [CategoryName] => 2 [ItemName] => 3 [ItemAmount] => 3795 [ItemCode] => ITEM380 [ItemQuantity] => [Itemtamount] => 3795 [Date] => 05-04-2023 [Time] => 01:55:04 am ) Array ( [Psl] => 3 [ReferanceNo] => CCMP04040425 [CategoryName] => 3 [ItemName] => 6 [ItemAmount] => 4532 [ItemCode] => ITEM474 [ItemQuantity] => [Itemtamount] => 9064 [Date] => 05-04-2023 [Time] => 01:55:04 am ) 111 -->