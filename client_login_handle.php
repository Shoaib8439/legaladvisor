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
        $sql="select * from user_reg where username='".$_POST['username']."' and password='".$_POST['password']."' and status='1'";
			$res = mysqli_query($conn, $sql);
		if ($res->num_rows > 0)
			{
				//echo $res;
				while($row = mysqli_fetch_assoc($res))
					{
					   $id = $row["uid"];
						$username = $row["username"];
						$name=$row['name'];
						$email=$row['email'];
                    }
			
				//print_r($res);
			$_SESSION["uid"]= $id;
			$_SESSION["name"]= $name;
			$_SESSION["username"]= $username;
			$_SESSION["email"]= $email;	
			header("location:laws.php");
			}
			else{
			echo "<script>alert('username or password incorrect')</script>";
			echo "<script>location.href='client_login.php'</script>";
				}
			
	}
	  
}




?>