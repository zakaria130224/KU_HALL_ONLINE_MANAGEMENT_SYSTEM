<?php
   require_once '../resources/library/database.php';
   require_once '../resources/library/session.php';
   $db = new database();
    if(isset($_GET['studentId1']) && ($_GET['studentId2'])){
        $studentId1 = $_GET['studentId1'];
        $studentId2  = $_GET['studentId2'];
        session::init();
        $adminId = session::get("adminId");
        //echo var_dump($adminId);

       // $query="UPDATE exchange_application_form SET adminId = '$adminId' WHERE studentId1='$studentId1' AND studentId2='$studentId2'";
       // $result = $db->insertUpdateDelete($query);
        $query="UPDATE residential SET acceptRequest=NULL WHERE studentId='$studentId1'";
        $result = $db->insertUpdateDelete($query);

        $query="UPDATE residential SET request = NULL,acceptRequest=NULL WHERE studentId='$studentId2'";
        $result = $db->insertUpdateDelete($query);

        $query="UPDATE residential AS r1 JOIN residential AS r2 ON ( r1.studentId = '$studentId1' AND r2.studentId = '$studentId2' ) OR ( r1.studentId = '$studentId2' AND r2.studentId = '$studentId1' ) SET r1.roomNo = r2.roomNo, r2.roomNo = r1.roomNo, r1.request = r2.request, r2.request = r1.request";
        $result = $db->insertUpdateDelete($query);

        $query="UPDATE residential SET approval = '1' WHERE studentId='$studentId1' OR studentId='$studentId2'";
        $result = $db->insertUpdateDelete($query);

        $query="UPDATE residential SET request = NULL,acceptRequest=NULL WHERE request='$studentId1'";
        $result = $db->insertUpdateDelete($query);


        header("Location: seatExchange.php");
        exit();
    }
?>