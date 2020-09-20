<?php
include('header.php');

   include("indexDB.php");
?>
<style type="text/css">
body{
background-repeat:no-repeat;
background-image:url("img/bg.jpg");
background-size:cover;
background-attachment:fixed;
color:white;
}

</style>

<section class="page-section categories-page">
  <br><br><br><br><br><br><br><br><br><br><br><br>
          <div class="container">
<h1>USER LOGIN</h1>
				<form id="contact-type" method="post" action="client_login_handle.php">
							    <div class="form-group">
								<label>User Name</label>
									<input type="text" name="username" class="form-control" placeholder="Enter name" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">LOGIN</button>
							     
							  
							  
							  
							 
				<br><br><br><br><br><br><br><br><br><br>
				</form>
		</div>  	
</section>
<?php
include('footer.php');
?>