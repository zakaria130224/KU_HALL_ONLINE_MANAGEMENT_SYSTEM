<?php require '../resources/classes/applications.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $p = new applications();
    $applications = $p->getSignUpForms();
    $adminId = session::get('adminId');
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Hall Attachment Applications</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Discipline</th>
					<th>Session</th>
					<th>Class</th>
					<th>Image</th>
					<th>Money Receipt</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
			 if($applications){
			 foreach ($applications as $app) {
			?>
				<tr class="odd gradeX">
					<td><?php echo $app['studentId']; ?></td>
					<td><?php echo $app['studentName']; ?></td>
					<td><?php echo $app['discipline']; ?></td>
					<td><?php echo $app['session']; ?></td>
					<td><?php echo $app['year']." - ".$app['term']; ?></td>
					<td><?php if($app['photo']){ ?><a href="zoom.php?image=<?php echo $app['photo']; ?>&formId=<?php echo $app['formId']; ?>&adminId=<?php echo session::get("adminId"); ?>"><img src="<?php echo $app['photo']; ?>" height="40px" width="60px"/></a> <?php }else{ echo "No Image";} ?></td>	
					<td><a href="zoom.php?image=<?php echo $app['moneyReceipt']; ?>&formId=<?php echo $app['formId']; ?>&adminId=<?php echo session::get("adminId"); ?>"><img src="<?php echo $app['moneyReceipt']; ?>" height="40px" width="60px"/></a></td>			
				<td>
					<a href="accept.php?id=<?php echo $app['formId']; ?>&adminId=<?php echo session::get("adminId"); ?>" onclick="return confirm('Are you sure to Accept!');" >Accept</a> || 
					<a href="reject.php?id=<?php echo $app['formId']; ?>" onclick="return confirm('Are you sure to Reject!');" >Reject</a> 
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
