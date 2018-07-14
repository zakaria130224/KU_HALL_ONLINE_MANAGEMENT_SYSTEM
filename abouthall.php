<?php include 'include/header.php'; ?>
<?php
	$adLink = new webOptions();
    $result = $adLink->getAboutContact();
    $result = mysqli_fetch_assoc($result);
?>

		<div class="abouthall content fix">
		  <div class="halltext fix">
		  	<div style="margin: 73px auto;"><?php echo $result['aboutUs']; ?></div> 
		  </div>
		</div>

		<?php include 'include/footer.php'; ?>