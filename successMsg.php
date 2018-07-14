<?php include 'include/header.php'; ?>

<?php
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
}
?>
		<div class="abouthall content fix">
		  	<p style="font-size: 50px;margin: 110px auto; color: green;text-align: center;"><?php if($msg){ echo $msg; } ?></p> 
		</div>
<?php include 'include/footer.php'; ?>