<?php
session_start();

include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){
$dstatus=$_POST['dstatus'];
$ddate=$_POST['deldate'];
$pstatus=$_POST['pstatus'];//space char
$sql=mysqli_query($con,"update bill set delstatus='$dstatus',status='$pstatus',deldate='$ddate' where billid='$oid'");
echo "<script>alert('Order updated sucessfully...');</script>";
//}
}

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
<title>Update Compliant</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Update Order !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"><b>order Id:</b></td>
      <td  class="fontkink pull-left"><?php echo $oid;?></td>
    </tr>
    <?php 
$ret = mysqli_query($con,"SELECT bill.deldate as deldate,bill.status as status,bill.billid as billid,bill.delstatus as delstatus,morder.morderid as morderid,morder.date as date FROM bill,morder WHERE bill.billid='$oid' and bill.billid=morder.morderid");
     while($row=mysqli_fetch_array($ret))
      {
     ?>
		
    
    
      <tr height="30">
      <td class="fontkink1" ><b>Order Date:</b></td>
      <td  class="fontkink"><?php echo $row['date'];?></td>
    </tr>
       <tr height="30">
      <td class="fontkink1" ><b>Delivery Date:</b></td>
      <td  class="fontkink"><?php echo $row['deldate'];?></td>
    </tr>
     <tr height="30">
      <td  class="fontkink1"><b>Production status:</b></td>
      <td  class="fontkink"><?php echo $row['status'];?></td>
    </tr>
     <tr height="30">
      <td  class="fontkink1"><b>Delivery Status:</b></td>
      <td  class="fontkink"><?php echo $row['delstatus'];?></td>
    </tr>
    

   
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
   <?php } ?>
   <?php 
$st='Pickup Done';
   $rt = mysqli_query($con,"SELECT * FROM bill WHERE billid='$oid'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['delstatus'];
   }
     if($st==$currrentSt)
     { ?>
   <tr><td colspan="2"><b>
      Product Picked Up By Customer </b></td>
   <?php }else  {
      ?>
   
    

     <tr style=''>
      <td class="fontkink1" >Production Status:</td>
      <td class="fontkink" align="justify" ><span class="fontkink">
        <textarea cols="50" rows="7" name="pstatus"  required="required" ></textarea>
        </span></td>
        
    </tr>
    
    <tr height="50">
      <td class="fontkink1">Delivery Status: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="dstatus" class="fontkink" required="required" >
          <option value="">Select Status</option>
                 <option value="Not Ready For Pickup">Not Ready For Pickup</option>
                 <option value="Ready For Pickup">Ready For Pickup</option>
                  <option value="Pickup Done">Pickup Done</option>
        </select>
        </span></td>
    </tr>
      <tr style=''>
      <td class="fontkink1" >Delivery Date:</td>
          <td  class="fontkink">   
      <input name="deldate" type="date" class="txtbox4"  style="cursor: pointer;"  ></td>
     
        </span></td>
        
    </tr>
    
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2"  value="update"   size="40" style="cursor: pointer;" > &nbsp;&nbsp;   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this Window " onClick="return f2();" style="cursor: pointer;"  ></td>
    </tr>
<?php } ?>
</table>
 </form>
</div>

</body>
</html>
<?php } ?>

     
