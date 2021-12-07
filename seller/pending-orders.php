
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-y' );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seller| Pending Orders</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Pending Orders</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1  table-bordered table-striped	 display table-responsive" >
									<thead>
										<tr>
											<th>#</th>
											<th> Customer</th>
											<th width="50">Email /Contact no</th>
											<th width="50"> Address</th>
											<th width="50">Product </th>
											<th >Qty </th>
											<th>Order price</th>
											<th>Order date</th>
											<th>Action</th>
										
										</tr>
									</thead>
								
<tbody>
<?php 
$status='Pickup Done';




$query=mysqli_query($con,"select bill.billid as billid,bill.deldate as deldate, products.productName as productname,
corder.qty as qty,
seller.fname as fname,
seller.lname as lname,
customer.fname as username,
customer.email as useremail,
customer.phone as usercontact,
customer.homeadr as shippingaddress,
customer.city as shippingcity,customer.state as shippingstate,
customer.zipcode as shippingpincode,
morder.customerid as cust,
morder.date as date,
bill.deldate as deldate,
corder.size as size,
morder.morderprice as price

from morder join customer on morder.customerid=customer.customerid  , seller,bill join corder on corder.corderid=bill.corderid ,products

where
products.sellerid=seller.sellerid and

products.productid=corder.productid and

 corder.size=bill.size and

 corder.corderid=bill.corderid and
 corder.morderid=morder.morderid and
 

 
seller.sellerid=corder.sellerid and 
seller.sellerid=bill.sellerid AND 

morder.customerid=customer.customerid and 

bill.customerid=customer.customerid and  
bill.delstatus!='$status'  and
 seller.email='".$_SESSION['alogin']."'");

$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>										
										<tr>
										<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['username']);?></td>
<td><?php echo htmlentities($row['useremail']);?>/<?php echo htmlentities($row['usercontact']);?></td>
<td><?php echo htmlentities($row['shippingaddress'].",".$row['shippingcity'].",".$row['shippingstate']."-".$row['shippingpincode']);?></td>
<td><?php echo htmlentities($row['productname']);?></td>
											<td><?php echo htmlentities($row['qty']);?></td>
											<td><?php echo htmlentities($row['price']);?></td>
											<td><?php echo htmlentities($row['date']);?></td>
											<td>   <a href="updateorder.php?oid=<?php echo htmlentities($row['billid']);?>" title="Update order" target="_blank"><i class="icon-edit"></i></a>
											</td>
											</tr>

										<?php $cnt=$cnt+1; } ?>
										</tbody>
								</table>
							</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;<a href="pending-report.php">GENERATE DATE WISE REPORT </a><br><br>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>
