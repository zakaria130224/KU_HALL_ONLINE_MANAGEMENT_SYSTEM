<?php
	require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';

    if(isset($_GET['id'])){
    	$db = new database();
      $id = $_GET['id'];
        $query="delete from messages WHERE id='$id'";
        $result = $db->insertUpdateDelete($query);
        if($result)
        {
      
             header("Location: inbox.php");
             exit();
          
        }
	}
?>