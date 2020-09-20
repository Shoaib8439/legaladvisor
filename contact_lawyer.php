<?php 
session_start();
if(isset($_SESSION["username"])!=TRUE){
  header("Location:client_login.php");
}
	include('header2.php');
	include('indexDB.php');
	
	if(isset($_SESSION['uid']))
	{  $user_id=$_SESSION['uid'];
		if(isset($_GET['id'])){
		$id= $_GET['id'];
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
			<li> <li><a href="logout.php"><?php echo $_SESSION['name']."  ";?><i class="fa fa-user-circle-o"></i>Logout</a></li></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container hero-text text-white">
			<h2><i>Contact to Lawyer</h2>
			
		</div>
	</section>
	<!-- Hero section end -->
	<!-- Filter form section -->
	
	<!-- page -->
	<div class="contact-title">
	  
	</div>
	<section class="page-section categories-page">
         <div class="container">

				<form id="contact-type" method="post" action="contact_lawyer_handle.php">
							    
								<div class="form-group">
								
									<input type="hidden" name="lid" class="form-control"  required value="<?php echo $id?> ">
								</div>
								<div class="form-group">
								
									<input type="hidden" name="uid" class="form-control"  required value="<?php echo $user_id?>">
								</div>
								<div class="form-group">
								<label>Name</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Your Name" required value="<?php echo $_SESSION['name']?> ">
								</div>
								
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" class="form-control" placeholder="Enter Email" required value="<?php echo $_SESSION['email']?>">
								</div>
								
								<div class="form-group">
									<label>Query</label>
									<textarea name="query" class="form-control" placeholder="Please Enter Your Query" required></textarea>
								</div>
								<button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Submit</button>
							  
							  
							  
							  
							 
				<br><br><br><br><br><br><br><br><br><br>
				</form>
		</div>  	  
	</section>
<?php
include('footer2.php');
?>
