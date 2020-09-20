<?php 
	include('header2.php');
	include('indexDB.php');
 
	

	    $id=$_POST['id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$query=$_POST['query'];
	    $sql="INSERT INTO `contact_lawyer`( `lawyer_id`,`name` `email`, `query`) VALUES ('$id','$name','$email','$message')";
		// if( mysqli_query($conn, $sql))
			 if (mysqli_query($conn, $sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
			//header('location:find_lawyer.php');
	
	
	
	?>
<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
	 <h1>Contact Form</h1>
	</section>
	<!-- Hero section end -->
	<!-- Filter form section -->
	
	<!-- page -->
	<div class="contact-title">
	  
	</div>
	<section class="page-section categories-page">
         <div class="container">
 <h1 align="center">Contact Form</h1>
				<form id="contact-type" method="post" action="contact_lawyer.php">
				
							    <div class="form-group">
								<label>Lawyer ID</label>
									<input type="text" name="id" class="form-control" required value="<?php echo $id?>">
								</div>
								
								<div class="form-group">
								<label>Name</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
								</div>
								
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" class="form-control" placeholder="Enter Email" required>
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
