<?php
include('header_lawyer.php');
include('indexDB.php');

if(isset($_GET['id'])){
	$id= $_GET['id'];
	//echo $id;
	$sql="select * from `lawyer` where lawyer_reg_id='".$id."'";
	$res=mysqli_query($conn,$sql);
	$check=mysqli_num_rows($res);
	if($check>0)
	{
		$row=mysqli_fetch_assoc($res);
		        $catagories_id=$row['lawyer_reg_id'];
				//$name=$row['name'];
				$experience=$row['experience'];
				$language=$row['language'];
				$practice_area=$row['practice_area'];
				$specialization=$row['specialization'];
				$courts=$row['courts'];
				
	}     
	else
	{
		header('location:profile.php');
		die();
	}
}
?>
<!-- Hero section -->
		<section class="hero-section set-bg" data-setbg="img/bg.jpg">
	<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="#" class="site-logo"><img src="img/logo1.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
               <li><a href="laws.php">Laws</a></li>
			  <li><a href='find_lawyer.php'>Find Lawyer</a></li>
             
			  <li><a href="about.php">About</a></li>
			<li> <li><a href="logout.php"><i class="fa fa-user-circle-o"></i>Logout</a></li></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container hero-text text-white">
			<h2><i>Update profile</h2>
			
		</div>
	</section>
	<!-- Hero section end -->
	<!-- Filter form section -->
	
	<!-- page -->
	<div class="contact-title">
	  
	</div>
	<section class="page-section categories-page">
         <div class="container">

				<form id="contact-type" method="post" action="edit_profile_handle.php" enctype="multipart/form-data">
							  
								<div class="form-group">
									<input type="text" name="id" placeholder="Enter product name" class="form-control" hidden required value="<?php echo $id?>">
								</div>
								<div class="form-group">
									<label>Image</label>
									<input type="file" name="image" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Experience</label>
									<input type="text" name="experience" class="form-control" required value=" <?php echo $experience;?>">
								</div>
								<div class="form-group">
									<label>Languages Spoken</label>
									<input type="text" name="language" class="form-control" required value=" <?php echo $language;?>">
								</div>
								<div class="form-group">
									<label>Practice Area</label>
									<textarea name="practice_area" class="form-control"  required ><?php echo $practice_area;?></textarea>
								</div>
								<div class="form-group">
									<label>Specialization</label>
									<textarea name="specialization" class="form-control" required ><?php echo $specialization;?></textarea>
								</div>
								<div class="form-group">
									<label>Courts</label>
									<textarea name="courts" class="form-control"  required ><?php echo $courts;?></textarea>
								</div>
								<button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Submit</button>
								
							  
							 
				<br><br><br><br><br><br><br><br><br><br>
				</form>
		</div>  	  
	</section>
<?php
include('footer2.php');
?>
