<?php require '../resources/classes/applications.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $p = new applications();
    $applications = $p->getSeatApplicationForms();
    $adminId = session::get('adminId');
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Applications for Seat</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Student Name</th>
					<th>Discipline</th>
					<th>Class</th>
					<th>GPA</th>
					<th>Retake Course</th>
					<th>Annual Income</th>
					<th>Money Receipt</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
			 if($applications){
			 foreach ($applications as $app) {
			 	$student = $p->getStudentById2($app['studentId']);
			?>
				<tr class="odd gradeX">
					<td><?php echo $app['studentId']; ?></td>
					<td><?php echo $student[0]['studentName']; ?></td>
					<td><?php echo $student[0]['discipline']; ?></td>
					<td><?php echo $student[0]['year']." - ".$student[0]['term']; ?></td>
					<td><?php echo $app['gpa']; ?></td>	
					<td><?php echo $app['retake']; ?></td>
					<td><?php echo $app['income']; ?></td>
					<td><a href="zoom2.php?image=<?php echo $app['vivaReport']; ?>&formId=<?php echo $app['formId']; ?>&adminId=<?php echo session::get("adminId"); ?>&studentId=<?php echo $app['studentId']; ?>"><img src="<?php echo $app['vivaReport']; ?>" height="40px" width="60px"/></a></td>			
				<td>
					<a href="roomAllocation.php?id=<?php echo $app['formId']; ?>&adminId=<?php echo session::get("adminId"); ?>&studentId=<?php echo $app['studentId']; ?>" onclick="return confirm('Are you sure to Accept!');" >Accept</a> || 
					<a href="rejectSeatApp.php?id=<?php echo $app['formId']; ?>" onclick="return confirm('Are you sure to Reject!');" >Reject</a> 
				</td>
				</tr>
				<?php }} ?>	
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
