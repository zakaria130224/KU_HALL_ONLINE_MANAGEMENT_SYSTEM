<?php include 'include/header.php'; ?>
<?php if(!session::checkSessionStudent()){
    header("location: index.php");
    } ?>
<?php
    $st = new student();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $st->appForSeat($_POST, $_FILES, session::get("studentId"));
    }
?>
        <div class="studentform content fix">
        	<center><div class="heading fix">
            <div class="form-style">
        		<h1>Application for seat allocation</h1>
                <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>
        		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        		  <div class="inner-wrap">
                        <label>GPA <input type="text" name="gpa" placeholder="GPA.." required /></label>
                        <label>Retake course (if there is) <input type="text" name="retake" placeholder="Retake course..." /></label>
                        
                        <label>Annual Income of parents <input type="text" name="income" placeholder="Annual income..." required /></label>
                    
                    <div class="inner-wrap">
                        <label>Money Receipt</label>
                        <div style="margin-left: 18px;">
                            <img id="uploadPreview" style="width: 100%; height: 100%;" />
                            <input id="uploadImage" type="file" name="vivaReport" onchange="PreviewImage();" required><br/>
                        </div>
                    </div>
                    </div>
                    <div class="button-section">
                        <input id="button1" type="submit" name="apply" value="Apply" onclick="return confirm('Are you sure to Send Request!');"/>
                        <input id="button2" type="reset" name="reset" value="Reset"/>
                    </div>
        		</form>
                </div>
        	</div></center>
        </div>


		<?php include 'include/footer.php'; ?>