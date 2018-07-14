<?php
   require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';

    if(isset($_GET['id'])){
        $form_id = $_GET['id'];
    	$db = new database();
    	$query = "SELECT vivaReport FROM seat_application_form WHERE formId='$form_id'";
        $result = $db->select($query);
        $file = mysqli_fetch_assoc($result);
        if($file){
            $div = explode('.', $file['vivaReport']);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $name = "../resources/RecycleBin/".$unique_image;
        	rename($file['vivaReport'], $name);
        } 

        $query = "UPDATE seat_application_form SET approval='0' WHERE formId='$form_id'";
        $result = $db->insertUpdateDelete($query);           
        header("Location: seatAllocation.php");
        exit();
	}
?>