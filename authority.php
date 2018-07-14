<?php include 'include/header.php'; ?>
<?php
    $ob = new admin();
    $authority = $ob->getAuthority();
    if($authority){
        $authority =  mysqli_fetch_all($authority,MYSQLI_ASSOC);
        $divide = ceil(sizeof($authority)/2);
    }
    
?>
		<section class="details">
            <div class="row">
                <div class="col span-1-of-2 first-coloumn">
                    <div class="box">
                        <ul>
                        <?php if($authority){ for($x=0; $x<$divide; $x++) { ?>
                        <?php if($authority[$x]['name']){ ?>
                            <li class="box2 fix">
                               <div class="image1 floatleft fix">
                                   <img src="admin/<?php echo $authority[$x]['image']; ?>"/> 	
                                 </div>
                                 <div class="no flaotleft fix">
                                    <h2>Name: <?php echo $authority[$x]['name']; ?></h2>
                                    <h2>Designation: <?php echo $authority[$x]['designation']; ?></h2>
                                 </div>
                               </li>
                            <?php }
                            
                            if($x==sizeof($authority)){ break; }}
                             ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col span-1-of-2 second-coloumn">
                    <div class="box">

                        <ul>
                        <?php for($x=$divide; $x<sizeof($authority); $x++) { ?>
                        <?php if($authority[$x]['name']){ ?>
                            <li class="box2 fix">
                               <div class="image1 floatleft fix">
                                   <img src="admin/<?php echo $authority[$x]['image']; ?>"/> 	
                                 </div>
                                 <div class="no flaotleft fix">
                                    <h2>Name: <?php echo $authority[$x]['name']; ?></h2>
                                    <h2>Designation: <?php echo $authority[$x]['designation']; ?></h2>
                                 </div>
                            </li>

                            <?php }
                            if($x==sizeof($authority)){ break; }
                            }} ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
        </section>
		
 <?php include 'include/footer.php'; ?>