<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
    {
header('location:login.php');
}

else{
	if (isset($_POST['csubmit'])) {
		$cvv=$_POST['cvv'];
		$name=$_POST['name'];
		$expiry=$_POST['expiry'];
		$card=$_POST['card'];
		$no=$_POST['no'];
	$o=$_SESSION['id'];
		$as=mysqli_query($con,"insert into card(customerid,no,cvv,type,name,expiry) values ('$o','$no','$cvv','$card','$name','$expiry')");

		if($_POST['card']=="Debit Card")
			{echo "<script>alert('Debit Card Payment Done $o');</script>";}
		else if($_POST['card']=="Credit Card")
			{echo "<script>alert('Credit Card Payment Done');</script>";}
		else
			{echo "<script>alert('Something Horrible Has Happened');</script>";
			}




 $qe="select * from cart where customerid='$o'";
                      $run=mysqli_query($con,$qe);

                      if(!$run)
                      {echo "<script>alert('Something Horrible Has Happened  a b mroderid $a $b $morderid');</script>";
						  mysqli_error($con);
						  die();
						  }
 if(!empty(mysqli_num_rows($run)>0)){
                      while($rowwi=mysqli_fetch_assoc($run))
                      {
                   
                     $subtot=$rowwi['sprice'];
                     $tot+=$subtot;
                     }}
                     
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime=date("Y/m/d");


                      $qw="insert into morder(customerid,date,morderprice,expected) values('$o','$currentTime','$tot','$currentTime')";
                      $ins=mysqli_query($con,$qw);
                      $morderid=mysqli_insert_id($con);
                      echo "<script>alert('Something Horrible Has Happened $morderid $currentTime');</script>";
                    
    
                      
    
$runn=mysqli_query($con,"select cart.cartid as cartid,
cart.size as size,
cart.sprice as sprice,
cart.measureid as measureid, 
products.productid as productid,
    products.productImage1 as productImage1, 
    products.productName as productName,
     cart.qty as qty, 
     products.sellingprice as sellingprice,
     products.sellerid as seller
     
    from cart,products 
    
    where cart.productid=products.productid and 
    cart.customerid='$o'");

			if(!$runn)
                      {echo "<script>alert('Something Horrible Has Happened  a b mroderid $a $b $morderid');</script>";
						  mysqli_error($con);
						  die();
						  }
                     
 if(!empty(mysqli_num_rows($runn)>0)){
                      while($rowwi=mysqli_fetch_assoc($runn))
                      {
						  $a=$rowwi['productid'];
						  
							$b=$rowwi['qty'];
							$c=$rowwi['sprice'];
							
							$d=$rowwi['size'];
							$e=$rowwi['seller'];
							  echo "<script>alert('Something Horrible Has Happened $a $b morderid $morderid');</script>";
							$sql="insert into corder(morderid,productid,qty,price,sellerid,size) values('$morderid','$a','$b','$c','$e','$d')";
							// echo $sql;
							$rt=mysqli_query($con,$sql);


							$corderid=mysqli_insert_id($con);
							 echo "<script>alert('Something Horrible Has Happened corder $corderid');</script>";
							$mm="select * from corder where corderid='$corderid'";
							$mn=mysqli_query($con,$mm);
							if(!$mn){
							mysqli_error($con);}
							while($op=mysqli_fetch_assoc($mn))
							{
								$measureid=$op['measureid'];
								 echo "<script>alert('Something Horrible Has Happened $a $b measureid $measureid');</script>";
								$rot="insert into bill(corderid,customerid,sellerid,totalcost,payseller,size,delstatus) VALUES ('$corderid','$o','$e','$c','$c-30','$d','PENDING FOR APPROVAL')";
								$rto=mysqli_query($con,$rot);
								 if(!$rto)
								{				echo "<script>alert('Something Horrible Has Happened ');</script>";
						  mysqli_error($con);
						  die();
						  }

								}

	$sq67="select * from corder where morderid='$morderid'";
	echo "<script>alert('Something Horrible Has Happened $a $b PRODUCTID $i');</script>";
    $resq=mysqli_query($con,$sq67);
    while($row67=mysqli_fetch_assoc($resq))

    {
      $i=$row67['productid'];
      $p=$row67['qty'];
      $sqq67="select * from products where productid='$i'";
      echo "<script>alert('Something Horrible Has Happened $a $b PRODUCTID $i');</script>";
      $ress67=mysqli_query($con,$sqq67);
      $rop67=mysqli_fetch_assoc($ress67);
       $l=$rop67['qty'];
       $k=$l-$p;
        $s="update products set qty='$k' where productid='$i'";
        $j=mysqli_query($con,$s);

    }
						$s111="delete from cart where customerid='$o'";
						echo "<script>alert('Something Horrible Has Happened $a $b customerid $o');</script>";
      $res111=mysqli_query($con,$s111);
      header("location:order-history.php");}}}







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

	    <title>MOVEMENT |Payment via card</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">

	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
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
	</head>

    <body class="cnt-home">


<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Card Payment</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->


    <!-- panel-heading -->

    <link rel="stylesheet" href="css/mystyles.css">
    <body>
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">	<div class="checkout-box inner-bottom-sm">
			<div class="row">	<div class="checkout-box inner-bottom-sm">
			<div class="row">	<div class="checkout-box inner-bottom-sm">
			<div class="row">	<div class="checkout-box inner-bottom-sm">
			<div class="row"> 	<div class="checkout-box inner-bottom-sm">
			<div class="row">


                  <center>      <h2 class="mb-4">CARD PAYMENT</h2> </center>

		<!-- panel-body  -->

	    <form name="payment" method="post">



        <div class="checkout_form">



            <div class="card_number" id="card-container">
			<!--label class="info-title" >Card Holder: <span>*</span></label-->
        <!--input type="text" required="required" class="form-control unicase-form-control text-input" name="name" placeholder="Name On The Card"-->


	          <label class="info-title" >Card Number: <span>*</span></label>
	          <input type="text" class="input" id="card" class="card_number .input " name="no" minlength='12' maxlength='12' data-mask="0000 0000 0000 0000" placeholder="0000 0000 0000 0000" required="required">
           </div>



           <div class="expiry_date">
	        <label class="info-title" >Expiry:<span>*</span></label>&nbsp;&nbsp;&nbsp;
			<input type="text" name="expiry" minlength='5' maxlength='5'  class="expiry_date .expiry_input "  placeholder="mm/yy" data-mask="00/00" name="expiry" required="required">
			</div>

		<div class="cvc">
          <br><br><br><br>  <label class="expiry_date" >CVV:<span>*</span></label>&nbsp;&nbsp;&nbsp;
      <input type="text" minlength='3' maxlength='3' class="cvc_input" name="cvv" data-mask="000" placeholder="***" required="required"><br>

         <div class="cvc_img">
             ?
            <div class="img">
              <img src="https://i.imgur.com/2ameC0C.png" alt="">
            </div>
		</div>
		</div>

	  <input type="radio" name="card" value="Debit Card" checked="checked"> Debit Card<br>
	     <input type="radio"  name="card" value="Credit Card"> Credit Card<br>


	    <br> <input type="submit" value="PAY" name="csubmit" class="btn btn-primary pull-rigth">

			</div>
	    </form>





<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->


</div >
	</div>
		</div>
			</div >	</div>
			</div >
	</div>
			</div >
	</div>
			</div >
	</div>
			</div ></div ></div >


</body>
<footer>
<?php include('includes/footer.php');?>
</footer>

</html>
<?php } ?>
