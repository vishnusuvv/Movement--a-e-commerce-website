<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	if(isset($_POST['update']))
	{
			$name=$_POST['name'];
	$gender=$_POST['gender'];
	$shoulder=$_POST['shoulder'];
	$uprbody=$_POST['uprbody'];
	$lwrbody=$_POST['lwrbody'];
	$sleeve=$_POST['sleeve'];
	
	$chestbust=$_POST['chestbust'];
	$abdomen=$_POST['abdomen'];
	$waist=$_POST['waist'];
	$thigh=$_POST['thigh'];
	$calf=$_POST['calf'];
	$ankle=$_POST['ankle'];
	$inseam=$_POST['inseam'];
	$outseam=$_POST['outseam'];
if($name=="user3")
		{
			$query=mysqli_query($con,"update measure set gender='$gender',shoulder='$shoulder',uprbody='$uprbody',lwrbody='$lwrbody',sleeve='$sleeve',chestbust='$chestbust',abdomen='$abdomen',waist='$waist',thigh='$thigh',calf='$calf',ankle='$ankle',inseam='$inseam',outseam='$outseam' where name='user3' and customerid='".$_SESSION['id']."'");
		}
else if($name=="user2")
		{
			$query=mysqli_query($con,"update measure set gender='$gender',shoulder='$shoulder',uprbody='$uprbody',lwrbody='$lwrbody',sleeve='$sleeve',chestbust='$chestbust',abdomen='$abdomen',waist='$waist',thigh='$thigh',calf='$calf',ankle='$ankle',inseam='$inseam',outseam='$outseam' where  name='user2' and customerid='".$_SESSION['id']."'");	
		}
else{
	$query=mysqli_query($con,"update measure set gender='$gender',shoulder='$shoulder',uprbody='$uprbody',lwrbody='$lwrbody',sleeve='$sleeve',chestbust='$chestbust',abdomen='$abdomen',waist='$waist',thigh='$thigh',calf='$calf',ankle='$ankle',inseam='$inseam',outseam='$outseam' where name='$name' and customerid='".$_SESSION['id']."'");	
		}
		if($query)
		{
echo "<script>alert('Your Measurement has been recorded');</script>";

  
header("location:my-cart.php");
		}
	}



date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );




?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Measurement</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">

	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<!-- logo -->
	    <link rel="icon" href="assets/logo.png" type="image/icon type">
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.cnfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cnfpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cnfpass.focus();
return false;
}
return true;
}
</script>

	</head>
    <body class="cnt-home">
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Measurement</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	         					     				<?php

$query=mysqli_query($con,"select * from measure where name='user1' and customerid='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>
	          <span>1</span><?php echo $row['name'];?>
	          <?php } ?>
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<div class="col-md-12 col-sm-12 already-registered-login">

<?php
$query=mysqli_query($con,"select * from measure where name='user1' and customerid='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">
						
						

						<input type="text" name="name" value="<?php echo $row['name'];?>" readonly hidden>
			 
											
						 					
					    <label class="info-title" for="name">Gender<span>*</span></label>
					    
							
							<select name="gender" class="form-control unicase-form-control text-input" required="required" >
						<option value="<?php echo $row['gender'];?>" class="form-control unicase-form-control text-input">Select Gender</option>
						
							<option value="Male">Male</option>
							<option value="Female">Female</option>
        </select><br>
        
        
					    <h4> Measurement </h4>
					  
					

						<div class="form-group">
					    <label class="info-title" for="City. ">Shoulder Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="shoulder" required="required" value="<?php echo $row['shoulder'];?>" minlength="2" maxlength="2">
					  </div>
					  	
					  <div class="form-group">
					    <label class="info-title" for="City. ">Upper Body Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="uprbody" required="required" value="<?php echo $row['uprbody'];?>" minlength="2" maxlength="2">
					  </div>
					  
						<div class="form-group">
					    <label class="info-title" for="City. ">Sleeve Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="sleeve" required="required" value="<?php echo $row['sleeve'];?>" minlength="2" maxlength="2">
					  </div>					  
						
						<div class="form-group">
					    <label class="info-title" for="City. ">Chest/Bust Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="chestbust" required="required" value="<?php echo $row['chestbust'];?>"  minlength="2" maxlength="2">
					  </div>					  
					  
					   <div class="form-group">
					    <label class="info-title" for="City. ">Abdomen Length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="abdomen"  value="<?php echo $row['abdomen'];?>"  maxlength="20">
					  </div>
					  
					  <div class="form-group">
					    <label class="info-title" for="City. ">Lower Body Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="lwrbody" required="required" value="<?php echo $row['uprbody'];?>" minlength="2" maxlength="2">
					  </div>
					  
					   <div class="form-group">
					    <label class="info-title" for="District.">Waist Length <span>*</span></label>
					    <input type="text"class="form-control unicase-form-control text-input"  id="dist" name="waist" required="required" value="<?php echo $row['waist'];?>"  maxlength="20">
					  </div>
					  
					  
					   <div class="form-group">
					    <label class="info-title" for="state.">Thigh length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="thigh"  value="<?php echo $row['thigh'];?>"  maxlength="20">
					  </div>

					   <div class="form-group">
					    <label class="info-title" for="state.">Calf length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="calf"  value="<?php echo $row['calf'];?>"  maxlength="20">
					  </div>					  

					   <div class="form-group">
					    <label class="info-title" for="state.">Ankle length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="ankle"  value="<?php echo $row['ankle'];?>"  maxlength="20">
					  </div>
					  
					   <div class="form-group">
					    <label class="info-title" for="state.">Inseam length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="inseam"  value="<?php echo $row['inseam'];?>"  maxlength="20">
					  </div>
					  
					   <div class="form-group">
					    <label class="info-title" for="state.">Outseam length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="outseam"  value="<?php echo $row['outseam'];?>"  maxlength="20">
					  </div>					  	
					  				  					  
				
				 
					  
					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Done! </button>
					</form>
					<?php } ?>
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  --><div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
						     				<?php

