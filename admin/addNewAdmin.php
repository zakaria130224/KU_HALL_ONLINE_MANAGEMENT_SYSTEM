<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../resources/classes/admin.php';?>
<?php
    $ad = new admin();
    if($_SERVER['REQUEST_METHOD']=='POST'){     
        $check = $ad->addNewAdmin($_POST);
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
                        <label>Admin ID:</label>
                    </td>
                    <td>
                        <input type="text" name="adminId" placeholder="Enter admin id..." class="medium" required />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Username</label>
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter username..." class="medium" required />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="text" name="password" placeholder="Enter password..." class="medium" required />
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
                        <input type="submit" name="submit" Value="Add new Admin" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>