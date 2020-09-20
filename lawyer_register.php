<?php
include('header.php'); 
session_start();
include('indexDB.php');
$username = $name = $surname = $email = $password = $cpassword = $phone = $lno ="";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$usernameErr = $nameErr = $surnameErr = $emailErr = $passwordErr = $cpasswordErr = $phoneErr = $lnoErr= "";
$b=true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	 if (empty($_POST["name"]))
			{
				$nameErr = "*name is required";
				$b=false;
		    } 
			else 
			{
				$name = test_input($_POST["name"]);
				 if (!preg_match('/^[\p{L} ]+$/u', $name))
				 {
						 $nameErr = 'Name must contain letters and spaces only!';
						 $b=false;
				 }
		    }
    if (empty($_POST["username"])) {
        $usernameErr = "*Username is required";
        $b=false;
      } else {
        $username = test_input($_POST["username"]);
         if (!preg_match("/^[a-zA-Z0-9]*$/",$username) || $username=='') {
          $usernameErr = "*Only letters and numbers allowed";
          $b=false; 
        }
      }
 
  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
    $b=false;
  } else {
    $email = test_input($_POST["email"]);
     if (!preg_match("/^[a-zA-Z0-9\.]*@[a-z\.]{1,}[a-z]*$/",$email) || $email=='') {
      $emailErr = "*Enter a Valid Email"; 
      $b=false;
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "*Password is required";
    $b=false;
  } else {
    $password = test_input($_POST["password"]);
     if (!preg_match("/^[a-zA-Z0-9]{8,}$/",$password) || $password=='') {
      $passwordErr = "*Enter minimum 8 characters ";
      $b=false;
    }
  }

  if (empty($_POST["confirm"])) {
    $cpasswordErr = "*Confirmation of Password is required";
    $b=false;
  } else {
    $cpassword = test_input($_POST["confirm"]);
    $password= test_input($_POST["password"]);
    if (strcmp($password,$cpassword)!=0) {
      $cpasswordErr = "*Password does not match ";
      $b=false;
    }
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "*Contact Number is required";
    $b=false;
  } else {
    $phone = test_input($_POST["phone"]);
    if(!preg_match("/^[0-9]{10,10}$/",$phone) || $phone==''){
    	$phoneErr = "*Enter A Valid Contact Number";
    	$b=false;
		}
	}
		if (empty($_POST["lno"])) {
			$lnoErr = "*License Number is required";
			$b=false;
		} else {
			$lno = test_input($_POST["phone"]);
			if(!preg_match("/^[0-9]{5,10}$/",$phone) || $phone==''){
				$lnoErr = "*Enter only digits";
				$b=false;
			}
  }
}
if($b==true && isset($_POST['submit']))
{
		$sql = mysqli_query($conn,"INSERT INTO `lawyer_reg`(`name`,`username`, `lno`, `email`, `phone`, `password`) VALUES ('$name','$username', $lno,'$email','$phone','$password')");
		if($sql==true){
		header('Location: lawyer_login.php');
		}else{
			echo "<script>alert('username or password incorrect')</script>";
		}
}
?>

<style type="text/css">
body{
background-repeat:no-repeat;
background-image:url("img/service-bg.jpg");
background-size:cover;
background-attachment:fixed;
color:white;
}
input[type=text],input[type=date],input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    background-color: #e0e0d1;
    color:black;
}

 input[type=submit], input[type=reset] {
    background-color: #e0e0d1;
    border: none;
    color: black;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    font-weight:bold;
}
input[type=radio] {
    height: 15px;
    width: 15px;
    
}



select {
	 background-color: #e0e0d1;
    border: none;
    color: black;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    font-weight:bold;
}
textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    background-color:#e0e0d1;
    color:black;
}
table{
 background-color:black;
  border-collapse: collapse; 
  border: 2px solid navy;
}
form{
opacity:0.7;
}
td{
font-weight:bold;
}
span
{
   color:red;
}

</style>
</head>


 <br><br><br><br><br><br><br><br><br><br><br>

<form id="form" method="post" action="" >

<table cellpadding="7" width="50%" border="0" align="center"cellspacing="2" color="white">

    <!-- I want another button here, center to the tile-->



<tr>
<td colspan=2>
<center><img src="img/logo1.png"></img></center>
</td>
</tr>
<tr>
<td colspan=2>
<center><font size=5><b>REGISTER</b></font></center>
</td>
</tr>


<tr>
<td><b>NAME:</b></td>
<td><input type="text" name="name" size="30">
<span class="error"><?php echo $nameErr; ?></span>
<br><br>
</td>
</tr>
<tr>
<td><b>USERNAME:</b></td>
<td><input type="text" name="username" size="30">
<span class="error"><?php echo $usernameErr; ?></span>
<br><br>
</td>
</tr>
<tr>
<td><b>License number</b></td>
<td><input type="text" name="lno" size="30">
<span class="error"><?php echo $lnoErr; ?></span>
<br><br>
</td>
</tr>
<tr>
<td>EMAIL ID:</td>
<td><input type="text" name="email"  size="30">
<span class="error"><?php echo $emailErr; ?></span>
  <br><br>
</td>
</tr>
<tr>
<td>PHONE NO:</td>
<td><input type="text" name="phone"  size="30">
<span class="error"><?php echo $phoneErr; ?></span>
  <br><br>
</td>
</tr>
<tr>

<tr>
<td><b>PASSWORD:</b></td>
<td><input type="password" name="password" size="30">
<span class="error"><?php echo $passwordErr; ?></span>
  <br><br>
</td>
</tr>
<tr>
<td><b> CONFIRM PASSWORD:</b></td>
<td><input type="password" name="confirm" size="30">
<span class="error"><?php echo $cpasswordErr; ?></span>
  <br><br>
</td>
</tr>
<tr>
	<br><br>
</td>
</tr>
<tr>
<td><input type="reset" value="Reset"></td>
<td><input type="submit" value="Register" name="submit">
<div style = "font-size:20px; color:#cc0000; margin-top:10px"></div>
</td>
</tr>
</table>
<br><br><br><br><br><br><br><br><br><br>
</form>
<?php
include('footer.php');
?>