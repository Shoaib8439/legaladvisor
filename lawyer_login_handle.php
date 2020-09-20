<?php
include("indexDB.php");
session_start();

if(isset($_POST['submit']))
{
	//echo $_POST['username'];
	//echo $_POST['password'];
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		header('location:lawyer_login.php');
	}
	else
	{
        $sql="select * from lawyer_reg where username='".$_POST['username']."' and password='".$_POST['password']."' and status=1";
		$res = mysqli_query($conn, $sql);


		if ($res->num_rows > 0)
			{
				//echo $res;
				while($row = mysqli_fetch_assoc($res)) {
                $id = $row["lid"];
				$name = $row["name"];
				$username = $row["username"];
              }
			//  echo $id;
				//print_r($res);
				$_SESSION["lid"]= $id;
				$_SESSION["name"]= $name;
				$_SESSION["username"]= $username;
				
				header("location:profile.php");
			}
			else{
				echo "<script>alert('username or password incorrect')</script>";
				echo "<script>location.href='lawyer_login.php'</script>";
				}
		
	}  
}




?>