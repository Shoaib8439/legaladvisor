<?php 
include('header_lawyer.php');
include('indexDB.php');
//session_start();


if(isset($_SESSION["lid"])){
	$id = $_SESSION["lid"];


}
else{
echo"<script>location.href='lawyer_login.php'</script>";
}

?>

<?php 
include('footer2.php');
?>