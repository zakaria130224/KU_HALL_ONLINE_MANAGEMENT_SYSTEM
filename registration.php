<?php include 'include/header.php'; ?>
<?php if(session::checkSessionStudent()){
    header("location: index.php");
    } ?>
<?php
    $st = new studentRegistration();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $st->registration($_POST, $_FILES);
    }
?>
        <div class="studentform content fix">
        	<center><div class="heading fix">
                <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>

                <div class="form-style">
                <h1>Student Registration Form</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <div class="section"><span>1</span>Name, Student ID &amp; Email</div>
                    <div class="inner-wrap">
                        <label>Your Full Name <input type="text" name="studentName" required /></label>
                        <label>Student ID <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="studentId" placeholder="Digit only" required /></label>
                        <label>Email <input type="email" name="email" required /></label>
                    </div>

                    <div class="section"><span>2</span>Username &amp; Password</div>
                    <div class="inner-wrap">
                        <label>Username <input type="text" name="username" placeholder="Will be used for login" required /></label>
                        <label>Password <input type="password" name="password" placeholder="Will be used for login" required /></label>
                    </div>

                    <div class="section"><span>3</span>Student Information</div>
                    <div class="inner-wrap">
                        <label>Discipline <input type="text" name="discipline" placeholder="Discipline" required /></label>
                        <label>Session <input type="text" name="session" placeholder="Session" required /></label>         
                        <select name="year" >
                            <option value="0" selected="selected" >Year</option>
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>
                        </select><br/>
                        <select name="term" >
                            <option value="0" selected="selected" >Term</option>
                            <option>1st</option>
                            <option>2nd</option>
                        </select><br/>
                    </div>
                    <div class="section"><span>4</span>Images</div>
                    <div class="inner-wrap">
                        <label><b>Student's image</b></label>
                            <div style="margin-left: 18px;" class="imageborder fix">
                                <img id="uploadPreview" style="width: 100%; height: 100%;" />
                                <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" required><br/>
                            </div>
                            <label><b>Scan copy of money receipt<b></label>
                            <div style="margin-left: 18px;" class="imageborder fix">
                                <input type="file" name="moneyReceipt" required><br/>
                            </div>
                    </div>
                    <div class="button-section">
                     <input style="padding-right: 67px; padding-bottom: 25px;" type="submit" name="register" value="Register" onclick="return confirm('Are you sure to Submit!');" />
                     <input id="button2" type="reset" name="reset" value="Reset"/>
                    </div>
                </form>
                </div>

        		
        	</div></center>
        </div>


		<?php include 'include/footer.php'; ?>