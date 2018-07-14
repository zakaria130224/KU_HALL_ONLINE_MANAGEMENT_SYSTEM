<?php include 'include/header.php'; ?>
<?php
	$st = new student();

	$request = $st->getRequest(session::get("studentId"));
    $accRequest = $st->getAccRequest(session::get("studentId"));
    $approval = $st->getApprovalNotice(session::get("studentId"));
    $seatApproval = $st->getSeatApprovalNotice(session::get("studentId"));
    session::set("approval","2");
    $flag=0;
    $flag2=0;
?>

		

		<table class="notification">
		  <tr>
		    <th>Notification</th>
		  </tr>

		  <?php if($request){ $flag=1; ?><tr><td><a class="flashingbutton" style="padding: 10px 10px;" href="exchangeRequest.php?studentId2=<?php echo $request['studentId']; ?>&studentName=<?php echo $request['studentName']; ?>">NEW SEAT EXCHANGE REQUEST</a></td></tr><?php } ?>

		  <?php if($accRequest){ $flag=1; $flag2=1; ?><tr><td><a class="inactiveLink" style="color: red; text-decoration: none;" href=""><?php echo $accRequest['studentName']; ?> [Student ID: <?php echo $accRequest['studentId']; ?>] accepted your seat exchange request. Wait for ADMIN approval...</a></td></tr><?php } ?>

		  	<?php if($approval && $approval[0]['approval']=="1"){ $flag=1; $flag2=2; ?><tr><td><a style="color: red;text-decoration: none; font-size: 20px;" href=""><tr><td>Seat Exchange application accepted. Your current room number: <?php echo $approval[0]['roomNo']; ?></a></td></tr><?php } ?>

		  	<?php if($approval && $approval[0]['approval']=="0"){ $flag=1; $flag2=3; ?><tr><td><a style="color: red;text-decoration: none; font-size: 20px;" href="">Seat Exchange application rejected</a></td></tr><?php } ?>

		  	<?php if($seatApproval && $seatApproval[0]['approval']=="1"){ $flag=1; $flag2=4; session::set("approval","1"); $nm=$st->getRoomNo(session::get("studentId")); $nm=mysqli_fetch_assoc($nm); ?><tr><td><a style="color: red;text-decoration: none; font-size: 20px;" href="">Application for seat accepted. Acceptance Date: <?php echo $seatApproval[0]['approvalDate']; ?>, Room No: <?php echo $nm['roomNo']; ?></a></tr></td><?php } ?>

		  	<?php if($seatApproval && $seatApproval[0]['approval']=="0"){ $flag=1; $flag2=5; session::set("approval","0"); ?><tr><td><a style="color: red;text-decoration: none; font-size: 20px;" href="">Application for seat rejected</a></td></tr><?php } ?>

		  	<?php if($flag == 0){ ?><tr><td>No Notification</td></tr><?php } ?>
		  	<?php
		  		if($flag2==1 || $flag2==2 || $flag2==3 || $flag2==4 || $flag2==5){
		  			$res = $st->clearNotification(session::get("studentId"),session::get("approval"));
		  		}
		  	?>
		</table>

<?php include 'include/footer.php'; ?>

  
					     

					     	
					     