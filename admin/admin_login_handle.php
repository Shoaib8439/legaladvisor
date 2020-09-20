<?php
include("indexDB.php");
session_start();
if(isset($_POST['submit']))
{
	//echo $_POST['username'];
	//echo $_POST['password'];
	if(empty($_POST['username']) || empty($_POST['password']))
	{
		header('location:client_login.php');
	}
	else
	{
        $sql="select * from admin where username='".$_POST['username']."' and password='".$_POST['password']."'";
			$res = mysqli_query($conn, $sql);
		if ($res->num_rows > 0)
			{
				//echo $res;
				while($row = mysqli_fetch_assoc($res)) {
               $id = $row["id"];
				$name = $row["username"];
              }
			 // echo $id;
				//print_r($res);
				$_SESSION["id"]= $id;
				$_SESSION["name"]= $name;
				
				header("location:dashboard.php");
			}
			else{
				echo "<script>alert('username or password incorrect')</script>";
				echo "<script>location.href='client_login.php'</script>";
				}
			
	}
	  
}




?>