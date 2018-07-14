<?php include 'include/header.php'; ?>
<?php
    $limit = 5;
    if(!isset($_GET['page'])){
        $currentPage = 1;
    }
    else{
        $currentPage = (int)$_GET['page'];
    }
    if(isset($_POST['search'])){
        $key = $_POST['search'];
    }
    else if(isset($_GET['search'])){
        $key = $_GET['search'];
    }
    else{
        $key = "";
    }
    $offset = ($currentPage - 1) * ($limit);

    $nt = new student();
    $count = $nt->countStudent($key);
    $count = $count[0]['count(studentId)'];
    $student = $nt->getStudentBySearch($limit,$offset,$key);
    $totalPages = ceil(($count/$limit));
?>

        <h2 style="color: red; text-align: center;margin: 20px 20px;">SEARCH RESULT for <?php echo $key ?></h2>

        <table>
          <tr style="text-align: center;">
            <th>Student ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Room No</th>
            <th>Type</th>
          </tr>
          <?php if($student){ foreach($student as $data){ ?>
          <tr>
            <td style=" font-size: 17px;"><?php echo $data['studentId']; ?></td>
            <td style=" font-size: 17px;"><?php echo $data['studentName']; ?></td>
            <td style=" font-size: 17px;"><?php echo $data['email']; ?></td>
            <td><img style="height: 60px; width: 50px;" src="admin/<?php echo $data['photo']; ?>"/></td>
            <td style=" font-size: 17px;"><?php $room = $nt->getRoomNo($data['studentId']); if($room){$room=mysqli_fetch_assoc($room); echo $room['roomNo'];} else{echo "Non Residential";} ?> </td>
            <td style=" font-size: 17px;"><?php if($data['type']==false){echo "Former student";} else{echo "Active student";}  ?> </td>
          </tr>
          <?php }} else{ ?><center><p style="font-size: 50px; color: red;">No match</p></center>
          <?php } ?>
        </table>

        <?php if($student){ ?>
        <section class="change-page">
            <ul class="pagination">
              <li><a href="searchResult.php?page=1&search=<?php echo $key ?>">First</a></li>
              <?php foreach(range(1, $totalPages) as $page){
                  if($page == $currentPage){ ?>
                    <li><a class="active" href="searchResult.php?page=<?php echo $page; ?>&search=<?php echo $key ?>"><?php echo $page; ?></a></li>
                <?php }
                else if($page == 1 || $page == $totalPages || ($page >= $currentPage - 1 && $page <= $currentPage + 1)){  ?>
                    <li><a href="searchResult.php?page=<?php echo $page; ?>&search=<?php echo $key ?>"><?php echo $page; ?></a></li>
               <?php }} ?>
                  
              <li><a href="searchResult.php?page=<?php echo $totalPages; ?>&search=<?php echo $key ?>">Last</a></li>
               
            </ul>
        </section>
        <?php } ?>

<?php include 'include/footer.php'; ?>