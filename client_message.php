<?php
session_start();
if(isset($_SESSION["username"])!=TRUE){
  header("Location:lawyer_login.php");
}
include('header_lawyer.php');
include('indexDB.php');

	if(isset($_SESSION['lid']))
	{
		$id = $_SESSION["lid"];
		//echo $id;
		
		$sql="SELECT * FROM `contact_lawyer` WHERE lawyer_id='".$id."'";
		$res=mysqli_query($conn,$sql);
   
	  
		
	}
?>
 <style type="text/css">

.button {
  color: white;
  display: inline-block; /* Inline elements with width and height. TL;DR they make the icon buttons stack from left-to-right instead of top-to-bottom */
  position: relative; /* All 'absolute'ly positioned elements are relative to this one */
  padding: 2px 5px; /* Add some padding so it looks nice */
}

/* Make the badge float in the top right corner of the button */
.button__badge {
  background-color: #fa3e3e;
  border-radius: 2px;
  color: white;
 
  padding: 1px 3px;
  font-size: 10px;
  
  position: absolute; /* Position the badge within the relatively positioned button */
  top: 0;
  right: 0;
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
			  <li><a href="about.php">About</a></li>
			  <li><a href="logout.php" ><?php echo $_SESSION['name']."  ";?><i class="fa fa-user-circle-o"></i>Logout</a></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container hero-text text-white">
			<h2><i><?php echo $_SESSION['name']." Messages ";?></h2>
			
		</div>
	</section>
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
						
                        
                        <th>From</th>
						<th>Sender Email</th>
						<th>Message</th>
						<th>Date</th>
						<th>Action</th>
						
                      
                    </tr>
                </thead>
                <tbody >
                   				<?php
						             while($row = mysqli_fetch_assoc($res)) {   ?>
						
									<td><?php echo $row['name']?></td>
									<td><?php echo $row['email']?></td>
									<td><?php echo $row['query']?></td>
									<td><?php echo $row['cr_date']?></td>
									<td>
									<?php
									
									//echo "<span class='btn_add'><a href='view_profile.php?&id=".$row['lawyer_reg_id']."'>View </a></span>&nbsp;";
									echo "<span class='btn_delete'><a href='?type=delete&id=".$row['user_id']."'>Delete</a></span>";
									?>
									
									</td>
										
                                    </tr>
									 <?php 
									 }
									 if(isset($_GET['type']) && $_GET['type']!=''){
										  $type=$_GET['type'];
										 
										  if ($type=='delete'){
											  $uid=$_GET['id'];
											  $delete_sql="delete from contact_lawyer where id='$uid'";
											  mysqli_query($conn, $delete_sql);
											  //header('location:client_message.php');
										  }
									 }
									  ?>
                 </tbody>
                              
            </table>
		</div>
	</section>

<?php 
include('footer2.php');
?>