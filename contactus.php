<?php include 'include/header.php'; ?>
<?php
	$st = new webOptions();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $st->addUserMsg($_POST);
    }
?>
		<div class="studentform content fix">
			<div class="heading fix">
				
				<center><div class="heading fix">
				<div class="form-style">
				    <h1>Contact Us</h1>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					 <div class="inner-wrap">
							<label>First Name <input type="text" name ="firstName" placeholder="Enter your first name" required /></label>

					
							<label>Last Name <input type="text" name ="lastName" placeholder="Enter your last name" required /></label>
						</div>
					   <div class="inner-wrap">
							<label>Email <input type="email" name ="email" placeholder="Enter your email address" required /></label>
						</div>
						<div class="inner-wrap">
						
							<label>Your Message <textarea rows="5" style="border: 2px solid #cbbaba;" name="msg" required></textarea></label> 
						</div>
						<div class="button-section">
					     
					         <input style="padding-right: 67px; padding-bottom: 25px;" type="submit" name="submit" value="Submit"/>
					     </div>
					  
					</form>
					</div>
				</div>
			</div></center>
		</div>

<?php include 'include/footer.php'; ?>