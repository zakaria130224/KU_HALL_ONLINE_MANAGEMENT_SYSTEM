<?php
	require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';

    if(isset($_GET['id'])){
    	$db = new database();
      $id = $_GET['id'];
      $query="SELECT image FROM authorities WHERE id='$id'";
      $result = $db->select($query);
      if($result)
      {
          $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
          $file = $result[0]['image'];
          unlink($file);
      }
        $query="delete from authorities WHERE id='$id'";
        $result = $db->insertUpdateDelete($query);
        if($result)
        {
             header("Location: authorityList.php");
             exit();
          
        }
	}
?>