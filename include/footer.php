<section class="footer_area fix">
            <div class="footer fix">
				<div class="first fix">
					<h4><?php echo $siteData['hallName']; ?></h4>
					<h5 style="font-size: 12px;">Khulna University,Khulna-9208 Bangladesh</h5>
					<h5 style="font-size: 12px;">&copy; khulna university, <?php echo $siteData['hallName']; ?>, All Rights Reserved</h5>
				</div>
				<div class="second fix">
					<h4 style="font-size: 12px;">Phone : 041-733877</h4>
					<h5 style="font-size: 12px;">Fax : 880-41-731244</h5>
				</div>
				<div class="third fix">
					<h5 style="font-size: 12px;">Email: <?php echo $siteData['contact']; ?></h5>
				</div>
                </div>
		</section>

    <script src="vendors/js/jquery.js" type="text/javascript"></script>
    <script src="vendors/js/jquery.waypoints.min.js"></script>
	<script src="vendors/js/jquery.nivo.slider.js"></script>
	<script type="text/javascript" src="vendors/js/imagePreview.js"></script>
    <script src="resources/js/script.js"></script>
	<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:2000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>

	</body>
</html>