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
		  $update_status_sql="update laws set status='$status' where id='$id'";
		  mysqli_query($conn, $update_status_sql);
	  
      }
  	  if ($type=='delete'){
		  $id=get_safe_value($conn, $_GET['id']);
		  $delete_sql="delete from laws where id='$id'";
		  mysqli_query($conn, $delete_sql);
	  }
	}
  
  
   $sql="select laws.*,catagories.catagories from laws,catagories where laws.catagories_id=catagories.id order by catagories.id asc" ;
  
  $res=mysqli_query($conn, $sql);

?>
<style type="text/css">

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
                           <h4 class="box-title">Laws </h4>
						   <h4 class="box-link"><a href="add_laws.php" class='btn_add'><small>Add Laws</small></a> </h4>
                        </div>
		</div>
	</div>
    <div class="container">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
						
                        <th>ID</th>
                        <th>Catagory</th>
						<th>IPC Section</th>
						<th>Name</th>
						<th>Description</th>
                        <th>Status</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
									$i=1;
								    while($row=mysqli_fetch_assoc($res)){
										?>
									<tr>
								    
									<td><?php echo $row['id']?></td>
									<td><?php echo $row['catagories']?></td>
									<td><?php echo $row['ipc_sec']?></td>
									<td><?php echo $row['name']?></td>
									<td><?php echo $row['description']?></td>
									<td>
									<?php
									if($row['status']==1){
										echo "<span class='btn_active'>
										<a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
									}
									else{
										echo "<span class='btn_active'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>";
									}
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
