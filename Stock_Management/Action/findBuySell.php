<?php 
require_once("../OOP_CLASS/db-connect/connect.php");
require_once("../OOP_CLASS/class/common_class.php");
require_once("../OOP_CLASS/function/function.php");
$server=new Main_Class(); 

 if(isset($_POST['Sellinfo']))
    {
        $allsellinfo="";
        $i="1";
        $res=1;
        $From=$_POST['from'];
        $To=$_POST['to']; 
        $sql="SELECT *, SUM(availability.Quantity) FROM availability LEFT JOIN itemes ON availability.ItemCode=itemes.ItemCode
        LEFT JOIN category ON category.Id=itemes.ItemCategory  WHERE Type='BUY' && availability.date BETWEEN '$From' AND '$To' GROUP BY availability.ItemCode";
        $result=$server->fetch_data($sql);
        if($result)
        {
            foreach($result as $row)
            {
                    $allsellinfo.="<tr>
                    <td>".$i++."</td>
                    <td>". $row['CategoryName']."</td>
                    <td>". $row['ItemName']."</td>
                    <td>". $row['ItemCode']."</td>         
                    <td>".$row['SUM(availability.Quantity)']."</td>
                    <td>".$row['date']."</td>
                    </tr>";
            }
        }
        
    else
    {
        echo $res;
    }
        
    echo $allsellinfo;
 }
//Buying Detalis

if(isset($_POST['buyfrom']))
{
    $From=$_POST['buyfrom'];
    $To=$_POST['buyto'];
    $allsellinfo="";
    $i="1";
    $sql="SELECT *, SUM(availability.Quantity) FROM availability LEFT JOIN itemes ON availability.ItemCode=itemes.ItemCode
    LEFT JOIN category ON category.Id=itemes.ItemCategory  WHERE Type='SELL' && availability.date BETWEEN '$From' AND '$To' GROUP BY availability.ItemCode";
    $result=$server->fetch_data($sql);
    if($result)
    {
        foreach($result as $row)
        {
                $allsellinfo.="<tr>
                <td>".$i++."</td>
                <td>". $row['CategoryName']."</td>
                <td>". $row['ItemName']."</td>
                <td>". $row['ItemCode']."</td>         
                <td>".$row['SUM(availability.Quantity)']."</td>
                <td>".$row['date']."</td>
                </tr>";
        }
    }
    
else
{
    echo "<td>Record Not Found</td>";
}
    
echo $allsellinfo;
}


?>