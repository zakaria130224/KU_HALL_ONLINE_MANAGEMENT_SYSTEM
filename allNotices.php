<?php include 'include/header.php'; ?>
<?php
	$limit = 4;
	if(!isset($_GET['page'])){
	    $currentPage = 1;
	}
	else{
	    $currentPage = (int)$_GET['page'];
	}

	$offset = ($currentPage - 1) * ($limit);

	$nt = new webOptions();
    $count = $nt->countNotice();
    $count = $count[0]['count(id)'];
    $notice = $nt->getNotice($limit,$offset);
    $totalPages = ceil(($count/$limit));
?>

		<h2 style="color: red; text-align: center;margin: 20px 20px; font-size: 20px;">NOTICE BOARD</h2>

		<table>
		  <tr>
		    <th style="width: 25%;">Title</th>
		    <th>Date</th>
		    <th>Detail</th>
		  </tr>
		  <?php if($notice){ foreach($notice as $data){ ?>
		  <tr>
		    <td style="font-size: 15px;"><a style="text-decoration: none; color: black;" href="detailNotice.php?id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a></td>
		    <td style="font-size: 15px;"><?php echo $data['date']; ?></td>
		    <td style="font-size: 15px;"><a style="text-decoration: none; color: black;" href="detailNotice.php?id=<?php echo $data['id']; ?>"><?php echo substr($data['detail'],0,150)."....."; ?></a></td>
		  </tr>
		  <?php }} ?>
		</table>

		<?php if($notice){ ?>
        <section class="change-page">
            <ul class="pagination">
              <li><a href="allNotices.php?page=1">First</a></li>
              <?php foreach(range(1, $totalPages) as $page){
                  if($page == $currentPage){ ?>
                    <li><a class="active" href="allNotices.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                <?php }
                else if($page == 1 || $page == $totalPages || ($page >= $currentPage - 1 && $page <= $currentPage + 1)){  ?>
                    <li><a href="allNotices.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
               <?php }} ?>
                  
              <li><a href="allNotices.php?page=<?php echo $totalPages; ?>">Last</a></li>
               
            </ul>
        </section>
        <?php } ?>

<?php include 'include/footer.php'; ?>