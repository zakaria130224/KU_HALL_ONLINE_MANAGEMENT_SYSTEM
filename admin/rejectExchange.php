<?php
   require_once '../resources/library/database.php';
   $db = new database();
    if(isset($_GET['studentId1']) && ($_GET['studentId2'])){
        $studentId1 = $_GET['studentId1'];
        $studentId2  = $_GET['studentId2'];

        //$query="DELETE FROM exchange_application_form WHERE studentId1='$studentId1' AND studentId2='$studentId2'";
        //$result = $db->insertUpdateDelete($query);
       // if($result){
            $query="UPDATE residential SET request = NULL,acceptRequest=NULL WHERE studentId='$studentId2'";
            $result = $db->insertUpdateDelete($query);  

            $query="UPDATE residential SET approval = '0' WHERE studentId='$studentId1' OR studentId='$studentId2'";
          $result = $db->insertUpdateDelete($query); 
        //}

        header("Location: seatExchange.php");
        exit();
    }
?>