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
			  $update_status_sql="update user_reg set status='$status' where uid='$id'";
			  mysqli_query($conn, $update_status_sql);
		  
		  }
		  if ($type=='delete'){
			$id=get_safe_value($conn, $_GET['id']);
			  $delete_sql="delete from user_reg where uid='$id'";
			  mysqli_query($conn, $delete_sql);
		  }
	}
  
   $sql="select * from `user_reg` order by uid asc" ;
   
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
                           <h4 class="box-title">Users </h4>
						  
                        </div>
		</div>
	</div>
    <div class="container">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
						
                        <th>ID</th>
                        
						<th>Username</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Password</th>
						<th>Status</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
									$i=1;
								    while($row=mysqli_fetch_assoc($res)){
										?>
									<tr>
								    
									<td><?php echo $row['uid']?></td>
									
									
									<td><?php echo $row['username']?></td>
									<td><?php echo $row['email']?></td>
									<td><?php echo $row['phone']?></td>
									<td><?php echo $row['password']?></td>
									<td>
									<?php
									if($row['status']==1){
										echo "<span class='btn_active'>
										<a href='?type=status&operation=deactive&id=".$row['uid']."'>Active</a></span>&nbsp;";
									}
									else{
										echo "<span class='btn_add'><a href='?type=status&operation=active&id=".$row['uid']."'>Deactive</a></span>";
									}
									//echo "<a href='update_catagories.php?&id=".$row['']."'>Edit</a>&nbsp;";
									echo "<span class='btn_delete'><a href='?type=delete&id=".$row['uid']."'>Delete</a></span>";
									
									
									?>
									
									</td>
										
                                    </tr>
									<?php } ?>
                 </tbody>
                              
            </table>
			<?php
			    /* $pr_sql="select * from user_reg";
				 $pr_res= mysqli_query($conn,$pr_sql);
				 $total_record=mysqli_num_rows($pr_res);
				 $total_page =ceil($total_record/$num_per_page);
				 //echo $total_page;
				 
				 if($page>1)
				 {
					 echo "<a href= 'user.php?page=".($page-1)."' class = 'btn_previous'>Previous</a>";
				 }
				 for($i=1;$i<$total_page;$i++)
				 {
					echo "<a href= 'user.php?page=".$i."' class = 'btn_active'>$i</a>";
				 }
				 
				 if($i>$page)
				 {
					 echo "<a href= 'user.php?page=".($page+1)."' class = 'btn_previous'>Next</a>";
				 }*/
			?>
		</div>
	</section>
<?php
include('footer.php');
?>
