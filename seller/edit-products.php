
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
	$category=$_POST['cat'];
	$subcat=$_POST['subcat'];

		$productname=$_POST['pname'];

$queryyy=mysqli_query($con,"select sellerid from seller where email='".$_SESSION['alogin']."'");
while($row=mysqli_fetch_array($queryyy))
{
								
							
								$sellerid=$row['sellerid'];
										
}
	
	$unitprice=$_POST['unitprice'];
	$sellingprice=$_POST['sellingprice'];
	$decs=$_POST['decs'];
		$qty=$_POST['qty'];

	$maxsize=$_POST['maxsize'];
	$minsize=$_POST['minsize'];
	$pavailability=$_POST['pavailability'];
	$productimage1=$_FILES["productimage1"]["name"];
	$productimage2=$_FILES["productimage2"]["name"];
	$productimage3=$_FILES["productimage3"]["name"];
	
$sql=mysqli_query($con,"update products set qty='$qty',categoryid='$category',subcategoryid='$subcat',productName='$productname',sellerid='$sellerid',unitprice='$unitprice',decs='$decs',pavailability='$pavailability',sellingprice='$sellingprice',maxsize='$maxsize',minsize='$minsize', productimage1='$productimage1',productimage2='$productimage2',productimage3='$productimage3' where productid='$pid'");
$_SESSION['msg']="Product Updated Successfully !!";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seller| Edit Product</title>
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
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text"    name="pname"  value="<?php  echo $row['productName'];?>" class="span8 tip" required>
	<?php } ?>
</div>
</div>
	

<div class="control-group">
<label class="control-label" for="basicinput" >Category</label>
<div class="controls">
<select name="cat" class="span8 tip" onChange="getSubcat(this.value);"  required>
	<?php $query=mysqli_query($con,"select category.categoryName as categoryName from category join products where category join products on category.productid=products.productid");
while($row=mysqli_fetch_array($query))
{?>
<option selectedvalue="<?php echo $row['categoryName'];?>"></option> 
<?php } ?>
<?php $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryName'];?></option>
<?php } ?>
</select>
</div>
</div>


<div class="control-group">
	
<label class="control-label" for="basicinput">Subcategory</label>
<div class="controls">
<select name="subcat" class="span8 tip" onChange="getSubcat(this.value);"  required>
		<?php $query=mysqli_query($con,"select subcategory.subcategory as subcategory from subcategory join products where subcategory join products on subcategory.productid=products.productid");
while($row=mysqli_fetch_array($query))
{?>
<option selectedvalue="<?php echo $row['subcategory'];?>"></option> 
<?php } ?>
<?php $query=mysqli_query($con,"select * from subcategory");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['subcategoryid'];?>"><?php echo $row['subcategory'];?></option>
<?php } ?>
</select>
</div>
</div>
									



<div class="control-group">



</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Seller:</label>
<div class="controls">
<?php $id=$_SESSION['id']; 
$queryyy=mysqli_query($con,"select fname,lname from seller where email='".$_SESSION['alogin']."'");
while($row=mysqli_fetch_array($queryyy))
{
?>									
							
							<input type="email"  id="fname" value="    <?php  echo $row['fname'];?> <?php  echo $row['lname'];?>" readonly>
<?php  } ?>

</div>
</div>

<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price </label>
<div class="controls">
<input type="text"    name="unitprice"  value="<?php  echo $row['unitprice'];?>" class="span8 tip" required>
	<?php } ?>
</div>
</div>
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<div class="control-group">
<label class="control-label" for="basicinput">Product Selling Price</label>
<div class="controls">
<input type="text"    name="sellingprice"  value="<?php  echo $row['sellingprice'];?>" class="span8 tip" required>
	<?php } ?>
</div>
</div>
<?php
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<div class="control-group">
<label class="control-label" for="basicinput">Product Quantity</label>
<div class="controls">
<input type="text"    name="qty"  value="<?php  echo $row['qty'];?>" class="span8 tip" required>
	<?php } ?>
</div>
</div>
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<div class="control-group">
<label class="control-label" for="basicinput">Product  Description</label>
<div class="controls">
<input type="text"  name="decs"  placeholder="Enter Product Description" value="<?php  echo $row['decs'];?>" rows="6" class="span8 tip"></textarea>
	<?php } ?>
</div>
</div>

<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>


<div class="control-group">
<label class="control-label" for="basicinput">Product Measure limit</label>
<div class="controls">
<input type="text"    name="minsize"  placeholder='minsize' value="<?php  echo $row['minsize'];?>" class="span8 tip" required>
<input type="text"    name="maxsize"  placeholder='maxsize' value="<?php  echo $row['maxsize'];?>" class="span8 tip" required>
	<?php } ?>
</div>
</div>
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<div class="control-group">
<label class="control-label" for="basicinput">Product Availibility</label>
<div class="controls">
<select   name="pavailability"  id="pavailability" class="span8 tip" required>
<option selectedvalue="<?php  echo $row['pavailability'];?>"><?php  echo $row['pavailability'];?></option>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
		<?php } ?>
</select>
</div>
</div>

<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="control-group">
<label class="control-label" for="basicinput">Product Image1</label>
<div class="controls">
	<input type="text" name="productimage2" value="<?php  echo $row['productImage1'];?>" readonly>
<input type="file" name="productimage1" id="productimage1" value="<?php  echo $row['productImage1'];?>" value="" class="span8 tip" required>	
	<?php } ?>
</div>
</div>

<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<div class="control-group">
<label class="control-label" for="basicinput">Product Image2</label>
<div class="controls">
	<input type="text" name="productimage2" value="<?php  echo $row['productImage2'];?>" readonly>
<input type="file" name="productimage2" value="<?php  echo $row['productImage2'];?>" class="span8 tip" >
	<?php } ?>
</div>
</div>

<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from products where productid='$id'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="control-group">

<label class="control-label" for="basicinput">Product Image3</label>
<div class="controls">
	<input type="text" name="productimage2" value="<?php  echo $row['productImage3'];?>" readonly>
<input type="file" name="productimage3" value="<?php  echo $row['productImage3'];?>"  class="span8 tip">
	<?php } ?>
</div>
</div>


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
