<?php
require_once '../resources/library/database.php';

    if(isset($_GET['studentId'])){
        $studentId = $_GET['studentId'];
        $db = new database();

        $query = "UPDATE student SET type=false WHERE studentId='$studentId'";
        $result = $db->insertUpdateDelete($query);
        $query = "DELETE FROM residential WHERE studentId='$studentId'";
        $result = $db->insertUpdateDelete($query);
        if($result){  
                    $query = "SELECT vivaReport FROM seat_application_form WHERE studentId='$studentId'";
                    $file = $db->select($query);
                    if($file){
                        $file = mysqli_fetch_assoc($file);
                        $div = explode('.', $file['vivaReport']);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $name = "../resources/RecycleBin/".$unique_image;
                        //rename($file['vivaReport'], $name);
                        unlink($file['vivaReport']);
                    } 
                    $query = "DELETE FROM seat_application_form WHERE studentId='$studentId'";
                    $result = $db->insertUpdateDelete($query);

       }    
       }      
        header("Location: studentList.php?type=Residential");
        exit();
?>