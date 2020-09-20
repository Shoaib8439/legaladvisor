<?php
session_start();
if(isset($_SESSION["username"])!=TRUE){
  header("Location:lawyer_login.php");
}
include('header_lawyer.php');
include("indexDB.php");

if(isset($_SESSION["lid"])){
			 
     $id=$_SESSION['lid'];
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
						<?php
						$sql_get= mysqli_query($conn,"select *from contact_lawyer where status='0'");
						$count=mysqli_num_rows($sql_get);
						?>
              <li><a href="client_message.php"><div class="button"><i class="fa fa-envelope" ></i><span class="button__badge"></span> </div></a></li>
			  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
               <a class="dropdown-item" href="#">Action</a>
               <a class="dropdown-item" href="#">Another action</a>
               <a class="dropdown-item" href="#">Something else here</a>
            </div>
			  <li><a href="profile.php">Profile</a></li>
			  <li><a href="about.php">About</a></li>
			  <li><a href="logout.php" ><?php echo $_SESSION['name']."  ";?><i class="fa fa-user-circle-o"></i>Logout</a></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container hero-text text-white">
			<h2><i><?php echo"Welcome ".$_SESSION['name']." ";?></h2>
			
		</div>
	</section>
		<div class="contact-title">
	     <h2 align="center">Add profile details</h2>
	</div>
	<section class="page-section categories-page">
	<div class="container">
	
					<form id="contact-type" method="post" action="add_profile_handle.php" enctype="multipart/form-data">
							   
								
								<div class="form-group">
									<label>Image</label>
									<input type="file" name="image" class="form-control" >
								</div>
								
									<input type="hidden" name="lid" class="form-control" value="<?php echo $id;?>">
							
								<div class="form-group">
									<label>Experience</label>
									<input type="text" name="experience" class="form-control"  placeholder="Please Enter Experience" required>
								</div>
								<div class="form-group">
									<label>Languages Spoken</label>
									<input type="text" name="lang" class="form-control"  placeholder="Please Enter languages " required>
								</div>
								<div class="form-group">
									<label>Practice Area</label>
									<textarea name="practice_area" class="form-control" placeholder="Please Enter Your Practice area" required></textarea>
								</div>
								<div class="form-group">
									<label>Specialization</label>
									<textarea name="specialization" class="form-control" placeholder="Please Enter Your Specialization" required></textarea>
								</div>
								<div class="form-group">
									<label>Courts</label>
									<textarea name="courts" class="form-control" placeholder="Please Enter Your Courts" required></textarea>
								</div>
								<button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Submit</button>
								
					<br><br><br><br><br><br><br><br><br><br>
				</form>
		</div>  	  
	</section>

<?php 
include('footer2.php');
?>