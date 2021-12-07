<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
    include("connection.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Signin </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- <script type="text/javascript">
  function check()
  {
    var v1=document.signup.firtname.value;
    var v2=document.signup.lastname.value;
    var v3=document.signup.email.value;
    var v4=document.signup.contact.value;
    var v5=document.signup.password.value;
    var v6=document.signup.cpassword.value;

    var pn1=/^[A-Z a-z]+$/;
    if(!(v1.match(pn1)))
    {
      alert("Invalid name in Firstname");
      return false;
    }
    else if(!(v2.match(pn1)))
    {
      alert("Invalid name in Lastname");
      return false;
    }
     var pn2="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$";
    //var pn2=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!(v3.match(pn2)))
    {
      alert("Invalid Email");
      return false;
    }
    var pn3=/^\d{10}$/;
    if(!(v4.match(pn3)))
    {
      alert("Invalid Phone number");
      return false;
    }
    else if((v5.localecompare(v6)))
    {
      alert("Incorrect password");
      return false;
    }
  }
</script> -->


  </head>
    <?php
    $msg="";
    $firstname="";            
    $lastname="";
    $email="";
    $dob="";
    $housename= "";
    $m_id="";
            $street = "";
            $state= "";
            $pincode = "";
            $password = "";
            $cpassword = "";



        if(isset($_POST['signup'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $dob = $_POST['dob'];
            $housename = $_POST['housename'];
            $street = $_POST['street'];
            $state=$_POST['state'];
            $pincode = $_POST['pincode'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
           $message = "$lastname $firstname would like to request an account.";

           if($m_id==''){
        $query="select * from tbl_manager where firstname='$firstname'";
    }else{
         $query="select * from tbl_manager where firstname='$firstname' and m_id!='$m_id'";
    }    
    if(mysqli_num_rows(mysqli_query($con,$query))>0){
   $msg="ACCOUNT EXISTS";
     }
     else{
     if($m_id==''){
  
           
            $query = "INSERT INTO requests(firstname,lastname,email,contact,dob, housename,street,state,pincode, password,cpassword,message, date) VALUES ('$firstname', '$lastname', '$email', '$contact', '$dob', '$housename', '$street','$state','$pincode', '$password', '$cpassword', '$message', CURRENT_TIMESTAMP)";
            //echo $query;
            if(performQuery($query)){
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }
        }}}
    
    ?>
  <body class="text-center">
      <div class="container">
            <form method="post" class="form-signin" name="signup" onsubmit="return check();">
             
              <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>
              <center><table>
              <tr><td>
              Firstname:<input name="firstname" type="text" pattern="[A-Za-z]{1,32}" id="firstname" class="form-control" placeholder="Firstname" required autofocus>
                </td>
                <td>
            Lastname:<input name="lastname" type="text" pattern="[A-Za-z]{1,32}" id="lastname" class="form-control" placeholder="Lastname" required autofocus>
              </td></tr>
              <tr><td>
              Email:<input name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email" class="form-control" placeholder="Email address" required autofocus>
              </td></tr>
                <tr><td>
              Contact:<input name="contact" type="text" pattern="[6-9]{1}[0-9]{9}" title="Enter valid number"  id="contact" class="form-control" placeholder="Phone No" required autofocus>
              </td>
                <td>
              Date of birth:<input name="dob"  max="1985-01-01" type="date" id="dob" class="form-control" placeholder="Date of birth" required autofocus>
              </td></tr>
                <tr><td>
              House No/Name:<input name="housename" type="housename" id="housename" class="form-control" placeholder="House No/Name" required autofocus>
              </td>
                <td>
              Street:<input name="street" type="street" id="street" class="form-control" placeholder="Street name" required autofocus>
              </td></tr>
              <tr><td>
              State:<input name="state" type="street"  id="state" class="form-control" placeholder="State" required autofocus>
              </td></tr>
            <tr><td>
              Pincode:<input name="pincode" type="text" pattern="[4-7]{1}[0-9]{5}" id="pincode" class="form-control" placeholder="Enter pincode" required autofocus>
              </td></tr>

              <tr><td>
              Password:<input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
              </td>
              <td>
                Confirm Password:<input name="cpassword" type="password" id="cpassword" class="form-control" placeholder="Confirm Password" required></td></tr>
              <tr><td>
              <br>
       
              <button name="signup" class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
              <?php echo $msg ?>
              <a href="login.php" class="mt-5 mb-3 text-muted">Already have account?</a>
              </td></tr>
              </table></center>
            </form>
          </div>
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
