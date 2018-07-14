<?php require '../resources/classes/admin.php'; ?>  
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $rm = new admin();
    if(isset($_POST['delete'])){
        $username=$_POST['username'];
        $check = $rm->deleteAdmin($username);
    }
    $admins = $rm->getAllAdmin();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Floor</h2>
        <div class="block copyblock"> 
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table class="form">					
                <tr>
                    <td>
                        <select id="select" name="username">
                            <option value="0">Select Admin</option>
                             <?php if($admins){ while($row = $admins->fetch_assoc()){ if($row['level']!="1"){ ?>
                            <option><?php echo $row['username']; ?></option>
                            <?php }}} ?>
                        </select>
                    </td>
                </tr>
				 <tr> 
                    <td>
                        <input type="submit" name="delete" Value="Delete Admin" onclick="return confirm('Are you sure to Delete Admin');"/>
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