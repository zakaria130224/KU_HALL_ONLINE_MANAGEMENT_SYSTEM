<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$wbo = new webOptions();
	$msg = $wbo->getUserMsg();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
					<?php if($msg){ while($value=mysqli_fetch_assoc($msg)){ ?>
						<tr class="odd gradeX">
							<td><?php echo $value['firstName']." ".$value['lastName']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo chunk_split($value['msg'], 50, '<br>'); ?></td>
							<td><a href="deleteUserMsg.php?id=<?php echo $value['id']; ?>">Delete</a></td>
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
