<?php 
include('indexDB.php');

	if(isset($_POST)){
	    $lid=$_POST['lid'];
	    $uid=$_POST['uid'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$query=$_POST['query'];
		$sql="INSERT INTO `contact_lawyer`(`user_id`, `lawyer_id`, `name`, `email`, `query`) VALUES ('$uid',$lid,'$name','$email','$query')";
		$res=mysqli_query($conn,$sql);
		if($res==true){
				echo "<script>alert('Message sent succesfully')</script>";
				echo "<script>location.href='find_lawyer.php'</script>";
			}
		}
/*	
	if(isset($_GET['id']))
	{
	    $id=$_GET['id'];
		//$query="select lid from lawyer where id=$id";
		//$result=mysqli_query($conn, $query);
		//header('location:find_lawyer.php');
	}
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$query=$_POST['query'];
		$sql="INSERT INTO `contact_lawyer`(`lawyer_id`, `name`, `email`, `query`) VALUES('$id','$name','$email','$query')";
		//$res=mysqli_query($conn,$sql); 
		if (mysqli_query($conn,$sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
			//header('location:find_lawyer.php');
	}
	  // header('location:find_lawyer.php');
	*/
	?>