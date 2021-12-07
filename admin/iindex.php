
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
	<title>Admin</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	 <link rel="icon" href="assets/logo.png" type="image/icon type">
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
$queryy=mysqli_query($con,"select sellerid from seller");
if(!$queryy)
{echo "query fail";}
$cnt=0;
while($row=mysqli_fetch_array($queryy))
{
?>										
								<?php $cnt++;;?>	

										<?php  } ?>	
										
										<?php 

$query=mysqli_query($con,"select customerid from customer");
if(!$query)
{echo "query fail";}
$cntt=0;
while($row=mysqli_fetch_array($query))
{
?>										
								<?php $cntt++;;?>	

										<?php  } ?>	
										<?php 
$query=mysqli_query($con,"select morderid from morder ");
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
								<h3>WELCOME ADMINISTRATOR!!</h3>
								&nbsp
								
									<div class="module">
										
										<div class="module-bodyy">
							 <h4>Number of Customers:</h4>&nbsp
							 <h3><?php echo ("$cntt");?></h3>
									</div>
										</div>
										<div class="module">
										<div class="module-bodyy">
							 <h4>Number of Sellers:</h4>&nbsp
							 <h3><?php echo ("$cnt	");?></h3>

									</div>
										</div>
										<div class="module">
										<div class="module-bodyy">
							 <h4>Number of Sales:</h4>&nbsp
							  	 <h3><?php echo ("$cnttt");?></h3>

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
