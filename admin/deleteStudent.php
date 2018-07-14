<?php
require_once '../resources/library/database.php';

    if(isset($_GET['studentId']) && isset($_GET['type'])){
        $studentId = $_GET['studentId'];
        $type = $_GET['type'];
        $db = new database();

       // $query = "DELETE FROM exchange_application_form WHERE studentId1='$studentId' or studentId2='$studentId'";
        //$result = $db->insertUpdateDelete($query);
        //if($result){
                $query="UPDATE residential SET request = NULL,acceptRequest=NULL WHERE request='$studentId'";
                $result = $db->insertUpdateDelete($query);
                if($result){
                    
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
                    if($result){
                        $query = "SELECT photo FROM student WHERE studentId='$studentId'";
                        $file = $db->select($query);
                        if($file){
                            $file = mysqli_fetch_assoc($file);
                            $div = explode('.', $file['photo']);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $name = "../resources/RecycleBin/".$unique_image;
                            //rename($file['photo'], $name);
                            unlink($file['photo']);
                        } 
                        $query = "DELETE FROM student WHERE studentId='$studentId'";
                        $result = $db->insertUpdateDelete($query);
                        if($result){
                            $query = "SELECT moneyReceipt FROM sign_up_form WHERE studentId='$studentId'";
                            $file = $db->select($query);
                            if($file){
                                $file = mysqli_fetch_assoc($file); 
                                $div = explode('.', $file['moneyReceipt']);
                                $file_ext = strtolower(end($div));
                                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                                $name = "../resources/RecycleBin/".$unique_image;
                                //rename($file['moneyReceipt'], $name);
                                unlink($file['moneyReceipt']);
                            } 
                            $query = "DELETE FROM sign_up_form WHERE studentId='$studentId'";
                            $result = $db->insertUpdateDelete($query);
                        }
                    }
                }
                
            }
        }          
        header("Location: studentList.php?type=".$type);
        exit();
?>