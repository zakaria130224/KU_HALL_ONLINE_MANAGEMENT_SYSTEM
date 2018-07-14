<?php
	require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';

    if(isset($_GET['id'])){
    	$db = new database();
      $id = $_GET['id'];
        $query="SELECT image FROM slide WHERE id='$id'";
        $result = $db->select($query);
        if($result)
        {
            $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $file = $result[0]['image'];
                if (unlink($file))
               {
                 $query="UPDATE slide SET image= NULL WHERE id='$id'";
                 $result2 = $db->insertUpdateDelete($query);
                 header("Location: slider.php");
                 exit();
               }
              else
              {
                 echo "Sorry... Somethings went wrong";
               }
        }
	}
?>