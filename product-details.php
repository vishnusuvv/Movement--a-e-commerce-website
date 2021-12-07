<?php 
session_start();
error_reporting(0);
include('includes/config.php');

$pid=intval($_GET['pid']);

 $m=''; 
	if(isset($_POST['update']))
   { 
       $item_id=$_POST['productid'];
        $size=$_POST['size'];

       
       $item_quantity=$_POST['qty'];
        $pric=$_POST['cprice'];
       $spri=$item_quantity*$pric;
     
        $rus=$_SESSION['id'];
   
  /*     $_SESSION['cart'][$iid]['c_qty']=$c_qty;
        header("location:cart.php");*/
    if(isset($_SESSION['id']))
    {
         
         $s="select * from cart where productid='$item_id' AND customerid='$rus'";
         $res=mysqli_query($con,$s);
         if(mysqli_num_rows($res)>0){
          
              $m='Item already exist in Cart';
             
               }
          else
          {
      
           $ql="insert into cart(productid,customerid,qty,size,sprice,uprice) Values('$item_id','$rus','$item_quantity','$size','$spri','$pric')";
              $result=mysqli_query($con,$ql);  
             if($result)
             {
            
                $m='Added to Cart';
                       header("location:my-cart.php");
             } 
             else
             {
                echo "error".mysqli_error($con);
             }  
          } 
     }    
  
   else
   {
    header("location:login.php");
   }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
	    <title>Product Details</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">

	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
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

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
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
<?php
$ret=mysqli_query($con,"select category.categoryName as catname,subcategory.subcategory as subcatname,products.productName as pname from products join category on category.id=products.category join subcategory on subcategory.id=products.subcategory where products.id='$pid'");
while ($rw=mysqli_fetch_array($ret)) {

?>


			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li><?php echo htmlentities($rw['catname']);?></a></li>
				<li><?php echo htmlentities($rw['subcatname']);?></li>
				<li class='active'><?php echo htmlentities($rw['pname']);?></li>
			</ul>
			<?php }?>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product outer-bottom-sm '>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">


					<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

		            <?php $sql=mysqli_query($con,"select categoryid,categoryName  from category");
while($row=mysqli_fetch_array($sql))
{
    ?>
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="category.php?cid=<?php echo $row['categoryid'];?>"  class="accordion-toggle collapsed">
	                   <?php echo $row['categoryName'];?>
	                </a>
	            </div>
	          
	        </div>
	        <?php } ?>
	    </div>
	</div>
</div>
	<!-- ============================================== CATEGORY : END ============================================== -->				
		<!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp">
	<h3 class="section-title">Deals</h3>
	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
		
								   <?php
$ret=mysqli_query($con,"select * from products order by rand() limit 4 ");
while ($rws=mysqli_fetch_array($ret)) {

?>

								        
													<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
								<img src="admin/productimages/<?php echo htmlentities($rws['productid']);?>/<?php echo htmlentities($rws['productImage1']);?>"  width="200" height="334" alt="">
							</div>
							
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($rws['productid']);?>"><?php echo htmlentities($rws['productName']);?></a></h3>
						

							<div class="product-price">	
								<span class="price">
									Rs. <?php echo htmlentities($rws['sellingprice']);?>.00
								</span>
									
							    <span class="price-before-discount">Rs.<?php echo htmlentities($rws['sellingprice']-30);?></span>					
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						
					</div>	
					</div>		
					<?php } ?>        
						
	    
    </div><!-- /.sidebar-widget -->
</div>

<!-- ============================================== COLOR: END ============================================== -->
				</div>
			</div><!-- /.sidebar -->
<?php 
$acc="Accept";
$ret=mysqli_query($con,"select * from products,seller where seller.sellerid=products.sellerid and seller.status='$acc' and products.productid='$pid'");

while($row=mysqli_fetch_array($ret))
{

?>


			<div class='col-md-9'>
				<div class="row  wow fadeInUp">
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

 <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']);?>" href="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage1']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage1']);?>" width="370" height="350" />
                </a>
            </div>




            <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['productName']);?>" href="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage1']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage1']);?>" width="370" height="350" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide2">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage2']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage2']);?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide3">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage3']);?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage3']);?>" />
                </a>
            </div>

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                        <img class="img-responsive"  alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage1']);?>" />
                    </a>
                </div>

            <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage2']);?>"/>
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="admin/productimages/<?php echo htmlentities($row['productid']);?>/<?php echo htmlentities($row['productImage3']);?>" height="200" />
                    </a>
                </div>

               
               
                
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div>

    </div>
