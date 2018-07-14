<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../resources/classes/admin.php';?>
<?php
    $ad = new admin();
    //$db = new database();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $check = $ad->updateProfile($_POST, session::get('username'));
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Profile</h2>
        <div class="block">               
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table class="form">	
				 <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="adminName" value="<?php echo session::get('adminName'); ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Designation</label>
                    </td>
                    <td>
                        <input type="text" name="designation" value="<?php echo session::get('designation'); ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="email" name="email" value="<?php echo session::get('email'); ?>" class="medium" />
                    </td>
                </tr>
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