
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seller</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script type="text/javascript">

</script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>		
<?php 



$query=mysqli_query($con,"select customer.customerid as customerid from customer,morder,seller,corder where morder.customerid=customer.customerid and corder.sellerid=seller.sellerid and corder.morderid=morder.morderid and seller.email='".$_SESSION['alogin']."'");

if(!$query)
{echo "query fail";}
$cntt=0;
while($row=mysqli_fetch_array($query))
{
?>										
								<?php $cntt++;;?>	

										<?php  } ?>	
<?php 
$queryy=mysqli_query($con,"select remark from seller where seller.email='".$_SESSION['alogin']."'");
if(!$queryy)
{echo "query fail";}
?>		
<?php 
$query=mysqli_query($con,"select corderid from corder,seller where  corder.sellerid=seller.sellerid and seller.email='".$_SESSION['alogin']."'");
if(!$query)
{echo "query fail";}
$cnttt=0;
while($row=mysqli_fetch_array($query))
{
?>										
								<?php $cnttt++;;?>	

										<?php  } ?>	
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>WELCOME SELLER!!</h3>
								&nbsp
								
									
										<div class="module">
										<div class="module-bodyy">
							 <h4>Number of Customers:</h4>&nbsp
							 <h3><?php echo ("$cntt");?></h3>

									</div>
										</div>
										<div class="module">
										<div class="module-bodyy">
							 <h4>Number of Sales:</h4>&nbsp
							 <h3><?php echo ("$cnttt");?></h3>

									</div>
										</div>
										<div class="module">
										<div class="module-bodyy">
							 <h4>Remark:</h4>
							 <h3>
								 <?php $queryy=mysqli_query($con,"select remark from seller where email='".$_SESSION['alogin']."'");


				while($row=mysqli_fetch_array($queryy))
				{
					?>									
									
										
											<?php echo htmlentities($row['remark']);?>
										
										
										<?php  } ?></h3>

									</div>
										</div>
										
										</div>
									</div>
								</div>
							</div>
	
						</div>
					</div><!--/.container-->
			</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
<?php } ?>
