<?php 
session_start();
if(isset($_SESSION["username"])!=TRUE){
  header("Location:lawyer_login.php");
}
include('header_lawyer.php');
include('indexDB.php');



if(isset($_SESSION["lid"])){
	$id = $_SESSION["lid"];
//	echo $id;
$sql="select lawyer.*,lawyer_reg.username from lawyer,lawyer_reg where lawyer_reg.lid = lawyer.lawyer_reg_id AND lawyer_reg.lid = '".$id."'";
 $res = mysqli_query($conn, $sql);

             //  $id = $row["id"];
			//	$name = $row["username"];
			 

}
else{
//echo"<script>location.href='lawyer_login.php'</script>";
}
?>
 <style type="text/css">
body,html {
  height: 100%;
 }

body {
  padding-top: 50px;


}

#myBtn{
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: green;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}
#myBtn:hover {
  background-color: darkgreen;
  color: white;
}

.bg-4{
  background-color: #2f2f2f;
  color: #ffffff;

}

footer{
  display: block;
}

</style>

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
			  <li><a href="add_profile.php">Add Profile</a></li>
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
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<h2 align="center" > Profile Page</h2>
		</div>
	</div>
<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 single-list-page">
					<?php  while($row = mysqli_fetch_assoc($res)) {   ?>
                    
						
						</div>
               <div class="single-list-content">
						<div class="row">
						<div class="col-xl-8 sl-title">
						<?php
						
							echo "<span class='btn_add'><a href='edit_profile.php?&id=$id'>Edit Profile</a></span>&nbsp;";
							//echo "<span class='btn_delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
						?>
						</div>
						<br><br>
							<div class="col-xl-8 sl-title">
								<h2><?php echo $row['username'] ?></h2>
								<div class="sl-thumb set-bg" data-setbg="<img src="media/lawyer/<?php echo $row['image']?>"/></div>
							</div>
							<div class="description">
							<p><img src="media/lawyer/<?php echo $row['image']?>"align="left"/></p>
							</div>
					</div>
						<h3 class="sl-sp-title">Experience</h3>
						<div class="description">
							<p><?php echo $row['experience'] ?></p>
							</div>
							<h3 class="sl-sp-title">Languages Known</h3>
						<div class="description">
							<p><?php echo $row['language'] ?></p>
							</div>
						<h3 class="sl-sp-title">Practice Area</h3>
						<div class="description">
							<p><?php echo $row['practice_area'] ?></p>
							</div>
						<h3 class="sl-sp-title">Specialization</h3>
						<div class="row property-details-list">
							<div class="col-md-12 col-sm-6">
								<p><?php echo $row['specialization'] ?></p>
							</div>
						</div>
						<h3 class="sl-sp-title">Courts</h3>
						<div class="row property-details-list">
							<div class="col-md-12 col-sm-6">
								<p><?php echo $row['courts'] ?></p>
							</div>
						</div>
					<?php } ?>
            </div>
          </div>
        </div> 
<?php 
include('footer2.php');
?>