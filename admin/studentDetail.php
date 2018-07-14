<?php require '../resources/classes/student.php'; 
ob_start(); ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $st = new student();
    if(isset($_GET['studentId']) && isset($_GET['type'])){
        $studentId = $_GET['studentId'];
        $type = $_GET['type'];
        $student = $st->getStudentById($studentId);
    }
    
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['remove'])){
        header("Location: removeStudent.php?studentId=".$_POST['studentId']);
        exit();
    }
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['delete'])){
        header("Location: deleteStudent.php?studentId=".$_POST['studentId']."&type=".$_POST['type']);
        exit();
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Student Details</h2>
        <div class="block">               
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table class="form studentDetail">	
                <?php if(isset($student[0]['photo'])){ ?>
                <tr>
                    <td>
                        <img class="studentPhoto" src="<?php echo $student[0]['photo']; ?>">
                    </td>
                </tr>
                <?php } ?>	
                <tr>
                <td><?php $room = $st->getRoomNo($student[0]['studentId']); if(!$room){ ?> <p class="detailLabel"><?php echo "Non Residential";} ?>.</p> </td>
            <td><p class="detailLabel"><?php if($student[0]['type']==false){ echo "Former student";} else{echo "Active student";}  ?></p> </td>
            </tr>
                <?php if(isset($student[0]['studentId'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">STUDENT ID:</p>
                        <p class="studentData"> <?php echo $student[0]['studentId']; ?></p>
                        <input type="hidden" name="studentId" value="<?php echo $student[0]['studentId']; ?>">
                    </td>
                </tr>
                <?php } ?> 	
                <?php if(isset($student[0]['studentName'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">STUDENT NAME:</p>
                        <p class="studentData"> <?php echo $student[0]['studentName']; ?></p>
                        <input type="hidden" name="type" value="<?php echo $type; ?>">
                    </td>
                </tr>
                <?php } ?>  
	           <?php if(isset($student[0]['email'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">EMAIL:</p>
                        <p class="studentData"> <?php echo $student[0]['email']; ?></p>
                    </td>
                </tr>
                <?php } ?>  
                <?php if(isset($student[0]['discipline'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">DISCIPLINE:</p>
                        <p class="studentData"> <?php echo $student[0]['discipline']; ?></p>
                    </td>
                </tr>
                <?php } ?>        
                <?php if(isset($student[0]['year'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">YEAR:</p>
                        <p class="studentData"> <?php echo $student[0]['year']; ?></p>
                    </td>
                </tr>
                <?php } ?>  
               <?php if(isset($student[0]['term'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">TERM:</p>
                        <p class="studentData"> <?php echo $student[0]['term']; ?></p>
                    </td>
                </tr>
                <?php } ?> 
                <?php if(isset($student[0]['session'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">SESSION:</p>
                        <p class="studentData"> <?php echo $student[0]['session']; ?></p>
                    </td>
                </tr>
                <?php } ?>   
                <?php if(isset($student[0]['gpa'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">GPA:</p>
                        <p class="studentData"> <?php echo $student[0]['gpa']; ?></p>
                    </td>
                </tr>
                <?php } ?> 
                <?php if(isset($student[0]['retake'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">RETAKE:</p>
                        <p class="studentData"> <?php echo $student[0]['retake']; ?></p>
                    </td>
                </tr>
                <?php } ?> 
                <?php if(isset($student[0]['income'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">INCOME:</p>
                        <p class="studentData"> <?php echo $student[0]['income']; ?></p>
                    </td>
                </tr>
                <?php } ?>  
                <?php if(isset($student[0]['roomNo'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">ROOM NO.:</p>
                        <p class="studentData"> <?php echo $student[0]['roomNo']; ?></p>
                    </td>
                </tr>
                <?php } ?>     
                <?php if(isset($student[0]['moneyReceipt'])){ ?>
                <tr>
                    <td>
                        <p style="margin-top: 10px; margin-bottom: 0;" class="photoLabel">MONEY RECEIPT (for hall atachment):</p>
                        <img class="studentPhoto" src="<?php echo $student[0]['moneyReceipt']; ?>">
                    </td>
                </tr>
                <?php } ?>   
               <?php if(isset($student[0]['vivaReport'])){ ?>
                <tr>
                    <td>
                        <p style="margin-top: 10px; margin-bottom: 0;" class="photoLabel">MONEY RECEIPT (for seat application):</p>
                        <img class="studentPhoto" src="<?php echo $student[0]['vivaReport']; ?>">
                    </td>
                </tr>
                <?php } ?>  
                     
                <?php if(isset($student[0]['approvalDate'])){ ?>
                <tr>
                    <td>
                        <p class="detailLabel">APPROVAL DATE (seat confirmation):</p>
                        <p class="studentData"> <?php echo $student[0]['approvalDate']; ?></p>
                    </td>
                </tr>
                <?php } ?> 
				<tr style="float: right;">
                    <td></td>
                    <td>
                        <?php if($type=="Residential"){ ?>
                        <input type="submit" name="remove" Value="Remove Student" onclick="return confirm('Are you sure to Remove Student!');" />
                        <?php } ?>
                        <input type="submit" name="delete" Value="Delete Student" onclick="return confirm('Are you sure to Delete Student!');" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
                    if(isset($check)){
                        echo $check;
                    }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