$query=mysqli_query($con,"select * from measure where name='user2' and customerid='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>
	          <span>2</span><?php echo $row['name'];?>
	          <?php } ?>
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse">
						      <div class="panel-body">
						     
					<?php
$query=mysqli_query($con,"select * from measure where name='user2' and customerid='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">
					
					<div class="form-group">
					    
					    <input type="text"  id="name" name="name" required="required" value="user2"  hidden>
					  </div>
			 
					 <div class="form-group">											
					    <label class="info-title" for="name">Gender<span>*</span></label>
					    
							
							<select name="gender" class="form-control unicase-form-control text-input" required="required" >
						<option value="<?php echo $row['gender'];?>" class="form-control unicase-form-control text-input">Select Gender</option>
						
							<option value="Male">Male</option>
							<option value="Female">Female</option>
        </select><br>
        
        
					    <h4> Measurement </h4>
					  
					

						<div class="form-group">
					    <label class="info-title" for="City. ">Shoulder Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="shoulder" required="required" value="<?php echo $row['shoulder'];?>" minlength="2" maxlength="2">
					  </div>
					  	
					  <div class="form-group">
					    <label class="info-title" for="City. ">Upper Body Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="uprbody" required="required" value="<?php echo $row['uprbody'];?>" minlength="2" maxlength="2">
					  </div>
					  
						<div class="form-group">
					    <label class="info-title" for="City. ">Sleeve Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="sleeve" required="required" value="<?php echo $row['sleeve'];?>" minlength="2" maxlength="2">
					  </div>					  
						
						<div class="form-group">
					    <label class="info-title" for="City. ">Chest/Bust Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="chestbust" required="required" value="<?php echo $row['chestbust'];?>"  minlength="2" maxlength="2">
					  </div>					  
					  
					   <div class="form-group">
					    <label class="info-title" for="City. ">Abdomen Length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="abdomen"  value="<?php echo $row['abdomen'];?>"  maxlength="20">
					  </div>
					  
					  <div class="form-group">
					    <label class="info-title" for="City. ">Lower Body Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="lwrbody" required="required" value="<?php echo $row['uprbody'];?>" minlength="2" maxlength="2">
					  </div>
					  
					   <div class="form-group">
					    <label class="info-title" for="District.">Waist Length <span>*</span></label>
					    <input type="text"class="form-control unicase-form-control text-input"  id="dist" name="waist" required="required" value="<?php echo $row['waist'];?>"  maxlength="20">
					  </div>
					  
					  
					   <div class="form-group">
					    <label class="info-title" for="state.">Thigh length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="thigh"  value="<?php echo $row['thigh'];?>"  maxlength="20">
					  </div>

					   <div class="form-group">
					    <label class="info-title" for="state.">Calf length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="calf"  value="<?php echo $row['calf'];?>"  maxlength="20">
					  </div>					  

					   <div class="form-group">
					    <label class="info-title" for="state.">Ankle length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="ankle"  value="<?php echo $row['ankle'];?>"  maxlength="20">
					  </div>
					  
					   <div class="form-group">
					    <label class="info-title" for="state.">Inseam length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="inseam"  value="<?php echo $row['inseam'];?>"  maxlength="20">
					  </div>
					  
					   <div class="form-group">
					    <label class="info-title" for="state.">Outseam length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="outseam"  value="<?php echo $row['outseam'];?>"  maxlength="20">
					  </div>					  	
					  				  					  
				
				 
					  
					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Done! </button>
					</form>
					<?php } ?>
						      </div>
						    </div>
					  	</div>
					  	
					 
					  	<!-- checkout-step-02  -->
					  	 <!-- checkout-step-03  --><div class="panel panel-default checkout-step-03">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
						     				<?php

