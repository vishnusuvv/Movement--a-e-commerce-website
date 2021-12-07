
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
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
//for getting product id
$quer=mysqli_query($con,"select max(productid) as pid from products");
	$result=mysqli_fetch_array($quer);
	 $productid=$result['pid']+1;
	$dir="productimages/$productid";
if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}

	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]);
$sqll=mysqli_query($con,"insert into products(qty,categoryid,subcategoryid,productName,sellerid,unitprice,sellingprice,decs,maxsize,minsize,pavailability,productImage1,productImage2,productImage3) values('$qty','$category','$subcat','$productname','$sellerid','$unitprice','$sellingprice','$decs','$minsize','$maxsize','$pavailability','$productimage1','$productimage2','$productimage3')");
if(!$sqll)
{echo "fail";}
else{$_SESSION['msg']="Product Inserted Successfully !!";}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Seller| Add Product</title>
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
								<h3>Add Product</h3>
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

<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="cat" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['categoryid'];?>"><?php echo $row['categoryName'];?></option>
<?php } ?>
</select>
</div>
</div>

									
<div class="control-group">
<label class="control-label" for="basicinput">Sub Category</label>
<div class="controls">
<select name="subcat" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="">Select Subcategory </option> 
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
$queryyy=mysqli_query($con,"select seller.fname,seller.lname  from seller where email='".$_SESSION['alogin']."'");
while($row=mysqli_fetch_array($queryyy))
{
?>									
							
							<input type="text"  id="fname" value="    <?php  echo $row['fname'];?> <?php  echo $row['lname'];?>" readonly>
										
										<?php  } ?>

</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text"    name="pname"  placeholder="Enter Product Name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price </label>
<div class="controls">
<input type="text"    name="unitprice"  placeholder="Enter Product Price" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Selling Price</label>
<div class="controls">
<input type="text"    name="sellingprice"  placeholder="Enter Product Price" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Description</label>
<div class="controls">
<input type="text" name="decs"  placeholder="Enter Product Description" class="span8 tip">
</textarea>  
</div>
</div>




<div class="control-group">
<label class="control-label" for="basicinput">Product Quantity</label>
<div class="controls">
<input type="text"    name="qty"  placeholder="Enter quantity of the product" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Product Measure limit</label>
<div class="controls">
<input type="text"    name="minsize"  placeholder="ENTER THE MAXIMUM SIZE" class="span8 tip" required>
<input type="text"    name="maxsize"  placeholder="ENTER THE MINIMUM SIZE" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Availability</label>
<div class="controls">
<select   name="pavailability"  id="pavailability" class="span8 tip" required>
<option value="">Select</option>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
</select>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image1</label>
<div class="controls">
<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Image2</label>
<div class="controls">
<input type="file" name="productimage2"  class="span8 tip" required>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image3</label>
<div class="controls">
<input type="file" name="productimage3"  class="span8 tip">
</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit"  name="submit" class="btn btn-primary">Submit</button>
											</div>
											<center><br><br><label class="label" for="basicinput">5% of all sales is the company's cut.</label></center>
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
