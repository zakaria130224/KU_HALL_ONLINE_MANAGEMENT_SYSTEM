<?php include 'include/header.php'; ?>
<?php
	if(isset($_GET['id'])){
		$wbo = new webOptions();
		$detailNews = $wbo->getNewsById($_GET['id']);
	} 
?>

		<div style="margin: 10px  auto;" class="abouthall content fix">
		<center>
			<h1 style="margin: 5px auto; font-size: 20px;"><?php echo $detailNews[0]['title']; ?></h1>

			<img class="newsimg" src="admin/<?php echo $detailNews[0]['image']; ?>"/>
		</center>
		  

		  <!-- <div class="clearfix"></div> -->
		
   	     	

		  <div class="detailNews">
		  	<p style="margin: 7px 7px;"> <?php echo $detailNews[0]['detail']; ?> </p> 
		  </div>
		</div>

<?php include 'include/footer.php'; ?>