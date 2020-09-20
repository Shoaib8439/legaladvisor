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
	  $type=$_GET['type'];
	  //echo $type;
		  if ($type=='status')
		  {
			  $operation=get_safe_value($conn, $_GET['operation']);
		  $id=get_safe_value($conn, $_GET['id']);

			 if($operation=='active'){
				  $status='1';
			  }else{
				   $status='0';
			  }
			  $update_status_sql="update lawyer_reg set status='$status' where lid='$id'";
			  mysqli_query($conn, $update_status_sql);
		  
		  }
		  if ($type=='delete'){
			$id=get_safe_value($conn, $_GET['id']);
			  $delete_sql="delete from lawyer_reg where lid='$id'";
			  mysqli_query($conn, $delete_sql);
		  }
	}

  
   $sql="select * from `lawyer_reg` order by lid asc" ;
  
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
						
                        <th>Name</th>
						<th>Username</th>
						<th>Licence No.</th>
						<th>Email</th>
						<th>Mobile No.</th>
                      
						<th>Status</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
									$i=1;
								    while($row=mysqli_fetch_assoc($res)){
										?>
									<tr>
									<td><?php echo $row['lid']?></td>
								    
									<td><?php echo $row['name']?></td>
									<td><?php echo $row['username']?></td>
									<td><?php echo $row['lno']?></td>
									<td><?php echo $row['email']?> years</td>
									<td><?php echo $row['phone']?></td>
									
									<td>
									<?php
									if($row['status']==1){
										echo "<span class='btn_active'>
										<a href='?type=status&operation=deactive&id=".$row['lid']."'>Active</a></span>&nbsp;";
									}
									else{
										echo "<span class='btn_add'><a href='?type=status&operation=active&id=".$row['lid']."'>Deactive</a></span>";
									}
									//echo "<a href='update_catagories.php?&id=".$row['']."'>Edit</a>&nbsp;";
									echo "<span class='btn_delete'><a href='?type=delete&id=".$row['lid']."'>Delete</a></span>";
									
									
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