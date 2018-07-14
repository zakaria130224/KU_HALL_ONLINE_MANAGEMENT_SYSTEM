<?php include 'include/header.php'; ?>
<?php
$nm = new webOptions();
    $number = $nm->getNumber();
?>
		<section class="details">
            <div class="row">
                <div class="col span-1-of-2 first-coloumn">
                    <div class="box">
                        <ul>
                            <li class="box2 fix">
                               <div class="balance image1 floatleft fix">
                                   <img src="resources/images/ambulance.png"/> 	
                                 </div>
                                 <div class="no flaotleft fix">
                                    <h2><b>Ambulance<b></h2><br/>
                                 	<h3><?php echo $number[0]['phone1']; ?></h3><br/>
                                 	<h3><?php echo $number[0]['phone2']; ?></h3>
                                 </div>
                               </li>
                            <li class="box2 fix">
                            	<div class="balance image1 floatleft fix">
                                   <img src="resources/images/fireservice.png"/> 	
                                 </div>
                                 <div class="no flaotleft fix">
                                    <h2><b>Fire-Service<b></h2><br/>
                                 	<h3><?php echo $number[1]['phone1']; ?></h3><br/>
                                 	<h3><?php echo $number[1]['phone2']; ?></h3>
                                 </div>
                            </li>
                            <li class="box2 fix">
                            	<div class="balance image1 floatleft fix">
                                   <img src="resources/images/hospital.png"/> 	
                                 </div>
                                 <div class="no flaotleft fix">
                                    <h2><b>Hospital<b></h2><br/>
                                 	<h3><?php echo $number[2]['phone1']; ?></h3><br/>
                                 	<h3><?php echo $number[2]['phone2']; ?></h3>
                                 </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col span-1-of-2 second-coloumn">
                    <div class="box">
                        <ul>
                            <li class="box2 fix">
                               <div class="balance image1 floatleft fix">
                                   <img src="resources/images/doctor.png"/> 	
                                 </div>
                                 <div class="no flaotleft fix">
                                    <h2><b>Medical<b></h2><br/>
                                 	<h3><?php echo $number[3]['phone1']; ?></h3><br/>
                                 	<h3><?php echo $number[3]['phone2']; ?></h3>
                                 </div>
                            </li>
                            <li class="box2 fix">
                            	<div class="balance image1 floatleft fix">
                                   <img src="resources/images/police.png"/> 	
                                 </div>
                                 <div class="no flaotleft fix">
                                    <h2><b>Police<b></h2><br/>
                                 	<h3><?php echo $number[4]['phone1']; ?></h3><br/>
                                 	<h3><?php echo $number[4]['phone2']; ?></h3>
                                 </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </section>
		
<?php include 'include/footer.php'; ?>