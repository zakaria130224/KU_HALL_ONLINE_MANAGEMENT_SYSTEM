<?php include 'include/header.php'; ?>

<?php
	if(isset($_GET['studentId2']) && isset($_GET['studentName'])){
		$studentId2 = $_GET['studentId2'];
		$studentName = $_GET['studentName'];
	}
	$rm = new roomManagement();
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['accept'])){
	    $check = $rm->acceptRequest($_POST, session::get("studentId"));
    }
    else if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['reject'])){
	    $check = $rm->rejectRequest($_POST, session::get("studentId"));
    }
?>
		<div class="abouthall content fix">
		  	<p style="font-size: 30px;margin: 70px auto; color: black;text-align: center;">Seat exchange request from- <?php echo $studentName; ?>, Student ID: <?php echo $studentId2; ?>, Room No: <?php $roomNo = $st->getRoomNo($studentId2); $roomNo=mysqli_fetch_assoc($roomNo); echo $roomNo['roomNo']; ?><br>[You can exchange seat after admin approval]</p> 
		</div>
		<?php
            if(isset($check)){
                echo $check;
            }
        ?>
		<form style="text-align: center;margin-bottom: 40px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input id="button1" type="submit" name="accept" value="Accept" onclick="return confirm('Are you sure to Accept!');"/>
             <input id="button2" type="submit" name="reject" value="Reject" onclick="return confirm('Are you sure to Reject!');"/>
        </form>
<?php include 'include/footer.php'; ?>