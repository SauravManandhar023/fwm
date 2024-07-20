<?php
// session_start();
// $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
include '../connection.php';
$msg=0;
if(isset($_POST['sign']))
{

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $location=$_POST['district'];

    // $location=$_POST['district'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from delivery_persons where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        // echo "<h1> already account is created </h1>";
        // echo '<script type="text/javascript">alert("already Account is created")</script>';
        echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into delivery_persons(name,email,password,city) values('$username','$email','$pass','$location')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
        // $_SESSION['email']=$email;
        // $_SESSION['name']=$row['name'];
        // $_SESSION['gender']=$row['gender'];
       
        header("location:delivery.php");
        // echo "<h1><center>Account does not exists </center></h1>";
        //  echo '<script type="text/javascript">alert("Account created successfully")</script>'; -->
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
    }
}


   
}
?>





<!DOCTYPE html>
<html lang="en">


  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="deliverycss.css">
  </head>
  <body>
    <div class="center">
      <h1>Register</h1>
      <form method="post" action=" ">
        <div class="txt_field">
          <input type="text" name="username" required/>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required/>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
            <input type="email" name="email" required/>
            <span></span>
            <label>Email</label>
          </div>
          <div class="">
                           <!-- <label for="district">District:</label> -->

              <select id="district" name="district" style="padding:10px; padding-left: 20px;">
                <option value="">Select District</option>
                <option value="bhojpur">Bhojpur</option>
                <option value="dhankuta">Dhankuta</option>
                <option value="ilam">Ilam</option>
                <option value="jhapa">Jhapa</option>
                <option value="khotang">Khotang</option>
                <option value="morang">Morang</option>
                <option value="okhaldhunga">Okhaldhunga</option>
                <option value="pachthar">Pachthar</option>
                <option value="sankhuwasabha">Sankhuwasabha</option>
                <option value="solukhumbu">Solukhumbu</option>
                <option value="sunsari">Sunsari</option>
                <option value="taplejung">Taplejung</option>
                <option value="terhathum">Terhathum</option>
                <option value="udayapur">Udayapur</option>
                <option value="parsa">Parsa</option>
                <option value="bara">Bara</option>
                <option value="rautahat">Rautahat</option>
                <option value="sarlahi">Sarlahi</option>
                <option value="siraha">Siraha</option>
                <option value="dhanusha">Dhanusha</option>
                <option value="saptari">Saptari</option>
                <option value="mahottari">Mahottari</option>
                <option value="bhaktapur">Bhaktapur</option>
                <option value="chitwan">Chitwan</option>
                <option value="dhading">Dhading</option>
                <option value="dolakha">Dolakha</option>
                <option value="kathmandu">Kathmandu</option>
                <option value="kavrepalanchok">Kavrepalanchok</option>
                <option value="lalitpur">Lalitpur</option>
                <option value="makwanpur">Makwanpur</option>
                <option value="nuwakot">Nuwakot</option>
                <option value="ramechap">Ramechap</option>
                <option value="rasuwa">Rasuwa</option>
                <option value="sindhuli">Sindhuli</option>
                <option value="sindhupalchok">Sindhupalchok</option>
                <option value="baglung">Baglung</option>
                <option value="gorkha">Gorkha</option>
                <option value="kaski">Kaski</option>
                <option value="lamjung">Lamjung</option>
                <option value="manang">Manang</option>
                <option value="mustang">Mustang</option>
                <option value="myagdi">Myagdi</option>
                <option value="nawalpur">Nawalpur</option>
                <option value="parwat">Parwat</option>
                <option value="syangja">Syangja</option>
                <option value="tanahun">Tanahun</option>
                <option value="kapilvastu">Kapilvastu</option>
                <option value="parasi">Parasi</option>
                <option value="rupandehi">Rupandehi</option>
                <option value="arghakhanchi">Arghakhanchi</option>
                <option value="gulmi">Gulmi</option>
                <option value="palpa">Palpa</option>
                <option value="dang">Dang</option>
                <option value="pyuthan">Pyuthan</option>
                <option value="rolpa">Rolpa</option>
                <option value="eastern_rukum">Eastern Rukum</option>
                <option value="banke">Banke</option>
                <option value="bardiya">Bardiya</option>
                <option value="western_rukum">Western Rukum</option>
                <option value="salyan">Salyan</option>
                <option value="dolpa">Dolpa</option>
                <option value="humla">Humla</option>
                <option value="jumla">Jumla</option>
                <option value="kalikot">Kalikot</option>
                <option value="mugu">Mugu</option>
                <option value="surkhet">Surkhet</option>
                <option value="dailekh">Dailekh</option>
                <option value="jajarkot">Jajarkot</option>
                <option value="darchula">Darchula</option>
                <option value="bajhang">Bajhang</option>
                <option value="bajura">Bajura</option>
                <option value="baitadi">Baitadi</option>
                <option value="doti">Doti</option>
                <option value="acham">Acham</option>
                <option value="dadeldhura">Dadeldhura</option>
                <option value="kanchanpur">Kanchanpur</option>
                <option value="kailali">Kailali</option>
              </select>

                        
          </div>
          <br>
        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" name="sign" value="Register">
        <div class="signup_link">
          Alredy a member? <a href="deliverylogin.php">Sigin</a>
        </div>
      </form>
    </div>

  </body>
</html>
