<?php 
session_start();
if(isset($_SESSION["name"])!=TRUE){
  header("Location:login.php");
}
	include('header.php');
	include('indexDB.php');
	include('function.inc.php');

	$catagories='';
$msg='';
if(isset($_POST['submit']))
{
	
	$catagories= $_POST['catagories'];
	$sql="select * from `catagories` where catagories='".$catagories."'";
	$res=mysqli_query($conn,$sql);
	$check=mysqli_num_rows($res);
	if($check>0)
	{
		$msg="Catagories already exist. ";
	}
	else
	{
	//  $catagories = get_safe_value($con,$_POST['catagories']);
	
	  mysqli_query($conn,"INSERT INTO `catagories`(`catagories`,`status`) VALUES ('$catagories','1')");
	//  mysqli_query($con,"insert into catagories(catagories,status) value('$catagories','1')");
      header('location:dashboard.php');
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
	height: 30px;
	width: 93%;
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
		<div class="container">
			<div class="card-body">
                           <h4 class="box-title">Please Add Catagory </h4>
						  
                        </div>
		</div>
	</div>
    <div class="container">
           <form method="post" action="add_catagories.php">
	<div class="input-group">
		<label>Catagory</label>
		<input type="text" name="catagories" required value="<?php echo $catagories?>">
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
