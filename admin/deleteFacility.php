<?php
	require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';

    if(isset($_GET['title'])){
    	$db = new database();
      $title = $_GET['title'];
      $query="SELECT image FROM facilities WHERE title='$title'";
      $result = $db->select($query);
      if($result)
      {
          $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
          $file = $result[0]['image'];
          unlink($file);
      }
        $query="delete from facilities WHERE title='$title'";
        $result = $db->insertUpdateDelete($query);
        if($result)
        {
             header("Location: facilityList.php");
             exit();
          
        }
	}
?>