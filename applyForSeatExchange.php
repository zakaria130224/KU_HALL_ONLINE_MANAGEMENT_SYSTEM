<?php include 'include/header.php'; ?>
<?php if(!session::checkSessionStudent()){
    header("location: index.php");
    } ?>
<?php
    $st = new student();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $st->appForSeatExchange($_POST, session::get("studentId"));
    }
?>
        <div class="studentform content fix">
        	<center><div class="heading fix">
            <div class="form-style">
        		<h1>Application for seat exchange</h1>
                <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>
        		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        		  <div class="inner-wrap">
                        <label>Student ID of whose room you want to exchange (he will get notification, after his acknowledgment your application will be valid.)</label>
                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="studentId2" placeholder="Student ID" required><br/>
                        <div class="button-section">
                        <input id="button1" type="submit" name="apply" value="Apply" onclick="return confirm('Are you sure to Apply!');"/>
                        <input id="button2" type="reset" name="reset" value="Reset"/>
                        </div>
                    </div>
        		</form>
                </div>
        	</div></center>
        </div>


		<?php include 'include/footer.php'; ?>