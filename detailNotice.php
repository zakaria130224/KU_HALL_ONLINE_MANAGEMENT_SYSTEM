<?php include 'include/header.php'; ?>
<?php
	if(isset($_GET['id'])){
		$wbo = new webOptions();
		$detailNotice = $wbo->getNoticeById($_GET['id']);
	} 
?>

		<div class="abouthall content fix">
		  <div class="halltext fix">
		  	<p style="margin: 73px auto;"> <?php echo $detailNotice['detail']; ?> </p> 
		  </div>
		</div>

		<?php include 'include/footer.php'; ?>