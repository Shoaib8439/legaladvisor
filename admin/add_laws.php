<?php 
session_start();
if(isset($_SESSION["name"])!=TRUE){
  header("Location:login.php");
}
	include('header.php');
	include('indexDB.php');
	include('function.inc.php');

		$catagories_id='';
		$ipc='';
		$name='';
		$description='';
		
		$check='';
		
		if(isset($_GET['id']) && ($_GET['id'])!='')
	{
		$image_required='';
		$id= $_GET['id'];
		$sql="select * from `laws` where `id`='$id'";
		$res=mysqli_query($conn,$sql);
		$check=mysqli_num_rows($res);
		if(check>0)
			{
				$row=mysql_fetch_assoc($res);
				$catagories_id=$row('catagories_id');
				$ipc=$row('ipc_sec');
				$name=$row('name');
				$description=$row('description');
			}
		else
			{
					header('location:laws.php');
					
			}
	}
	$msg='';
if(isset($_POST['submit']))
{
		$catagories_id=$_POST['catagories_id'];
		$ipc=$_POST['ipc'];
		$name=$_POST['name'];
		$description=$_POST['description'];
		$sql="select * from `laws` where ipc_sec='".$ipc."'";
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
				$msg="IPC section already exist. ";
					
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
		    { 
		     
	         $sql="INSERT INTO `laws`(`catagories_id`, `ipc_sec`,`name`,`description`,`status`)
	         VALUES ('$catagories_id','$ipc','$name','$description','1')";
				
	        }
			 if (mysqli_query($conn, $sql)) 
				 {
				 header('location:laws.php');
	 
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
		<div class="container">
			<div class="card-body">
                           <h4 class="box-title">Please Add Laws </h4>
						  
                        </div>
		</div>
	</div>
    <div class="container">
   <form method="post" action="add_laws.php">
	<div class="input-group">
		<label>Catagory</label>
			<select class="form-control" name="catagories_id">
				<option>Select Catagory</option><br><br>
				 <?php
				 $res=mysqli_query($conn,"select id,catagories from catagories order by catagories asc");
					while($row=mysqli_fetch_assoc($res)){
						 echo "<option value=".$row['id'].">".$row['catagories']."</option>";
						}
				 ?>
				 </select>
	</div>
	<div class="input-group">
		<label>IPC Section</label><br><br>
		<input type="text" name="ipc" required value="<?php echo $ipc?>">
	</div>
	<div class="input-group">
		<label>Name</label><br><br>
		<input type="text" name="name" required value="<?php echo $name?>">
	</div>
	<div class="input-group">
		<label>Description</label><br><br>
		<textarea name="description"  required><?php echo $description?></textarea>
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
