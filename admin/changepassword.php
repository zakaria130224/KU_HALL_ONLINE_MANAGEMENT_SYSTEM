<?php require '../resources/classes/admin.php'; ?> 
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $ad = new admin();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $oldPassword=$_POST['oldPassword'];
        $oldPassword = md5($oldPassword);
        $newPassword=$_POST['newPassword'];
        $newPassword = md5($newPassword);
        $username=session::get('username');
        $check = $ad->changePassword($username,$oldPassword,$newPassword);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">               
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table class="form">					
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="oldPassword" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newPassword" class="medium" />
                    </td>
                </tr>
				 
				 <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>
				 <tr>
                    <td>
                    </td>
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