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
    $count = $nt->countNews();
    $count = $count[0]['count(id)'];
    $news = $nt->getNews($limit,$offset);
    $totalPages = ceil(($count/$limit));
?>

		<h2 style="color: red; text-align: center;margin: 20px 20px; font-size: 20px;">News and Events</h2>

		<table>
		  <tr>
		    <th>Title</th>
		    <th>Date</th>
		    <th>Image</th>
		    <th>Detail</th>
		  </tr>
		  <?php if($news){ foreach($news as $data){ ?>
		  
		  <tr>
		    <td><a style="text-decoration: none;" href="detailNews.php?id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a></td>
		    <td><a style="text-decoration: none;" href="detailNews.php?id=<?php echo $data['id']; ?>"><?php echo $data['date']; ?></a></td>
		    <td><a style="text-decoration: none;" href="detailNews.php?id=<?php echo $data['id']; ?>"><img style="height: 60px; width: 50px;" src="admin/<?php echo $data['image']; ?>"></a></td>
		    <td><a style="text-decoration: none; color: black;" href="detailNews.php?id=<?php echo $data['id']; ?>"><?php echo substr($data['detail'],0,100).'.....'; ?></a></td>
		  </tr>
		  
		  <?php }} ?>
		</table>

		<?php if($news){ ?>
        <section class="change-page">
            <ul class="pagination">
              <li><a href="allNews.php?page=1">First</a></li>
              <?php foreach(range(1, $totalPages) as $page){
                  if($page == $currentPage){ ?>
                    <li><a class="active" href="allNews.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                <?php }
                else if($page == 1 || $page == $totalPages || ($page >= $currentPage - 1 && $page <= $currentPage + 1)){  ?>
                    <li><a href="allNews.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
               <?php }} ?>
                  
              <li><a href="allNews.php?page=<?php echo $totalPages; ?>">Last</a></li>
               
            </ul>
        </section>
        <?php } ?>

<?php include 'include/footer.php'; ?>