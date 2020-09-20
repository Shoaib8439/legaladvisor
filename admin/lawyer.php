<?php 
session_start();
if(isset($_SESSION["name"])!=TRUE){
  header("Location:login.php");
}
	include('header.php');
	include('indexDB.php');
	include('function.inc.php');


	 if(isset($_GET['type']) && $_GET['type']!='')
	 {
	  $type=get_safe_value($conn,$_GET['type']);
	  if ($type=='status')
	  {
		  $operation=get_safe_value($conn, $_GET['operation']);
		  $id=get_safe_value($conn, $_GET['id']);
		  if($operation=='active'){
			  $status='1';
		  }else{
			   $status='0';
		  }
		  $update_status_sql="update lawyer set status='$status' where id='$id'";
		  mysqli_query($conn, $update_status_sql);
	  
      }
  	  if ($type=='delete'){
		  $id=get_safe_value($conn, $_GET['id']);
		  $delete_sql="delete from lawyer where id='$id'";
		  mysqli_query($conn, $delete_sql);
	  }
	}

  
   $sql="select lawyer.*,lawyer_reg.name,lawyer_reg.email,lawyer_reg.phone from lawyer,lawyer_reg where lawyer.lawyer_reg_id=lawyer_reg.lid" ;
  
  $res=mysqli_query($conn, $sql);
  
  
?>

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
                           <h4 class="box-title">LAWYER </h4>
						   
                        </div>
		</div>
	</div>
    <div class="container">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
						
                        <th>ID</th>
						<th>Image</th>
                        <th>Name</th>
						<th>Email</th>
						<th>Phone No.</th>
						<th>Experience</th>
						<th>Language</th>
                        <th>Practice Area</th>
						<th>Specialization</th>
						<th>Courts</th>
						<th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
									$i=1;
								    while($row=mysqli_fetch_assoc($res)){
										?>
									<tr>
									<td><?php echo $row['id']?></td>
								    <td><img src="../media/lawyer/<?php echo $row['image']?>"/></td>
									<td><?php echo $row['name']?></td>
									<td><?php echo $row['email']?></td>
									<td><?php echo $row['phone']?></td>
									<td><?php echo $row['experience']?> years</td>
									<td><?php echo $row['language']?></td>
									<td><?php echo $row['practice_area']?></td>
									<td><?php echo $row['specialization']?></td>
									<td><?php echo $row['courts']?></td>
									<td>
									<?php
									
									//echo "<a href='update_catagories.php?&id=".$row['id']."'>Edit</a>&nbsp;";
									echo "<span class='btn_delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
									
									
									?>
									
									</td>
										
                                    </tr>
									<?php } ?>
                 </tbody>
                              
            </table>
			
			
		</div>
	</section>
<?php
include('footer.php');
?>
