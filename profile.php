<?php include 'include/header.php'; ?>
<?php
    $st = new student();
    if(isset($_GET['studentId'])){
        $studentData = $st->getStudentById($_GET['studentId']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $st->updateStudent($_POST);
    }
?>

        <div class="studentform content fix">
        	<center><div class="heading fix">
            <div class="form-style">
        		<h1>Information of <?php echo $studentData[0]['studentId']; ?><?php if(isset($studentData[0]['roomNo'])){ ?><span>Room No: <?php echo $studentData[0]['roomNo']; ?></span><?php } ?></h1>
                <?php if(isset($studentData[0]['roomNo'])){ ?>
                <p style="font-size: 20px; color: red; margin-top: 10px;">Room No: <?php echo $studentData[0]['roomNo']; ?></p>
                <?php } ?>
        		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        		  <div class="inner-wrap">
                    <label>Student Name <input id="fname fix" type="text" name="studentName" value="<?php echo $studentData[0]['studentName']; ?>" required></label>
                    <input id="fname fix" type="hidden" name="studentId" value="<?php echo $studentData[0]['studentId']; ?>">
                     <label>Email <input type="email" name="email" value="<?php echo $studentData[0]['email']; ?>" required></label>
        			
                    <label>Discipline <input type="text" name="discipline" value="<?php echo $studentData[0]['discipline']; ?>" required></label>
        			
                    <label>Year:</label>		
        			    <select name="year" >
        				    <option <?php if($studentData[0]['year']=="1st"){ ?>selected<?php } ?>>1st</option>
                            <option <?php if($studentData[0]['year']=="2nd"){ ?>selected<?php } ?>>2nd</option>
                            <option <?php if($studentData[0]['year']=="3rd"){ ?>selected<?php } ?>>3rd</option>
                            <option <?php if($studentData[0]['year']=="4th"){ ?>selected<?php } ?>>4th</option>
        			    </select><br/>
                        <label>Term:</label>
        			    <select name="term" >
        				    <option <?php if($studentData[0]['term']=="1st"){ ?>selected<?php } ?>>1st</option>
                            <option <?php if($studentData[0]['term']=="2nd"){ ?>selected<?php } ?>>2nd</option>
                        </select><br/>
                    <label>Session <input type="text" name="session" value="<?php echo $studentData[0]['session']; ?>" required></label>
                    <div class="button-section">
                        <input style="padding-right: 67px; padding-bottom: 25px;" type="submit" name="update" value="Update" onclick="return confirm('Are you sure to Update!');"/>
                    </div>
                    </div>
        		</form>
                </div>
        	</div></center>
        </div>

		<?php include 'include/footer.php'; ?>