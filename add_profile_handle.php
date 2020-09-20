<?php

include('header_lawyer.php');
include("indexDB.php");
session_start();
if(isset($_POST['submit']))
{
	$lid=$_POST['lid'];
	$experience=$_POST['experience'];
	$lang=$_POST['lang'];
	$practice_area=$_POST['practice_area'];
	$specialization=$_POST['specialization'];
	$courts=$_POST['courts'];
	 $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
	         move_uploaded_file($_FILES['image']['tmp_name'],'media/lawyer/'.$image);
			 
			$sql="INSERT INTO `lawyer`(`image`, `lawyer_reg_id`, `experience`, `language`, `practice_area`, `specialization`, `courts`, `status`)
                    	VALUES ('$image','$lid','$experience','$lang','$practice_area','$specialization','$courts','1')";
	/*if (mysqli_query($conn, $sql)) 
				 {
				 //header('location:product.php');
	 
				 } else
				 {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                 }
		 
		       die();	*/
	$res=mysqli_query($conn,$sql);
	    if($res==true)
		{
				echo "<script>alert('Profile Details Add succesfully')</script>";
				echo "<script>location.href='profile.php'</script>";
		}
		
	
	
	
}

?>