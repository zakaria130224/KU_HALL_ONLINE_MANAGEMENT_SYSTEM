<?php
$filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
    //ob_start();
?>
<?php
    class student{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        public function studentLogin($data){
            $username = $this->fm->validation($data['username']);
            $password = $this->fm->validation($data['password']);
            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, $password);
            $password = md5($password);
            
            if(empty($username) || empty($password)){
                $msg = "<span class='error'>Username or passord must not be empty.</span>";
                return $msg;
            }
            else{
                $query = "select studentId,studentName from student where username='$username' and password='$password'";
                $result = $this->db->select($query);
                if($result != false){
                    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    session::set("studentLogin",true);
                    $studentId = $result[0]['studentId'];
                    $query = "select studentId from residential where studentId='$studentId'";
                    $re = $this->db->select($query);
                    $rowCount = mysqli_num_rows($re);
                    $isResidential = false;
                    if($rowCount>0)
                        $isResidential = true;
                    session::set("isResidential",$isResidential);
                    session::set("studentId",$result[0]['studentId']);
                    session::set("studentName",$result[0]['studentName']);
                    header("Location: index.php");
                    exit();
                }
                else{
                    $msg = "<span class='error'>Username or password does not match.</span>";
                    return $msg;
                }
            }
        }
        public function appForSeat($data,$file,$studentId)
        {
            $studentId = $this->fm->validation($studentId);
            $gpa = $this->fm->validation($data['gpa']);
            $retake = $this->fm->validation($data['retake']);
            $income = $this->fm->validation($data['income']);

            $studentId = mysqli_real_escape_string($this->db->link, $studentId);
            $gpa = mysqli_real_escape_string($this->db->link, $gpa);
            $retake = mysqli_real_escape_string($this->db->link, $retake);
            $income = mysqli_real_escape_string($this->db->link, $income);


            //image validation
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['vivaReport']['name'];
            $file_size = $file['vivaReport']['size'];
            $file_temp = $file['vivaReport']['tmp_name'];
            
            
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $vivaReport = "../resources/vivaReport/".$unique_image;
            $vivaReportLoc = "resources/vivaReport/".$unique_image;
               
            if(empty($studentId)||empty($gpa)||empty($income)||empty($file_name)){
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            else if ($file_size >2097152) {
             $msg = "<span class='error'>Image size should not be greater than 2mb</span>";
                return $msg;
            } elseif (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }
            else{
                $query = "SELECT studentId FROM seat_application_form WHERE studentId='$studentId'";
                $getID = $this->db->select($query);
            
                if($getID ==false){
                move_uploaded_file($file_temp, $vivaReportLoc);
                $formId = substr(md5(time()), 0, 10);
                $query = "INSERT INTO seat_application_form (formID,studentId,gpa,retake,income,vivaReport) VALUES('$formId','$studentId','$gpa','$retake','$income','$vivaReport')";

                $result = $this->db->insertUpdateDelete($query);
                if($result){  
                    $msg = "After admin approval you will get room number.";
                    header("Location: successMsg.php?msg=".$msg);
                    exit(); 
                    //$msg = "<span class='success'>Registration successfull</span>";
                    //return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
             }
             else{
                $msg = "<span class='error'>you already applied.</span>";
                return $msg;
             }
            
            }
        }
        public function appForSeatExchange($data,$studentId){
            $studentId2 = $this->fm->validation($data['studentId2']);
            $studentId = $this->fm->validation($studentId);

            $studentId2 = mysqli_real_escape_string($this->db->link, $studentId2);
            $studentId = mysqli_real_escape_string($this->db->link, $studentId);
            if($studentId2 == $studentId){
                $msg = "<span class='error'>You can not send yourself request.</span>";
                return $msg;
            }
               
            if(empty($studentId)||empty($studentId2)){
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            else{
                $query = "SELECT request FROM residential WHERE studentId='$studentId'";
                $getID4 = $this->db->select($query);
                if($getID4){
                    $getID4 = mysqli_fetch_assoc($getID4);
                    if($getID4['request']!=NULL){
                        $msg = "<span class='error'>You can not send request for seat exchange when you have a pending seat exchange request.</span>";
                        return $msg;
                    }
                }

                $query = "SELECT studentId FROM residential WHERE studentId='$studentId2'";
                $getID2 = $this->db->select($query);
                if($getID2 == false){
                    $msg = "<span class='error'>Student does not exist in hall.</span>";
                    return $msg;
                }
                $query = "SELECT request FROM residential WHERE studentId='$studentId2'";
                $getID = $this->db->select($query);
                $getID = mysqli_fetch_assoc($getID);
                if($getID['request'] ==NULL){
                $query = "UPDATE residential SET request='$studentId' WHERE studentId='$studentId2'";

                $result = $this->db->insertUpdateDelete($query);
                if($result){   
                    $msg = "Seat exchange request sent successfully.";
                    header("Location: successMsg.php?msg=".$msg);
                    exit();
                    //$msg = "<span class='success'>Registration successfull</span>";
                    //return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
             }
             else{
                $msg = "<span class='error'>He already has a request.</span>";
                return $msg;
             }
            
            }
        }
        public function getStudents($type){
            if($type == "Non-Residential"){
                $query = "SELECT * FROM student where type is not false and studentId not in(SELECT studentId FROM residential)";
            }
            else if($type == "Residential"){
                $query = "SELECT * FROM student where studentId in(SELECT studentId FROM residential)";
            }
            $result = $this->db->select($query);
            if($result){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
            return $result;
        }
        public function getRoomNo($studentId){
            $query="SELECT roomNo FROM residential WHERE studentId='$studentId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getStudent1ForExchange(){
            $query = "select student.studentId,discipline,year,term,photo from student,residential WHERE residential.request=student.studentId AND acceptRequest is not NULL";
            $result = $this->db->select($query);
            return $result;
        }
        public function getStudent2ForExchange(){
            $query = "select student.studentId,discipline,year,term,photo from student,residential WHERE student.studentId=residential.studentId AND acceptRequest is not NULL";
            $result = $this->db->select($query);
            return $result;
        }

        public function getRequest($studentId){
            $query = "SELECT student.studentId,studentName FROM student,residential WHERE student.studentId=request AND residential.studentId='$studentId' AND acceptRequest is NULL";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_assoc($result);
            return $result;
        }
        public function getAccRequest($studentId){
            $query = "SELECT student.studentId,studentName FROM student,residential WHERE student.studentId=residential.studentId AND residential.request='$studentId' AND acceptRequest is not NULL";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_assoc($result);
            return $result;
        }
        public function getApprovalNotice($studentId){
            $query = "SELECT roomNo,approval FROM residential WHERE studentId='$studentId' AND approval is not NULL";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function getSeatApprovalNotice($studentId){
            $query = "SELECT approvalDate,approval FROM seat_application_form WHERE studentId='$studentId' AND approval is not NULL";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function clearNotification($studentId,$approval){
            if($approval=="0"){
                $query = "DELETE FROM seat_application_form WHERE studentId='$studentId'";
                $result = $this->db->insertUpdateDelete($query);
            }
            else if($approval=="1"){
                $query = "UPDATE seat_application_form SET approval=NULL WHERE studentId='$studentId'";
                $result = $this->db->insertUpdateDelete($query);
            }

            $query = "UPDATE residential SET approval=NULL WHERE studentId='$studentId'";
            $result = $this->db->insertUpdateDelete($query);
            return $result;
        }
        public function getStudentById($studentId){
            $query = "SELECT studentId FROM residential WHERE studentId = '$studentId'";
            $result = $this->db->select($query);
            if($result){
                $query = "SELECT student.studentId,student.studentName,student.email,student.discipline,student.year,student.term,student.session,student.photo,type,moneyReceipt,gpa,retake,income,vivaReport,approvalDate,roomNo FROM student,residential,seat_application_form,sign_up_form WHERE student.studentId='$studentId' AND student.studentId=residential.studentId AND student.studentId=seat_application_form.studentId AND student.studentId=sign_up_form.studentId";
            }
            else {
                $query = "SELECT studentId FROM seat_application_form WHERE studentId = '$studentId'";
                $result = $this->db->select($query);
                if($result){
                    $query = "SELECT student.studentId,student.studentName,student.email,student.discipline,student.year,student.term,student.session,student.photo,type,moneyReceipt,gpa,retake,income,vivaReport,approvalDate FROM student,seat_application_form,sign_up_form WHERE student.studentId='$studentId' AND student.studentId=seat_application_form.studentId AND student.studentId=sign_up_form.studentId";
                }
                else{
                    $query = "SELECT student.studentId,student.studentName,student.email,student.discipline,student.year,student.term,student.session,student.photo,type,moneyReceipt FROM student,sign_up_form WHERE student.studentId='$studentId' AND student.studentId=sign_up_form.studentId";
                }

            }     
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function getFormerStudents(){
            $query = "SELECT * FROM student WHERE type=false";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function updateStudent($data){
            $studentId = $this->fm->validation($data['studentId']);
            $studentName = $this->fm->validation($data['studentName']);
            $email = $this->fm->validation($data['email']);
            $discipline = $this->fm->validation($data['discipline']);
            $year = $this->fm->validation($data['year']);
            $term = $this->fm->validation($data['term']);
            $session = $this->fm->validation($data['session']);

            $studentId = mysqli_real_escape_string($this->db->link, $studentId);
            $studentName = mysqli_real_escape_string($this->db->link, $studentName);
            $email = mysqli_real_escape_string($this->db->link, $email);
            $discipline = mysqli_real_escape_string($this->db->link, $discipline);
            $year = mysqli_real_escape_string($this->db->link, $year);
            $term = mysqli_real_escape_string($this->db->link, $term);
            $session = mysqli_real_escape_string($this->db->link, $session);

            $query = "UPDATE sign_up_form SET studentName='$studentName',email='$email',discipline='$discipline',year='$year',term='$term',session='$session' WHERE studentId='$studentId'";
            $result = $this->db->insertUpdateDelete($query);

            $query = "UPDATE student SET studentName='$studentName',email='$email',discipline='$discipline',year='$year',term='$term',session='$session' WHERE studentId='$studentId'";
            $result2 = $this->db->insertUpdateDelete($query);

            if($result && $result2){
                header('Location: successMsg.php?msg=Profile information updated successfully.');
                exit();
            }
    }
    public function checkFormer($studentId){
         $query = "SELECT type FROM student WHERE studentId='$studentId'";
            $result = $this->db->select($query);
            $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            if($result[0]['type']){
                return false;
            }
            return true;
    }

    public function countStudent($key){
            $query = "SELECT count(studentId) FROM student where studentId LIKE '%$key%' OR studentName LiKE '%$key%'";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function getStudentBySearch($limit, $offset, $key){
            $query = "SELECT * FROM student WHERE studentId LIKE '%$key%' OR studentName LiKE '%$key%' ORDER BY LOCATE('$key', studentName) LIMIT {$limit} OFFSET {$offset}";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
}
?>

            