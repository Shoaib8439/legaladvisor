<?php 
	include('header.php');
	include('indexDB.php');
	include('function.inc.php');

		$image='';
		$experience='';
		$language='';
		$practice_area='';
		$specialization='';
		$courts='';
		$check='';
		
		if(isset($_GET['id']) && ($_GET['id'])!='')
	{
		$image_required='';
		$id= $_GET['id'];
		$sql="select * from `lawyer` where `id`='$id'";
		$res=mysqli_query($conn,$sql);
		$check=mysqli_num_rows($res);
		if(check>0)
			{
				$row=mysql_fetch_assoc($res);
				$catagories_id=$row('image');
				$ipc=$row('name');
				$name=$row('email');
				$name=$row('phone');
				
				$name=$row('experience');
				$name=$row('language');
				$name=$row('practice_area');
				$name=$row('specialization');
				$name=$row('courts');

			}
		else
			{
					header('location:lawyer.php');
					
			}
	}
	$msg='';
if(isset($_POST['submit']))
{
		
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$experience=$_POST['experience'];
		$language=$_POST['language'];
		$practice_area=$_POST['practice_area'];
		$specialization=$_POST['specialization'];
		$courts=$_POST['courts'];
		$sql="select * from `lawyer` where email='".$email."'";
		$res=mysqli_query($conn,$sql);
		$check=mysqli_num_rows($res);
		$getData=mysqli_fetch_assoc($res);
		if($check>0)
		{
			if(isset($_GET['id']) && ($_GET['id'])!='')
			{
				$getData=mysqli_fetch_assoc($res);
				$catagories=$row['catagories'];
			}
				/*if(($id==$getData['id'])
				{
					
				}
				else
				{
				   $msg="product already exist. ";
				}*/
		  else
			   {
				$msg="Lawyer already exist. ";
					
			   }
			   
		}
		
		
		
		
		
		if($msg=='')
		{
			 if(isset($_GET['id']) && ($_GET['id'])!='')
			 {
				 //mysqli_query($con,"update product set catagories_id='$catagories_id', name='$name',mrp='$mrp', price='$price', 
				// qty='$qty', short_desc='$short_desc', description='$description', meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword' where id='$id'");
			



			  }
			 
		    else
		    {  $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
	         move_uploaded_file($_FILES['image']['tmp_name'],'../media/lawyer/'.$image);
		     
	         $sql="INSERT INTO `lawyer`(`image`, `name`, `email`, `phone`, `experience`, `language`, `practice_area`, `specialization`, `courts`, `status`)
	                            VALUES ('$image','$name','$email','$phone','$experience','$language','$practice_area','$specialization','$courts','1')";
				
	        }
			 if (mysqli_query($conn, $sql)) 
				 {
				 header('location:lawyer.php');
	 
				 } else
				 {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                 }
		 
		       die();	
		}
}
	 
?>
	<style type="text/css">
* { margin: 0px; padding: 0px; }
body {
	font-size: 120%;
	background: #F8F8FF;
}
.header {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
form, .content {
	width: 40%;
	margin: 10px auto;
	padding: 20px;
	border: 5px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 40px;
	width: 50%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
.profile_info img {
	display: inline-block; 
	width: 50px; 
	height: 50px; 
	margin: 5px;
	float: left;
}
.profile_info div {
	display: inline-block; 
	margin: 5px;
}
.profile_info:after {
	content: "";
	display: block;
	clear: both;
}
</style>
<!-- Hero section -->
	<section class="hero-section set-bg" >
		
	</section>

	<!-- Hero section end -->

	<!-- page -->
	<section class="page-section categories-page">
    <br><br><br><br>
	<div class="filter-search">
		
	</div>
    <div class="container">
   <form method="post" action="add_lawyer.php" enctype="multipart/form-data">
	<div class="input-group">
		<label for="catagories" class=" form-control-label" >Image</label>
		<input type="file" name="image"  class="form-control"  <?php echo $image?>">
	</div>
	<div class="input-group">
		<label>Experience</label><br><br>
		<input type="text" name="experience" required value="<?php echo $experience?>">
	</div>
	<div class="input-group">
		<label>Language Known</label><br><br>
		<input type="text" name="language" required value="<?php echo $language?>">
	</div>
	
	<div class="input-group">
		<label>Practice Area</label><br><br>
		<textarea name="practice_area"  required><?php echo $practice_area?></textarea>
	</div>
	<div class="input-group">
		<label>Specialization</label><br><br>
		<textarea name="specialization"  required><?php echo $specialization?></textarea>
	</div>
	<div class="input-group">
		<label>Courts</label><br><br>
		<textarea name="courts"  required><?php echo $courts?></textarea>
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="submit">Submit</button>
	</div>
	<div font color="red" class="field_error"><?php echo $msg?></div>
</form>
		</div>
	</section>
<?php
include('footer.php');
?>
