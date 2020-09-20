<?php
	session_start();
	if(isset($_SESSION["username"])!=TRUE){
  header("Location:client_login.php");
}
	include('header2.php');
	include('indexDB.php');

if(isset($_SESSION['name']))
	if(isset($_GET['id']))
	{
	$id= $_GET['id'];
$sql="select lawyer.*,lawyer_reg.name from lawyer,lawyer_reg where lawyer_reg.lid = lawyer.lawyer_reg_id AND lawyer_reg.lid = '".$id."'";
		$res = mysqli_query($conn, $sql);

	////	$sql="select lawyer.*,lawyer_reg.username from lawyer,lawyer_reg where lawyer_reg.lid = lawyer.lawyer_reg_id AND lawyer_reg.lid = '".$id."'";
	//	$res = mysqli_query($conn, $sql);

					 //  $id = $row["id"];
					//	$name = $row["username"];
		
			 

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
			<h2><i>Lawyer Profile</h2>
			
		</div>
	</section>

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			
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
							
								<h2><?php echo $row['name'] ?></h2>
								<div class="sl-thumb set-bg" data-setbg="<img src="media/lawyer/<?php echo $row['image']?>"/></div>
							</div>
							<div class="description">
							<p><img src="media/lawyer/<?php echo $row['image']?>"/></p>
							<span class='btn_add'><a href='contact_lawyer.php?&id=<?php echo $row['lawyer_reg_id'] ?>'>Contact </a></span>
							</div>
					</div>
						<h3 class="sl-sp-title">Experience</h3>
						<div class="description">
							<p><?php echo $row['experience']." year" ?></p>
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