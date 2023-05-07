<?php
include("Header.php");
include("Sidebar.php"); 
?>
     <main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<ul class="db-breadcrumb-list">
					<li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
					<li>Invoice</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Total Purches</h4>
						</div>
						<div>
						<form id="findrange" method="post">
							<div class="widget-inner">
							<label for="from">From</label>
							<input type="text" id="from" name="fromDate">
							<label for="to">To</label>
							<input type="text" id="to" name="toDate">
							<input type="submit" value="Seaech" name="search">
						</form>
						</div>
						<div class="table-responsive">
						<table class="table table-hover" id="allinfo">
							<thead>
								<tr>
								<th scope="col">SL</th>
								<th scope="col">Name</th>
                                <th scope="col">Referance</th>
                                <th scope="col">Ph No</th>
								<th scope="col">Date</th>
								<th scope="col">Total Amount</th>
								<th scope="col">Option</th>
								</tr>
							</thead>
							<?php 
							date_default_timezone_set("Asia/Kolkata");
							$date=date("Y-m-d");
                            $i=1;
                            $sql="SELECT * FROM customer_detalis  WHERE `Date`='$date' ORDER BY csl DESC";
							 if($result=$server->fetch_data($sql))
							 {
								foreach($result as $row)
								{
							?>
							<tbody>
								<tr>
								<th><?php echo $i++;?></th>
								<td><?php echo $row['Name'];?></td>
								<td><?php echo $row['Referance'];?></td>
								<td><?php echo $row['PhoneNo'];?></td>
								<td><?php echo $row['Date'];?></td>
								<td><span>&#8377;</span>&nbsp<?php echo  number_format($row['TotalAmount'],2)?></td>
								<td>
                                    <form action="Design.php" method="post">
                                    <input type="hidden" name="refid" value="<?php echo $row['Referance'];?>">
                                    <input type="submit"  class="btn btn-primary" value="Print"></td>
                                    </form>
								</tr>
								<tr>
							</tbody>
							<?php
							}
						} 
						else
						{
							?>

							<tr><td>No Record Found</td></tr>
							<?php
						} 
							?>
							</table>
							</div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
<?php 
include("Footer.php");
?>
<script>
  $( function() {
    var dateFormat = "yy-mm-dd",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
		  dateFormat: 'yy-mm-dd',
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
		dateFormat: 'yy-mm-dd',
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
  <script>
	$("#findrange").submit(function(e){
		e.preventDefault();
    $.ajax({
		url:'Action/findData.php',
		method:'post',
		data:$(this).serialize(),
		success:function(response)
		{
			$("#allinfo tbody").html(response);
		}
	})
	});
  </script>