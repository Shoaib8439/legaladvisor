<?php 
include('header.php');
include('indexDB.php');
$username = $name=$email = $password = $cpassword = $phone = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$usernameErr = $emailErr = $nameErr= $passwordErr = $cpasswordErr = $phoneErr = "";
$b=true;
if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
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
			
		   if (empty($_POST["username"]))
			{
				$usernameErr = "*Username is required";
				$b=false;
		    } 
			else 
			{
				$username = test_input($_POST["username"]);
				 if (!preg_match("/^[a-zA-Z0-9]*$/",$username) || $username=='')
					 {
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
}
if($b==true && isset($_POST['submit']))
{
	//$hashPassword = md5($password);
    $sql1 = "INSERT INTO `user_reg`(`name`,`username`, `email`, `phone`, `password`,`status`) VALUES ('$name','$username','$email','$phone','$password','1')";
//	$res=$conn->query($sql1);
if ($conn->query($sql1) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();
	header('Location: client_login.php');
}
?>
<style type="text/css">
body{
background-repeat:no-repeat;
background-image:url("img/bg.jpg");
background-size:cover;
background-attachment:fixed;
color:white;
}

</style>

<section class="page-section categories-page">
  <br><br><br><br><br><br><br><br><br><br><br><br>
          <div class="container">
<h1>USER Registeration Form</h1>
				<form id="contact-type" method="post" action="">
								<div class="form-group">
								<label>Name</label>
									<input type="text" name="name" class="form-control" placeholder="Enter name" required>
									<span class="error"><?php echo $usernameErr; ?></span>										
									</div>
							    <div class="form-group">
								<label>Username</label>
									<input type="text" name="username" class="form-control" placeholder="Enter username" required>
									<span class="error"><?php echo $usernameErr; ?></span>										
									</div>
								<div class="form-group">
								<label>Email Id</label>
									<input type="text" name="email" class="form-control" placeholder="Enter Email id" required>
								    <span class="error"><?php echo $emailErr; ?></span>
								</div>
								<div class="form-group">
								<label>Mobile No.</label>
									<input type="text" name="phone" class="form-control" placeholder="Enter mobile no." required>
								    <span class="error"><?php echo $phoneErr; ?></span>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
									<span class="error"><?php echo $passwordErr; ?></span>

								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" name="confirm" class="form-control" placeholder="Password" required>
								    <span class="error"><?php echo $cpasswordErr; ?></span>

								</div>
								<button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Register</button>
							     
							  
							  
							  
							 
				<br><br><br><br><br><br><br><br><br><br>
				</form>
		</div>  	
</section>
<?php
include('footer.php');
?>