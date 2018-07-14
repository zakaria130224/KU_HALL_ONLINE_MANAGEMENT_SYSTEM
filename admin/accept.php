<?php
    require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';

    if(isset($_GET['id']) && ($_GET['adminId'])){
        $form_id = $_GET['id'];
        $adminId  = $_GET['adminId'];
    	$db = new database();
        $query = "SELECT * FROM sign_up_form WHERE formId='$form_id'";
        $data = $db->select($query);
        if($data!=false){
            $data = mysqli_fetch_all($data,MYSQLI_ASSOC);
            $query = "SELECT studentId FROM student";
            $result2 = $db->select($query);
            $flag = 0;
            if($result2){
                while($row = $result2->fetch_assoc()){
                    if($row['studentId'] == $data[0]['studentId']){
                        $flag = 1;
                    }
                }
            }
            if($flag == 0){
                $studentId = mysqli_real_escape_string($db->link,$data[0]['studentId']);
                $studentName = mysqli_real_escape_string($db->link,$data[0]['studentName']);
                $email = mysqli_real_escape_string($db->link,$data[0]['email']);
                $discipline = mysqli_real_escape_string($db->link,$data[0]['discipline']);
                $year = mysqli_real_escape_string($db->link,$data[0]['year']);
                $term = mysqli_real_escape_string($db->link,$data[0]['term']);
                $session = mysqli_real_escape_string($db->link,$data[0]['session']);
                $photo = mysqli_real_escape_string($db->link,$data[0]['photo']);
                $username = mysqli_real_escape_string($db->link,$data[0]['username']);
                $password = mysqli_real_escape_string($db->link,$data[0]['password']);
                if(empty($photo)){
                    $query="INSERT INTO student(studentId,studentName,email,discipline,year,term,session,username,password) VALUES('$studentId','$studentName','$email','$discipline','$year','$term','$session','$username','$password')";
                }
                else{
                    $query="INSERT INTO student(studentId,studentName,email,discipline,year,term,session,photo,username,password) VALUES('$studentId','$studentName','$email','$discipline','$year','$term','$session','$photo','$username','$password')";
                }
                $result = $db->insertUpdateDelete($query);
                $query = "UPDATE sign_up_form SET adminId='$adminId' WHERE formId='$form_id'";
                $result = $db->insertUpdateDelete($query);
            }
            
        }
        header("Location: attachment.php");
        exit();
	}
?>