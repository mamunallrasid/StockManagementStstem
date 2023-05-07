<?php
require_once("../OOP_CLASS/db-connect/connect.php");
require_once("../OOP_CLASS/class/common_class.php");
require_once("../OOP_CLASS/function/function.php");
$server=new Main_Class(); 

if(isset($_POST['fromDate']))
{
    $tabledata="";
    $i="1";
    $from=$_POST['fromDate'];
    $to=$_POST['toDate'];
    $sql="SELECT * FROM customer_detalis  WHERE `Date` BETWEEN '$from' AND '$to'";
    $result=$server->fetch_data($sql);
    if($result>0)
    {
        foreach($result as $data)
        {
                $tabledata.="<tr>
                <td>".$i++."</td>
                <td>".$data['Name']."</td>
                <td>".$data['Referance']."</td>
                <td>".$data['PhoneNo']."</td>
                <td>".$data['Date']."</td>
                <td>".number_format($data['TotalAmount'],2)."</td>
                <td><form action='Design.php' method='post'>
                <input type='hidden' name='refid' value='".$data['Referance']."'>
                <input type='submit'  class='btn btn-primary' value='Print' target='_blank'></td>
                </form>
            </tr>";
        }
    }
   else
   {
    echo "<td>Record Not Found</td>";
   }
     
   echo $tabledata;
}

if(isset($_POST['Paymentinfo']))
{
    $tabledata="";
    $i="1";
    $from=$_POST['from'];
    $to=$_POST['to'];
    $sql="SELECT * FROM paymentdetalis  WHERE `Date` BETWEEN '$from' AND '$to'";
    $result=$server->fetch_data($sql);
    if($result>0)
    {
        foreach($result as $data)
        {
                $tabledata.="<tr>
                <td>".$i++."</td>
                <td>".$data['Name']."</td>
                <td>".$data['Referance']."</td>
                <td>".$data['TransactionID']."</td>
                <td>".$data['PhNo']."</td>
                <td>".number_format($data['Amount'],2)."</td>
                <td>".$data['Date']."<td>
            </tr>";
        }
    }
   else
   {
    echo "<td>Record Not Found</td>";
   }
     
   echo $tabledata;
}

?>