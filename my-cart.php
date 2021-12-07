<?php
session_start();
error_reporting(0);
include('includes/config.php');


// code for billing address updation
	if(isset($_POST['update']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bdist=$_POST['billingdist'];
		$bpincode=$_POST['billingpincode'];
		$query=mysqli_query($con,"update customer set dist='$bdist',homeadr='$baddress',state='$bstate',city='$bcity',zipcode='$bpincode' where customerid='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Billing Address has been updated');</script>";
   header("location:payment-via-card.php");
		}
	}

if(isset($_POST['updatee']))
{


  $iid=$_POST['cartid'];
  $qty=$_POST['qty'];

  $s="update cart set qty='$qty' where cartid='$iid' ";  $sprice=$_POST['sprice'];
    $uprice=$_POST['uprice'];
  
  $qty=$_POST['qty'];
    $pric=$uprice*$qty;

    if (qty) {
    	# code...
    }
  $s="update cart set qty='$qty' ,sprice='$pric',uprice='$uprice' where cartid='$iid'";




 $qq=mysqli_query($con,"select products.qty as qqttyy from products join cart on products.productid=cart.productid where cart.cartid='$iid'");


$qqr=mysqli_fetch_array($qq);

 if($qqr['qqttyy'] >= $qty)
{


 $r= mysqli_query($con,$s);
	
if(!$r)
  {
    echo "error".mysqli_error($con);
  }
}else {	?><script>alert('QTY COULD NOT BE UPADTED')</script><?php }
}
	//code update cart
if(isset($_POST['update0']))
{


  $iid=$_POST['cartid'];
  $size=$_POST['size'];

  $s="update cart set size='$size' where cartid='$iid' ";
 $r= mysqli_query($con,$s);
  if(!$r)
  {
    echo "error".mysqli_error($con);
  }

}
// Code for Remove a Product from Cart
if(isset($_POST['deletee']))
{
	  $iid=$_POST['cartid'];
	  echo "$iid ";
	   $s="delete  from cart where cartid='$iid'";
	    $r= mysqli_query($con,$s);

  if(!$r)
  {
    echo "error".mysqli_error($con);
  }
 }




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

	    <title>My Cart</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
		<!-- Demo Purpose Only. Should be removed in production : END -->


		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

		<!-- logo -->
	    <link rel="icon" href="assets/logo.png" type="image/icon type">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="cnt-home">



		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<!-- ============================================== HEADER : END ============================================== -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
					<div class="table-responsive">
<form name="cart" method="post">
<?php
$o=$_SESSION[id];

$rt=mysqli_query($con,"select * from cart where customerid=$o");
if(!empty($rt)){
	?>
		<table class="table table-bordered">
			<thead>
				<tr>

					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Size</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-romove item">Remove</th>
					<th class="cart-sub-total item">Price Per unit(Rs)</th>
					<th class="cart-total last-item">Total(Rs)</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>

							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php



     $rez=mysqli_query($con,"select cart.cartid as cartid,cart.uprice as uprice,cart.sprice as sprice,cart.size as size ,products.productid as productid,products.maxsize as maxsize,products.minsize as minsize,
    products.productImage1 as productImage1, products.productName as productName,
     cart.qty as qty, products.sellingprice as sellingprice
    from cart,products where cart.productid=products.productid and cart.customerid='$o'");

			if(empty($rez)){
                     echo "error".mysqli_error($con);
                    }
                    $c=0;$i=0;$tot=0;
                    if(!empty(mysqli_num_rows($rez)>0)){
                    while($ei=mysqli_fetch_assoc($rez)){

                     $cart_id=$ei['cartid'];
                     $qty=$ei['qty'];
                     $i+=$qty;
                  



  ?>


<input type="text" name="cartid" readonly hidden value="<?php echo $ei['cartid'];?>">
<input type="text" name="productid" readonly hidden value="<?php echo $ei['productid'];?>">
			<tr>


					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/productimages/<?php echo $ei['productid'];?>/<?php echo $ei['productImage1'];?>" alt="" width="114" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $ei['productid'];?>" ><?php echo $ei['productName'];?></a></h4>
					</td>








<form method="POST">
	<td class="cart-product-quantity">




				
                          <input type="number" min="1" max="500"  name="cartid" value="<?php echo $ei['cartid'];?>" readonly hidden >

      <input type="number" min="<?php echo $ei['minsize'];?>" max="<?php echo $ei['maxsize'];?>"  name="size" value="<?php echo $ei['size'];?>" class="btn">

                          &nbsp <input type="submit" name="update0" value="update" class="btn  ">

			              
		            </td>

					<td class="cart-product-quantity">




				


      <input type="number" min="1" max="500"  name="cartid" value="<?php echo $ei['cartid'];?>" readonly hidden >
                             <input type="number" min="1" max="5"  name="qty" value="<?php echo $ei['qty'];?>" class="btn" >
                          &nbsp <input type="submit" name="updatee" value="update" class="btn  ">

			              
		            </td>
		            <td class="romove-item">




                      
                          &nbsp <input type="submit" name="deletee" value="delete" class="btn  ">



					</td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $ei['uprice'];?>.00</span></td>
						<input type="text" readonly hidden class="cart-grand-total-price" name="uprice" value="<?php echo $ei['uprice'];?>.00">


					<td class="cart-product-grand-total">
						<span class="cart-sub-total-price"><?php echo $ei['sprice'];?>.00</span>
						<input type="text" readonly hidden class="cart-grand-total-price" name="sprice" value="<?php echo $ei['sprice']; $tot+=$ei['sprice'];  ?>.00<?php }}?>">

				</tr>
</form>
				<?php
$_SESSION['pid']=$pdtid;
				?>

			</tbody><!-- /tbody -->

		</table><!-- /table -->

	</div>
</div><!-- /.shopping-cart-table -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Billing Address</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<form method="POST">
<?php
$query=mysqli_query($con,"select * from customer where customerid='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="form-group">
					    <div class="form-group">
					    <label class="info-title" for="Billing State ">Billing Address  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="billingaddress" value="<?php echo $row['homeadr'];?>" required="required">
					  </div>

 <div class="form-group">
					    <label class="info-title" for="Billing Pincode">Billing city <span>*</span></label>
					    <input type="text" pattern="[A-Za-z]{1,32}" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required" value="<?php echo $row['city'];?>" >
					  </div>
<div class="form-group">
					    <label class="info-title" for="Billing City">Billing District <span>*</span></label>
					    <input type="text" pattern="[A-Za-z]{1,32}" class="form-control unicase-form-control text-input" id="billingdist" name="billingdist" required="required" value="<?php echo $row['dist'];?>" >
					  </div>

						<div class="form-group">
					    <label class="info-title" for="Billing State ">Billing State  <span>*</span></label>
			 <input type="text" pattern="[A-Za-z]{1,32}" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['state'];?>" required="required">
					  </div>
					 
 <div class="form-group">
					    <label class="info-title" for="Billing Pincode">Billing Pincode <span>*</span></label>
					    <input type="text" pattern="[4-7]{1}[0-9]{5}" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['zipcode'];?>" >
					  </div>


					  

					<?php } ?>
					

						</div>

					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div>

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>

					<div class="cart-grand-total">
					Grand Total<span class="inner-left-md"><?php  echo "$tot". ".00"; ?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Submit</button>

						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table>
	<?php } else {echo "Your shopping Cart is empty";}?>
					</div>
				</div>
			</div>
		</form>

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
	<!-- For demo purposes – can be removed on production : End -->
</body>
</html>
