<?php
$filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>
<?php

    class applications{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new database();
            $this->fm = new format();
        }
        public function getSignUpForms()
        {
            $query = "SELECT * FROM sign_up_form WHERE adminId is null";
            $result = $this->db->select($query);
            if($result != false){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $result;
            }
            else
            {
                return false;
            }
        }
        public function getStudentById($studentId){
            $query = "SELECT * FROM student,residential WHERE student.studentId='$studentId' AND residential.studentId='$studentId'";
            $result = $this->db->select($query);
            if($result != false){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $result;
            }
            else
            {
                return false;
            }
        }
        public function getStudentById2($studentId){
            $query = "SELECT * FROM student WHERE student.studentId='$studentId'";
            $result = $this->db->select($query);
            if($result != false){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $result;
            }
            else
            {
                return false;
            }
        }
        public function getSeatApplicationForms(){
            $query = "SELECT * FROM seat_application_form WHERE approvalDate is null AND (approval is NULL or approval='1');";
            $result = $this->db->select($query);
            if($result != false){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $result;
            }
            else
            {
                return false;
            }
        }
    }

?>