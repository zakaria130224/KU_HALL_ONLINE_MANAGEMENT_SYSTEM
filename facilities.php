<?php include 'include/header.php'; ?>
<?php
    $ob = new webOptions();
    $facilities = $ob->getFacilities();
    $divide = ceil(sizeof($facilities)/2);
?>

		<section class="details">
            <div class="row">
                <div class="col span-1-of-2 first-coloumn">
                    <div class="box">
                        <ul>
                        <?php if($facilities){ for($x=0; $x<$divide; $x++) { ?>
                        <?php if($facilities[$x]['title']){ ?>
                           <li class="box2 fix">
                               <div class="image1 floatleft fix">
                                   <img src="admin/<?php echo $facilities[$x]['image']; ?>"/> 	
                                 </div>
                                 <div class="no flaotleft fix">
                                   <h2><?php echo $facilities[$x]['title']; ?></h2><br/>
                                    <h3><?php echo $facilities[$x]['details']; ?></h3>
                                    
                                 </div>
                            </li>
                            <?php }
                            
                            if($x==sizeof($facilities)){ break; }}
                             ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col span-1-of-2 second-coloumn">
                    <div class="box">
                        <ul>
                        <?php for($x=$divide; $x<sizeof($facilities); $x++) { ?>
                        <?php if($facilities[$x]['title']){ ?>
                            <li class="box2 fix">
                               <div class="image1 floatleft fix">
                                   <img src="admin/<?php echo $facilities[$x]['image']; ?>"/> 	
                                 </div>
                                 <div class="no flaotleft fix">
                                   <h2><?php echo $facilities[$x]['title']; ?></h2><br/>
                                    <h3><?php echo $facilities[$x]['details']; ?></h3>
                                    
                                 </div>
                            </li>
                            <?php }
                            if($x==sizeof($facilities)){ break; }
                            }} ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </section>
		
 <?php include 'include/footer.php'; ?>