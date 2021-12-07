<?php
session_start();
include_once 'includes/config.php';
$oid=intval($_GET['oid']);
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Order Tracking Details</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
 <link rel="icon" href="assets/logo.png" type="image/icon type">
</head>
<body>
<div class="logo">
		<img class="logo" style="  border: 0x solid #ddd;padding: 1x;width: 275px;" src="assets/moveee.png">
		
</div>
<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Order Tracking Details !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>order Id:</b></td>
      <td  class="fontkink"><?php echo $oid;?></td>
    </tr>
    <?php 
$ret = mysqli_query($con,"SELECT bill.status as status,bill.delstatus as delstatus,bill.deldate as deldate,seller.fname as fname ,seller.lname as lname,seller.phone as phone,seller.email as email,seller.shopadr as shopadr,seller.dist as dist,seller.state as state,seller.zipcode as zipcode FROM bill,seller WHERE seller.sellerid=bill.sellerid and corderid='$oid' and delstatus!=' '");
$num=mysqli_num_rows($ret);
if($num>0)
{
while($row=mysqli_fetch_array($ret))
      {
     ?>
		
    
    
    
     <tr height="30">
      <td  class="fontkink1"><b>Completion Status:</b></td>
      
      <td  class="fontkink"><?php echo $row['status'];?></td>
    </tr>
     <tr height="30">
      <td  class="fontkink1"><b>Pickup  Status</b></td>
      <td  class="fontkink"><?php echo $row['delstatus'];?></td>
    </tr>
    <tr height="30">
      <td class="fontkink1" ><b>Pickup Date:</b></td>
  
      <td  class="fontkink"><?php echo $row['deldate'];?></td>
    </tr>
    <tr height="60">
      <td class="fontkink1" ><b>Seller Details:</b></td>
  
      <td  class="fontkink"><?php echo $row['fname']." ".$row['lname'];?><br><?php echo $row['phone'].",".$row['email'];?></td>
    </tr>
     <tr height="45">
      <td class="fontkink1" ><b>Pickup Location:</b></td>
  
      <td  class="fontkink"><?php echo $row['shopadr'].",".$row['dist'];?><br><?php echo $row['state'].",".$row['zipcode'];?></td>
    </tr>

   
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } }
else{
   ?>
   <tr>
   <td colspan="2">Order Yet To Be Processed</td>
   </tr>
   <?php  }
$st='Pickup Done';
   $rt = mysqli_query($con,"SELECT * FROM bill WHERE corderid='$oid'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['delstatus'];
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
      Product Pickup successful</b></td>
   <?php }
 
  ?>
</table>
 </form>
</div><!--/.content--><button class="btn btn-primary" onclick="window.print()">Print this page</button>

</body>
</html>

     
