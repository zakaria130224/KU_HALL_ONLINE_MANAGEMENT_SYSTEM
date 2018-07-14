<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../resources/classes/webOptions.php';?>
<?php
    $nm = new webOptions();
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $check = $nm->updateNumber($_POST);
    }
    $number = $nm->getNumber();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Emergency Number</h2>
        <div class="block">               
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table class="form">	
            <?php if($number){ ?>
				 <tr>
                    <td>
                        <label>Ambulance</label>
                    </td>
                    <td>
                        <input type="text" name="ambulance1" value="<?php echo $number[0]['phone1']; ?>" class="medium" />
                        <input type="text" name="ambulance2" value="<?php echo $number[0]['phone2'] ; ?>" class="medium" />
                    </td>
                </tr>
 				
                <tr>
                    <td>
                        <label>Fire Service</label>
                    </td>
                    <td>
                        <input type="text" name="fire1" value="<?php echo $number[1]['phone1']; ?>" class="medium" />
                        <input type="text" name="fire2" value="<?php echo $number[1]['phone2'] ; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Hospital</label>
                    </td>
                    <td>
                        <input type="text" name="hospital1" value="<?php echo $number[2]['phone1']; ?>" class="medium" />
                        <input type="text" name="hospital2" value="<?php echo $number[2]['phone2'] ; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Medical Center</label>
                    </td>
                    <td>
                        <input type="text" name="medical1" value="<?php echo $number[3]['phone1']; ?>" class="medium" />
                        <input type="text" name="medical2" value="<?php echo $number[3]['phone2'] ; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Police</label>
                    </td>
                    <td>
                        <input type="text" name="police1" value="<?php echo $number[4]['phone1']; ?>" class="medium" />
                        <input type="text" name="police2" value="<?php echo $number[4]['phone2'] ; ?>" class="medium" />
                    </td>
                </tr>
                <?php } ?>
				<p class="msg">
                    <?php
                        if(isset($check)){
                            echo $check;
                        }
                    ?>
                </p>
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>