<?php require '../resources/classes/roomManagement.php'; ?>  
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $rm = new roomManagement();
    if(isset($_POST['update'])){
        $start=$_POST['start'];
        $end=$_POST['end'];
        $check = $rm->addRooms(session::get("tempFloor"), $start,$end);
    }
    $floors = $rm->getAllFloor();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add Floor</h2>
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
                        <input type="submit" name="seeRooms" Value="See Rooms"/>
                    </td>
                </tr>
                <?php
                    if (isset($_POST['seeRooms'])) {
                       $room = $rm->getRoomsByFloor($_POST['select']);
                       if($room){
                        $room = $room->fetch_assoc();
                ?>
                <tr>
                    <td>
                        <?php echo $room['floor']; session::set("tempFloor",$room['floor']); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="start">Room Number start from:</label>
                        <input type="text" name="start" id="start" value="<?php echo $room['start']; ?>" class="large" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="end">Room Number ends:</label>
                        <input type="text" name="end" id="end" value="<?php echo $room['end']; ?>" class="large" />
                    </td>
                </tr>
                <tr> 
                    <td>
                        <input type="submit" name="update" Value="Update Rooms"  onclick="return confirm('Are you sure to Update');"/>
                    </td>
                </tr>
                <?php }} ?>
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