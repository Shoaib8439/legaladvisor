<?php 
session_start();
if(isset($_SESSION["username"])!=TRUE){
  header("Location:client_login.php");
}
	include('header2.php');
include('indexDB.php');

if(isset($_SESSION['name'])){
	$name=$c='';
	$x1="SELECT DISTINCT catagories FROM catagories JOIN laws ON catagories.id=laws.catagories_id";
	//$x2="select distinct city from flat";
	$q="select laws.*,catagories.catagories from laws,catagories where laws.catagories_id=catagories.id order by catagories.id desc";
	if( isset($_POST['name']))
	{
		
		//$name=$_POST['name'];
		$c=$_POST['name'];
		if( $c=='All')
		{
			$q="select laws.*,catagories.catagories from laws,catagories where laws.catagories_id=catagories.id order by catagories.id desc";
			//$q="SELECT catagories_id,ipc_sec,name,description FROM catagories RIGHT JOIN laws ON catagories.id=laws.catagories_id;" ;
		}
		if( $c!='All')
		{
			$q="SELECT catagories,ipc_sec,name,description FROM catagories join laws on laws.catagories_id= (select id from catagories where catagories='$c') AND catagories.id=laws.catagories_id;
";
		}
	}
	$r1=$conn->query($x1);
	//$r2=$conn->query($x2);
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
			<h2><i><?php echo"Welcome ".$_SESSION['name']." ";?></h2>
			
		</div>
	</section>
	<!-- Hero section end -->
	<!-- Filter form section -->
	<div class="filter-search">
		<div class="container">
			<form class="filter-form" method="post" action="laws.php">
			<h2>Please Select the Catagory</h2>
			<div class="input-group">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Name   </label>&nbsp;&nbsp;&nbsp;&nbsp;
				<select name="name">
				<option value="All" selected>All</option>
					<?php 
					while($p1=mysqli_fetch_array($r1, MYSQLI_ASSOC))
					{
						echo "<option value='".$p1['catagories']."'>".$p1['catagories']."</option>";
					}
					?>
				</select>
		    </div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br><br><button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Search</button>
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
						
                        
                        <th>Catagory</th>
						<th>IPC Section</th>
						<th>Name</th>
						<th>Description</th>
                      
                    </tr>
                </thead>
                <tbody>
                   				<?php
						$r = $conn->query($q);
						while($row=mysqli_fetch_array($r, MYSQLI_ASSOC))
						{
							?>
								    
									
									<td><?php echo $row['catagories']?></td>
									<td><?php echo $row['ipc_sec']?></td>
									<td><?php echo $row['name']?></td>
									<td><?php echo $row['description']?></td>
									
									
									
									
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
