<?php require '../resources/classes/roomManagement.php'; ?>  
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $rm = new roomManagement();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name=$_POST['floor'];
        $check = $rm->addFloor($name);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Floor</h2>
        <div class="block copyblock"> 
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" placeholder="Enter Foor Name..." name="floor" class="large" />
                    </td>
                </tr>
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Add" onclick="return confirm('Are you sure to Add Floor!');"/>
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