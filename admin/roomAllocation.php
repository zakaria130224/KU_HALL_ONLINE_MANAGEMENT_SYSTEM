<?php require '../resources/classes/roomManagement.php'; ?>  
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    if(isset($_GET['id']) && isset($_GET['adminId']) && isset($_GET['studentId'])){
        $formId = $_GET['id'];
         $adminId = $_GET['adminId'];
          $studentId = $_GET['studentId'];
          session::set("tempstu",$studentId);
          session::set("tempform",$formId);
    }
    $rm = new roomManagement();
    if(isset($_POST['assign'])){
        $roomNo=$_POST['select'];
        $studentId = $_POST['studentId'];
        $check = $rm->assignRoom(session::get("adminId"),session::get("tempform"),$studentId,$roomNo);
    }
    $floors = $rm->getAllFloor();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Assign Room for <?php echo session::get("tempstu"); ?></h2>
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
                        <input type="text" name="studentId" Value="<?php echo session::get("tempstu"); ?>" readonly/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $room['floor']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select id="select" name="select">
                            <option value="0">Select Room</option>
                             <?php $numOfRooms = $room['end'] - $room['start'];
                                for($x=$room['start']; $x<=$room['end']; $x++){
                                    $rmc = $rm->checkEmptyRoom($x);
                                    if($rmc<=4){
                             ?>
                            <option><?php echo $x; ?></option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
                <tr> 
                    <td>
                        <input type="submit" name="assign" Value="Assign Room"/>
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