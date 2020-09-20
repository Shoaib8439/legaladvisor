<?php 
session_start();
if(isset($_SESSION["username"])!=TRUE){
  header("Location:client_login.php");
}
	include('header2.php');
	include('indexDB.php');
	if(isset($_SESSION['uid']))
	{

	$name=$c='';
	
	
	$q="select lawyer.*,lawyer_reg.username,lawyer_reg.email,lawyer_reg.phone from lawyer,lawyer_reg where lawyer.lawyer_reg_id=lawyer_reg.lid";
	$r = mysqli_query($conn, $q);
		if( isset($_POST['search']))
		{
			
			$c=$_POST['name'];
			$sql1="select lawyer_reg_id FROM lawyer where specialization like '%$c%'";
			// $r1=mysqli_query($conn,$sql1);
		$q="select lawyer.*,lawyer_reg.username from lawyer inner join lawyer_reg on lawyer_reg.lid=lawyer.$sql1";
				//$q="select lawyer.*,lawyer_reg.username, lawyer_reg.email, lawyer_reg.phone from lawyer,lawyer_reg WHERE lawyer_reg.lid=(SELECT lawyer_reg_id FROM lawyer where specialization LIKE'%c%')";
		// $r=mysqli_query($conn,$q);
		
			 if (mysqli_query($conn, $q)) 
				 {
				 echo "shoaib";
	 
				 } else
				 {
                       echo "Error: " . $q . "<br>" . mysqli_error($conn);
                 }
		 
		       die();	
		}
		}
		//$r1=$conn->query($x1);
		//$r2=$conn->query($x2);
	
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
			<h2><i>Find Lawyer</h2>
			
		</div>
	</section>

	<!-- Hero section end -->
	<!-- Filter form section -->
	<div class="filter-search">
		<div class="container">
					<div class="input-group">
					<form class="filter-form" method="post" action="find_lawyer.php">
						<label><h2>Enter Issue</h2></label><br><br>
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" required >
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="site-btn fs-submit" type="submit" name="search" >SEARCH</button>
			
					</div>
		</div>
		</form>
		</div>
	</div>
	<!-- page -->
	<section class="page-section categories-page">
    <br><br><br><br>
	<div class="filter-search">
		<div class="container">
		</div>
	</div>
    <div class="container">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark" style="background: #2e6fa7; color: white;">
                    <tr>
					
						<th >Image</th>
                        <th>Name</th>
						<th>Experience</th>
						<th>Language</th>
						<th>View Profile</th>
						
                    </tr>
                </thead>
                <tbody>
                   				
						<?php  while($row = mysqli_fetch_assoc($r)) {   ?>
								  <tr>
									
								    <td><img src="media/lawyer/<?php echo $row['image']?>"/></td>
									<td><?php echo $row['username']?></td>
									<td><?php echo $row['experience']?> years</td>
									<td><?php echo $row['language']?></td>
									<td>
									<?php
									
									echo "<span class='btn_add'><a href='view_profile.php?&id=".$row['lawyer_reg_id']."'>View </a></span>&nbsp;";
									//echo "<span class='btn_delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
									?>
									
									</td>
										
                                    </tr>
									<?php } ?>
                 </tbody>
                              
            </table>
		</div>
	</section>
<?php
include('footer2.php');
?>