$query=mysqli_query($con,"select * from measure where name='user3' and customerid='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>
	          <span>3</span><?php echo $row['name'];?>
	          <?php } ?>
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse">
						      <div class="panel-body">
						     
					<?php
$query=mysqli_query($con,"select * from measure where name='user3' and customerid='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">
					
					<div class="form-group">
					   
					      <input type="text"  id="name" name="name" required="required" value="user3" hidden >
					  </div>
			 
					 <div class="form-group">											
					    <label class="info-title" for="name">Gender<span>*</span></label>
					    
							
							<select name="gender" class="form-control unicase-form-control text-input" required="required" >
						<option value="<?php echo $row['gender'];?>" class="form-control unicase-form-control text-input">Select Gender</option>
						
							<option value="Male">Male</option>
							<option value="Female">Female</option>
        </select><br>
        
        
					    <h4> Measurement </h4>
					  
					

						<div class="form-group">
					    <label class="info-title" for="City. ">Shoulder Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="shoulder" required="required" value="<?php echo $row['shoulder'];?>" minlength="2" maxlength="2">
					  </div>
					  	
					  <div class="form-group">
					    <label class="info-title" for="City. ">Upper Body Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="uprbody" required="required" value="<?php echo $row['uprbody'];?>" minlength="2" maxlength="2">
					  </div>
					  
						<div class="form-group">
					    <label class="info-title" for="City. ">Sleeve Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="sleeve" required="required" value="<?php echo $row['sleeve'];?>" minlength="2" maxlength="2">
					  </div>					  
						
						<div class="form-group">
					    <label class="info-title" for="City. ">Chest/Bust Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="chestbust" required="required" value="<?php echo $row['chestbust'];?>"  minlength="2" maxlength="2">
					  </div>					  
					  
					   <div class="form-group">
					    <label class="info-title" for="City. ">Abdomen Length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="abdomen"  value="<?php echo $row['abdomen'];?>"  maxlength="20">
					  </div>
					  
					  <div class="form-group">
					    <label class="info-title" for="City. ">Lower Body Length <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="city" name="lwrbody" required="required" value="<?php echo $row['uprbody'];?>" minlength="2" maxlength="2">
					  </div>
					  
					   <div class="form-group">
					    <label class="info-title" for="District.">Waist Length <span>*</span></label>
					    <input type="text"class="form-control unicase-form-control text-input"  id="dist" name="waist" required="required" value="<?php echo $row['waist'];?>"  maxlength="20">
					  </div>
					  
					  
					   <div class="form-group">
					    <label class="info-title" for="state.">Thigh length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="thigh"  value="<?php echo $row['thigh'];?>"  maxlength="20">
					  </div>

					   <div class="form-group">
					    <label class="info-title" for="state.">Calf length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="calf"  value="<?php echo $row['calf'];?>"  maxlength="20">
					  </div>					  

					   <div class="form-group">
					    <label class="info-title" for="state.">Ankle length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="ankle"  value="<?php echo $row['ankle'];?>"  maxlength="20">
					  </div>
					  
					   <div class="form-group">
					    <label class="info-title" for="state.">Inseam length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="inseam"  value="<?php echo $row['inseam'];?>"  maxlength="20">
					  </div>
					  
					   <div class="form-group">
					    <label class="info-title" for="state.">Outseam length </label>
					    <input type="text" class="form-control unicase-form-control text-input" id="state" name="outseam"  value="<?php echo $row['outseam'];?>"  maxlength="20">
					  </div>					  	
					  				  					  
				
				 
					  
					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Done! </button>
					</form>
					<?php } ?>
						      </div>
						    </div>
					  	</div>
					  	
					 
					  	<!-- checkout-step-03  -->
					  	
					</div><!-- /.checkout-steps --></div>
				</div>

			</div><!-- /.row -->
		</div><!-- /.checkout-box -->


</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
</body>
</html>
<?php } ?>
