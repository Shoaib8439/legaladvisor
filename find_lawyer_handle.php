<?php

include('indexDB.php');
if( isset($_POST['search']))
		{
			$c=$_POST['name'];
			echo= $c;
			/*$sql1="select lawyer_reg_id FROM lawyer where specialization like '%$c%'";
			 $r1=mysqli_query($conn,$sql1);
			$q="select lawyer.*,lawyer_reg.username from lawyer,lawyer_reg WHERE lawyer_reg.lid=lawyer.$r1";
				//$q="select lawyer.*,lawyer_reg.username, lawyer_reg.email, lawyer_reg.phone from lawyer,lawyer_reg WHERE lawyer_reg.lid=(SELECT lawyer_reg_id FROM lawyer where specialization LIKE'%c%')";
		$r=mysqli_query($conn,$q);

		 echo "shoaib";
		 */
		
}

?>