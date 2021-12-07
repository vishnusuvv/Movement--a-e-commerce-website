<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
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
	$remark="wait for approval";



$ret=mysqli_query($con,"INSERT INTO seller(email, pwd, fname, lname, dob, phone, dist, state, zipcode, shopadr, bankacc, bankifsc,remark) VALUES ('$email','$pwd','$fname','$lname','$dob','$phone','$dist','$state','$zipcode','$adr','$bankacc','$bankifsc','$remark')");
if(!$ret)
{echo ("DIE $bankifsc".mysqli_error($ret));}

else {
$extra="iindex.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Movement | Seller login</title>
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
			  		Movement | Seller
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">

					<ul class="nav pull-right">

						<li><a href="http://localhost/movement.com/">
						Back to Website

						</a></li>




					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="">
				<div class="module ">
					<form class="form-vertical" method="post">

						<div class="module-head">
							<h1>Sign up</h1>
						</div>
						<div class="module"></div>

						<div class="module-head">
							<h2>&nbsp;Login Credentials</h2>
								<div class="controls row-fluid">
								&nbsp;	Email Id:<br>&nbsp;<input class="login" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="inputemail" name="email" placeholder=" eg:abcd@gmail.com" required><br>
								&nbsp; Password:<br>&nbsp;<input class="login" type="password" pattern=".{6,10}" id="inputpassword" name="pwd" placeholder="Password" required><br>*password length 6-8

								</div>
						</div>


						<div class="module"></div>

						<div class="module-head">
							<h2>&nbsp;Personal Information</h2>
								<div class="controls row-fluid">
								&nbsp;	First Name:<br>&nbsp;<input class="login" type="text" pattern="[A-Za-z]{1,32}" id="inputfname" name="fname" placeholder="First Name" required><br>
								&nbsp;	Last Name:<br>&nbsp;<input class="login" type="text"  pattern="[A-Za-z]{1,32}" id="inputlname" name="lname" placeholder="Last Name" required><br>
								&nbsp;	Date Of Birth:<br>&nbsp;<input class="login" type="date" id="inputdob" name="DOB" placeholder="dob" min="1960-12-31" max="2010-12-31" required><br>
								&nbsp;	Phone Number:<br>&nbsp;<input class="login" type="text"  pattern="^\d{10}$" id="inputpno" name="Phone" placeholder="phone number" required><br>*Enter 10 digit phone no


								</div>
						</div>

						<div class="module"></div>

						<div class="module-head">
							<h2>&nbsp;Address for Communication </h2>
								<div class="controls row-fluid">
								&nbsp;	District:<br>&nbsp;<input class="login" type="text" id="inputdist" name="dist" placeholder="District" required><br>
								&nbsp;	State:<br>&nbsp;<input class="login" type="text" id="inputstate" name="state" placeholder="State" required><br>
								&nbsp;	Zipcode:<br>&nbsp;<input class="login" type="text" pattern="[4-7]{1}[0-9]{5}" id="inputzip" name="Zipcode" placeholder="zipcode" required><br>*Enter 6 digit zipcode<br><br>
								&nbsp;  Shop Address:<br>&nbsp;<input class="login" type="text" id="inputadr" name="adr" placeholder="Address" required><br>


								</div>
						</div>

						<div class="module"></div>

						<div class="module-head">
							<h2>&nbsp;Banking Details </h2>
								<div class="controls row-fluid">
								&nbsp;	Bank Account Number:<br>&nbsp;<input class="login" type="text" pattern="[0-9]{12,16}"  maxlength='12' minlength='12' id="inputbankacc" required name="bankacc" placeholder="Account Number"><br>*Enter 12-16 digit acc no:<br><br>
									&nbsp; Bank IFSC:<br>&nbsp;<input class="login" type="text" pattern="^[A-Z]{4}[0][A-Z0-9]{6}$" required maxlength='11' minlength='8' id="inputbankifsc" name="BANK IFSC" placeholder="eg:ABCD0123456	"><br>

								</div>
						</div>






							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">

								<button type="submit" class="btn btn-primary pull-right"  name="submit">Submit</button>

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
