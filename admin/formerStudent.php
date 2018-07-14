<?php require '../resources/classes/student.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$st = new student();
	$student = $st->getFormerStudents();
	$type = "Non-Residential";
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Former Student List</h2>
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
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
			 if($student){
			 foreach ($student as $app) {
			?>
				<tr class="odd gradeX">
					<td><a href="studentDetail.php?studentId=<?php echo $app['studentId']; ?>&type=Non-Residential"><?php echo $app['studentId']; ?></a></td>
					<td><a href="studentDetail.php?studentId=<?php echo $app['studentId']; ?>&type=Non-Residential"><?php echo $app['studentName']; ?></a></td>
					<td><?php echo $app['discipline']; ?></td>
					<td><?php echo $app['session']; ?></td>
					<td><?php echo $app['year']." - ".$app['term']; ?></td>
					<td><a href="zoom5.php?image=<?php echo $app['photo']; ?>&studentId=<?php echo $app['studentId']; ?>"><img src="<?php echo $app['photo']; ?>" height="40px" width="60px"/></a></td>	
				   <td>
					<a href="deleteStudent.php?studentId=<?php echo $app['studentId']; ?>&type=Non-Residential" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
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
