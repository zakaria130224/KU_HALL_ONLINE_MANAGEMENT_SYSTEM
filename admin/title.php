<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $op = new webOptions();
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $op->updateOptions($_POST);
    }
    $result = $op->getOptions();
    if($result){
        $result = mysqli_fetch_assoc($result);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <div class="block sloginblock">               
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table class="form">					
                <tr>
                    <td>
                        <label>Website Title</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['title']; ?>"  name="title" class="medium" />
                    </td>
                </tr>
				 
				 <tr>
                    <td>
                        <label>Hall Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['hallName']; ?>" name="name" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['address']; ?>" name="address" class="medium" />
                    </td>
                </tr>
                 <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['phone']; ?>" name="phone" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Fax</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['fax']; ?>" name="fax" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="email" value="<?php echo $result['email']; ?>" name="email" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" onclick="return confirm('Are you sure to Update!');" />
                    </td>
                </tr>
            </table>
            <?php
                    if(isset($check)){
                        echo $check;
                    }
                ?>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>