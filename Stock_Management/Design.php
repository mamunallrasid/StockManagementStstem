<?php 
require_once 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
require_once("OOP_CLASS/db-connect/connect.php");
require_once("OOP_CLASS/class/common_class.php");
require_once("OOP_CLASS/function/function.php");
$server=new Main_Class(); 
$refid=$_POST['refid'];
// $refid="CCMP04040425";
?>	
            <?php
            $html='<style type="text/css">
            table {width: 100%; border-collapse: collapse;}
            td, th {border: solid 1px black;}
            h1 {text-align: center;}
            th, td {
                padding: 8px;
              }
            span {float: right;}
          </style>
          ';
            $html.='<h2 style="text-align:center;">Invoice</h2><hr>';
            $html.='<div class="row">'; 
             $sql="SELECT * FROM customer_detalis WHERE Referance='$refid'";
							 $result=$server->fetch_data($sql);
							 {
								foreach($result as $row)
								{           
            $PDFName=$row['Name'];
            $html.='<table class="table table-bordered">
             <tbody>
                <td><b>Name:</b></td><td>'.$row['Name'].'</td>
                <td><b>Purches Date:</b>'.$row['PurchesDate'].'</td>
              </tbody>
             <tbody><td><b>Referance No:</b></td><td>'.$row['Referance'].'</td><td><b>Payment Type:</b>'.$row['PaymentType'].'</b></td></tbody>
             <tbody><td><b>Ph No:</b></td><td>'.$row['PhoneNo'].'</td><td></td></tbody>
             <tbody><td><b>Email:</b></td><td>'.$row['Email'].'</td><td></td></tbody>
             
             <tbody><td><b>Address:</b></td><td>'.$row['Address'].'</td><td></td></tbody>
             </table><br>';
         }
     }
     $sql="SELECT * FROM `purches_detalis` LEFT JOIN `itemes` ON  `purches_detalis`.ItemCode=`itemes`.ItemCode LEFT JOIN `customer_detalis` ON  `purches_detalis`.ReferanceNo=`customer_detalis`.Referance WHERE purches_detalis.ReferanceNo='$refid'";
     $result=$server->fetch_data($sql);
      $html.='<table class="table table-bordered">
      <thead>
          <tr>
          <th scope="col">SL</th>
          <th scope="col">Produce Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Amount</th>
          <th scope="col">Total Amount</th>
          </tr>
      </thead>';
      $i=1;
                    foreach($result as $row)
                    {
                        $html.='<tbody>
                        <tr>
                        <th>'.$i++.'</th>
                        <td>'.$row['ItemName'].'</td>
                        <td>'.$row['ItemQuantity'].'</td>
                        <td>'.$row['ItemAmount'].'</td>
                        <td>'. $row['Itemtamount'].'</td>
                        </tr>';
                    }
                    $html.=' <tr>
                    <td colspan="4"><b style="text-align:right; margin-left:750px;">Sub Total:</b></td>
                    <td>'.$row['SubTotal'].'</td>
                    </tr>
                    <tr>
                    <td colspan="4"><b style="text-align:right; margin-left:780px;">Discount:</b></td>
                    <td>'.$row['Discount'].'%</td>
                    </tr>
                    <tr>
                    <td colspan="4"><b style="text-align:right; margin-left:820px;">Tax:</b></td>
                    <td>'.$row['Tax'].'%</td>
                    </tr>
                    <tr>
                    <td colspan="4"><b style="text-align:right; margin-left:742px;">Total Amount:</b></td>
                    <td>'.$row['TotalAmount'].'</td>
                    </tr>
                </tbody>
                </table> <br>';
                if($row['PaymentType']=="Online")
                {
                  $sql="SELECT * FROM `paymentdetalis` WHERE `Referance`='$refid'";
                  $data=$server->single_row_fetch($sql);
                  // print_r($data);
                  $html.='<table class="table table-bordered">
                  <thead>
                      <tr>
                      <th scope="col">Payment Type</th>
                      <th scope="col">Referance</th>
                      <th scope="col">TransactionID</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Date</th>
                      </tr>
                  </thead>';
                  $pay="";
                  $html.='<tbody>
                  <tr>
                  <td>'.$row['PaymentType'].'</td>
                  <td>'.$data['Referance'].'</td>
                  <td>'.$data['TransactionID'].'</td>
                  <td>'.$row['TotalAmount'].'</td>
                  <td>'.$data['Date'].'</td>
                  </tr>
                  </tbody>';
                }
$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render();
// Output the generated PDF to Browser 
$dompdf->stream($PDFName."Invoice", array("Attachment" => 0)); 
?>
