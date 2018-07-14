<?php
require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';

    if(isset($_GET['id'])){
        $form_id = $_GET['id'];
    	$db = new database();

    	$query="SELECT photo FROM sign_up_form WHERE formId='$form_id'";
	      $result = $db->select($query);
	      if($result)
	      {
	          $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
	          $file = $result[0]['photo'];
	          echo $file;
	          unlink($file);
	      }

	      $query="SELECT moneyReceipt FROM sign_up_form WHERE formId='$form_id'";
	      $result = $db->select($query);
	      if($result)
	      {
	          $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
	          $file = $result[0]['moneyReceipt'];
	          echo $file;
	          unlink($file);
	      }

        $query = "DELETE FROM sign_up_form WHERE formId='$form_id'";
        $result = $db->insertUpdateDelete($query);           
        header("Location: attachment.php");
        exit();
	}
?>