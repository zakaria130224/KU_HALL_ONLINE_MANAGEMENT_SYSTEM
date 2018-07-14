<?php require '../resources/classes/roomManagement.php'; ?>
<?php require '../resources/classes/student.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $p = new roomManagement();
    $st = new student();
    $stu1 = $st->getStudent1ForExchange();
    $stu2 = $st->getStudent2ForExchange();
    $adminId = session::get('adminId');
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Applications for Seat Exchange</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th>Student ID 1</th>
                    <th>Discipline</th>
                    <th>Class</th>
                    <th>Room No.</th>
                    <th>Image</th>
                    <th></th>
                    <th>Student ID 2</th>
                    <th>Discipline</th>
                    <th>Class</th>
                    <th>Room No.</th>
                    <th>Image</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
             if($stu1 && $stu2){
                $rowCount = mysqli_num_rows($stu1);
                $stu1 = mysqli_fetch_all($stu1,MYSQLI_ASSOC);
                $stu2 = mysqli_fetch_all($stu2,MYSQLI_ASSOC);
             for ($x=0; $x<$rowCount; $x++) {
            ?>
                <tr class="odd gradeX">
                    <td><?php echo $stu1[$x]['studentId']; ?></td>
                    <td><?php echo $stu1[$x]['discipline']; ?></td>
                    <td><?php echo $stu1[$x]['year']." - ".$stu1[$x]['term']; ?></td> 
                    <td><?php $roomNo = $st->getRoomNo($stu1[$x]['studentId']); $roomNo=mysqli_fetch_assoc($roomNo); echo $roomNo['roomNo']; ?></td>
                    <td><?php if($stu1[$x]['photo']){ ?><a href="zoom4.php?image=<?php echo $stu1[$x]['photo']; ?>"><img src="<?php echo $stu1[$x]['photo']; ?>" height="40px" width="60px"/></a> <?php }else{ echo "No Image";} ?></td>    
                    <td>||</td>    
                     <td><?php echo $stu2[$x]['studentId']; ?></td>
                    <td><?php echo $stu2[$x]['discipline']; ?></td>
                    <td><?php echo $stu2[$x]['year']." - ".$stu2[$x]['term']; ?></td> 
                    <td><?php $roomNo = $st->getRoomNo($stu2[$x]['studentId']); $roomNo=mysqli_fetch_assoc($roomNo); echo $roomNo['roomNo']; ?></td>
                    <td><?php if($stu2[$x]['photo']){ ?><a href="zoom4.php?image=<?php echo $stu2[$x]['photo']; ?>"><img src="<?php echo $stu2[$x]['photo']; ?>" height="40px" width="60px"/></a> <?php }else{ echo "No Image";} ?></td>       
                    <td>
                    <a href="acceptExchange.php?studentId1=<?php echo $stu1[$x]['studentId']; ?>&studentId2=<?php echo $stu2[$x]['studentId']; ?>" onclick="return confirm('Are you sure to Accept!');" >Accept</a> || 
                    <a href="rejectExchange.php?studentId1=<?php echo $stu1[$x]['studentId']; ?>&studentId2=<?php echo $stu2[$x]['studentId']; ?>" onclick="return confirm('Are you sure to Reject!');" >Reject</a> 
                    </td>
                </tr>
                <?php }} ?> 
            </tbody>
        </table>

       </div>
    </div>
</div>

<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
