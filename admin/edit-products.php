
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$id=$_SESSION['id']; 
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];

		$productname=$_POST['pname'];


	

	$sellingprice=$_POST['sellingprice'];

	$pavailability=$_POST['pavailability'];

	
$sql=mysqli_query($con,"update products set categoryid='$category',subcategoryid='$subcat',productName='$productname',pavailability='$pavailability',sellingprice='$sellingprice' where productid='$pid'");
$_SESSION['msg']="Product Updated Successfully !!";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Edit Product</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
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
								<h3>Edit Product</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
				<?php 

$quer=mysqli_query($con,"select products.*,category.categoryName as catname,category.categoryid as cid,subcategory.subcategory as subcatname,subcategory.subcategoryid as subcatid from products join category on category.categoryid=products.categoryid join subcategory on subcategory.subcategoryid=products.subcategoryid where products.productid='$pid'");

while($row=mysqli_fetch_array($quer))
{
  


?>
<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text"    name="pname"  value="<?php echo htmlentities($row['productName']);?>" class="span8 tip" required>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="<?php echo htmlentities($row['cid']);?>"><?php echo htmlentities($row['catname']);?></option> 
<?php $query=mysqli_query($con,"select * from category");
while($rw=mysqli_fetch_array($query))
{
	if($row['catname']==$rw['categoryName'])
	{
		continue;
	}
	else{
	?>

<option value="<?php echo $rw['categoryid'];?>"><?php echo $rw['categoryName'];?></option>
<?php }} ?>
</select>
</div>
</div>

									
<div class="control-group">
<label class="control-label" for="basicinput">Subcategory</label>
<div class="controls">
<select name="subcategory" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcatname']);?></option> 
<?php $query=mysqli_query($con,"select * from subcategory");
while($rw=mysqli_fetch_array($query))
{
	if($row['subcatname']==$rw['subcategory'])
	{
		continue;
	}
	else{
	?>

<option value="<?php echo $rw['subcategoryid'];?>"><?php echo $rw['subcategory'];?></option>
<?php }} ?>
</select>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Seller:</label>
<div class="controls">
<?php $id=$_SESSION['id']; 

	$pid=intval($_GET['id']);// product id
 
$que=mysqli_query($con,"select seller.fname,seller.lname from seller,products where  products.productid='$pid' and products.sellerid=seller.sellerid");

while($row=mysqli_fetch_array($que))
{
										?>									
							
							<input type="text"  id="fname" value="    <?php  echo $row['fname'];?> <?php  echo $row['lname'];?>" readonly>
										
										<?php  } ?>

</div>
</div>






<div class="control-group">
<label class="control-label" for="basicinput">Product Unit Price</label> 
<div class="controls">
<?php 
$id=$_GET['id'];
 
$queryyy=mysqli_query($con,"select products.unitprice from products where  products.productid='$id'");

while($row=mysqli_fetch_array($queryyy))
{
?>
<input type="text"   name="unitprice"  id="Product Unit Price" value="Rs<?php echo htmlentities($row['unitprice']);?>/-" class="span8 tip" readonly> 
	<?php  } ?>


</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Unit Price(Rs)</label> 
<div class="controls">
<?php 
$id=$_GET['id'];
 
$queryyye=mysqli_query($con,"select products.sellingprice from products where  products.productid='$id'");

while($row=mysqli_fetch_array($queryyye))
{
?>
<input type="text"   name="sellingprice"  id="Product Unit Price" value="<?php echo htmlentities($row['sellingprice']);?>" class="span8 tip" required> 
	<?php  } ?>


</div>
</div>







<div class="control-group">
<label class="control-label" for="basicinput">Product Availability</label>
<div class="controls">
<select   name="pavailability"  id="pavailability" class="span8 tip" required>
	<?php 
$id=$_GET['id'];
 
$queryyye=mysqli_query($con,"select products.pavailability as pavailability from products where  products.productid='$id'");

while($row=mysqli_fetch_array($queryyye))
{
?>
<option value=""><?php echo $row['pavailability'];?></option>
<?php  } ?>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
</select>
</div>
</div>

<?php } ?>

	<div class="control-group">
											<div class="controls">
												<button type="submit"  name="submit" class="btn btn-primary">Submit</button>
											</div>
										</div>
									</form>
							</div>
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
