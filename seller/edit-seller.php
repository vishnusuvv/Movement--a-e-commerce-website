
<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	
	$email=$_POST['email'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$dob=$_POST['dob'];
	$phone=$_POST['phone'];
	$dist=$_POST['dist'];
	$state=$_POST['state'];
	$zipcode=$_POST['zipcode'];
	$adr=$_POST['adr'];
	$bankacc=$_POST['bankacc'];
	$bankifsc=$_POST['bankifsc'];

echo ($email);

$re=mysqli_query($con,"UPDATE `seller` SET `fname`='$fname',`lname`='$lname',`dob`='$dob',`phone`='$phone',`dist`='$dist',`state`='$state',`zipcode`='$zipcode',`shopadr`='$adr',`status`='Change in Information',`bankacc`='$bankacc',`bankifsc`='$bankifsc',`remark`='Wait_for_approval_from_admin' where email='".$_SESSION['alogin']."'");
if(!$re)
{echo ("liv omn".mysqli_error($ret));}


else {
$extra="iindex.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");

}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Portal | Seller login</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.php">
			  		Shopping Portal | Seller
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="http://localhost/shopping/">
						Back to Portal
						
						</a></li>

						

						
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="">
				
					<form class="form-vertical" method="post">
									<?php 

$quer=mysqli_query($con,"select * from seller where email='".$_SESSION['alogin']."'");

while($row=mysqli_fetch_array($quer))
{
  


?>
					
						
						
					
								
								
						</div>
						
						
					
			
						<div class="module">
						
							<div class="module-head">
							<h1>Fill Every Field </h1>
						</div>
						</div>
						
					
						
						<div class="module-head">
							<h2>&nbsp;Personal Information</h2>
								<div class="controls row-fluid">
								&nbsp;	First Name:<br>&nbsp;<input class="login" type="text" id="inputfname" name="fname" value="<?php echo htmlentities($row['fname']);?>" required><br>	
								&nbsp;	Last Name:<br>&nbsp;<input class="login" type="text" id="inputlname" name="lname" value="<?php echo htmlentities($row['lname']);?>" required><br>		
								&nbsp;	Date Of Birth:<br>&nbsp;<input class="login" type="date" min="1980-12-31" max="2010-12-31" id="inputdob" name="dob" value="<?php echo htmlentities($row['dob']);?>" required><br>
								&nbsp;	Phone Number:<br>&nbsp;<input class="login" type="text" pattern="^\d{10}$" id="inputpno" name="phone" value="<?php echo htmlentities($row['phone']);?>" required><br>		
								
														
								</div>
						</div>
						
						<div class="module"></div>
						
						<div class="module-head">
							<h2>&nbsp;Address for Communication </h2>
								<div class="controls row-fluid">
								&nbsp;	District:<br>&nbsp;<input class="login" type="text" id="inputdist" name="dist" value="<?php echo htmlentities($row['dist']);?>" required><br>	
								&nbsp;	State:<br>&nbsp;<input class="login" type="text" id="inputstate" name="state" value="<?php echo htmlentities($row['state']);?>" required><br>	
								&nbsp;	Zipcode:<br>&nbsp;<input class="login" type="text" pattern="[4-7]{1}[0-9]{5}" id="inputzip" name="zipcode" value="<?php echo htmlentities($row['zipcode']);?>" required><br>	
								&nbsp;  Shop Address:<br>&nbsp;<input class="login" type="text" id="inputadr" name="adr" value="<?php echo htmlentities($row['shopadr']);?>" required><br>		
							
														
								</div>
						</div>
						
						<div class="module"></div>
						
						<div class="module-head">
							<h2>&nbsp;Banking Details </h2>
								<div class="controls row-fluid">
								&nbsp;	Bank Account Number:<br>&nbsp;<input class="login" type="text" id="inputbankacc"  name="bankacc" pattern="[0-9]{12,16}"  maxlength='12' minlength='12' value="<?php echo htmlentities($row['bankacc']);?>" required><br>		
									&nbsp; Bank IFSC:<br>&nbsp;<input class="login" type="text" id="inputbankifsc" pattern="^[A-Z]{4}[0][A-Z0-9]{6}$" maxlength='11' minlength='8' name="bankifsc" value="<?php echo htmlentities($row['bankifsc']);?>" required><br>
														
								</div>
						</div>
						
						<?php } ?>
						
							
							
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
							
								<button type="submit" class="btn btn-primary pull-right" name="submit">Submit</button>
									
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2020 movement.com </b> 
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
