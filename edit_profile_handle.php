<?php
include('indexDB.php');
if(isset($_POST['submit']))
{
	$lid=$_POST['id'];
	$experience=$_POST['experience'];
	$language=$_POST['language'];
	$practice_area=$_POST['practice_area'];
	$specialization=$_POST['specialization'];
	$courts=$_POST['courts'];
	$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
	         move_uploaded_file($_FILES['image']['tmp_name'],'media/lawyer/'.$image);
			 
			$sql="UPDATE `lawyer` SET `image`='$image',`experience`='$experience',`language`='$language',`practice_area`='$practice_area',`specialization`='$specialization',`courts`='$courts',`status`='1' WHERE lawyer_reg_id='$lid'";
	
	$res=mysqli_query($conn,$sql);
	    if($res==true)
		{
				echo "<script>alert('Profile Update succesfully')</script>";
				echo "<script>location.href='profile.php'</script>";
		}
		else
		{
			echo "<script>alert('Error')</script>";
		}
		
	
	
	
}


?>