</div>     			



<form method="post">
	
					<div class='col-sm-6 col-md-7 product-info-block'>
						
						<div class="product-info">
							
							<center><h2 class="name  "><?php echo htmlentities($row['productName']);?></h2></center>
							<hr>
							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
											<br><span class="label pull-right">  DESCRIPTION :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<?php 
											$se=$row['sellerid'];?>
										
										<br>	<span class="label"><?php echo htmlentities($row['decs']);?> </span><br><br><br>
	
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>
							
							

							



<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
											<span class="label">  Seller Details :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<?php 
											$se=$row['sellerid'];
											$sq=mysqli_query($con,"select * from seller where sellerid=$se");

										while($row1=mysqli_fetch_array($sq))
										{ ?>
											<span  class="label"><?php echo htmlentities($row1['fname']);?> <?php echo htmlentities($row1['lname']);?></span><br>
											<span  class="label"><?php echo htmlentities($row1['shopadr']);?>, <?php echo htmlentities($row1['dist']);?><br> <?php echo htmlentities($row1['state']);?></span><br>
											
											<input type="text" name="sellerid" value="<?php echo htmlentities($row['sellerid']);?>"  readonly hidden>	
												<?php }?>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>

<div class="stock-container info-container m-t-10">
								
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
											<br><span class="label pull-right">  Max Size :</span>
											<br><span class="label pull-right">  Min Size :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<?php 
											$se=$row['sellerid'];?>
										
										<br>	<span class="label"><?php echo htmlentities($row['maxsize']);?> </span>
										<br>	<span class="label"><?php echo htmlentities($row['minsize']);?> </span><br><br><br>
	
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>



<div class="stock-container info-container m-t-10">
					

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<input type="text" readonly hidden  name="cprice" value="<?php echo htmlentities($row['sellingprice']);?>">
											<span class="price ">Rs. <?php echo htmlentities($row['sellingprice']);?></span>
											<span class="price-strike">Rs.<?php echo htmlentities(30+$row['sellingprice']);?></span>
											
										</div>
									</div>




									

								</div><!-- /.row -->
							</div><!-- /.price-container -->

	



	
																		
										

					    
							<div class="stock-container info-container m-t-10">
								
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
									 <br><span class="label pull-right">Size:</span><br>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											
									 <input type="number" class="unicase-form-control text-input " required placeholder="eg:38"name="size" min="<?php echo htmlentities($row['minsize']);?>" max="<?php echo htmlentities($row['maxsize']);?>">
	
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>

							
						
							
							
							 <div class="stock-container info-container m-t-10">
								
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
								<br><span class="label pull-right">Qty:</span><br>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
										
										
												<input type="number" class=" unicase-form-control text-input " min='1' max='5'  name="qty" class="" value="1" required><br><br>
                  <input type="text" name="productid" value="<?php echo $row['productid'];  ?>" hidden>
	
										</div>	
									</div>
								</div><!-- /.row -->	
							</div>
                  
                      
                   
			
       
									
									
									
			<?php 
           
           $p=$row['qty'];
            /*echo $p;*/
            if($p > 0)
            {?>
				<div class="stock-container info-container m-t-10">
								
								<div class="row">
									<div class="col-sm-3">
										<div class="stock-box">
								
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
			<p><button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button ">Add to cart</button></p>
              <br><p style="color:red"><?php echo $m ?></p>
              

            <?php } else{ ?>
             <p style="color:red">OUT OF STOCK</p> <?php }?>
             </div>	
									</div>
								</div><!-- /.row -->	
							</div>
             </div>
									</div>

									<div class="col-sm-7">

					
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							
</form>
							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->

				
						
							
								

								

				

							
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

<?php } ?>
				<!-- ============================================== UPSELL PRODUCTS ============================================== -->

		<?php  ?>
	
		
			
</section><!-- /.section -->


<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div>

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
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
