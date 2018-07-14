<?php require '../resources/classes/roomManagement.php'; ?>  
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $rm = new roomManagement();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name=$_POST['select'];
        $check = $rm->deleteFloor($name);
    }
    $floors = $rm->getAllFloor();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Delete Floor</h2>
        <div class="block copyblock"> 
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table class="form">					
                <tr>
                    <td>
                        <select id="select" name="select">
                            <option value="0">Select Floor</option>
                             <?php if($floors){ while($row = $floors->fetch_assoc()){ ?>
                            <option><?php echo $row['floor']; ?></option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Delete" onclick="return confirm('Are you sure to Delete Floor! (ALL THE ROOMS OF THIS FLOOR WILL BE DELETED)');"/>
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