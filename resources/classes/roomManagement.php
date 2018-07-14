<?php
$filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>
<?php
    class roomManagement{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        public function addFloor($name){
            $name = $this->fm->validation($name);
            $name = mysqli_real_escape_string($this->db->link, $name);
               $msg = "<span class='error'>Field must not be empty</span>";
              if(empty($name)){
               return $msg;
            }
            else{
                $query = "SELECT floor FROM rooms";
                $res = $this->db->select($query);
                $temp = 0;
                if($res != false){
                    while($row = $res->fetch_assoc()) {
                        if($row['floor'] == $name)
                            $temp = 1;
                    }
                }
                if($temp == 0){
                    $query = "INSERT INTO rooms (floor) VALUES('$name')";
                    $result = $this->db->insertUpdateDelete($query);
                    if($result){   
                        $msg = "<span class='success'>Floor inserted successfully</span>";
                        return $msg;
                    }
                    else{
                        $msg = "<span class='error'>Failed</span>";
                        return $msg;
                    }
                }
                else {
                    $msg = "<span class='error'>Floor already exists</span>";
                    return $msg;
                }
            }
            
        }
        public function getAllFloor(){
            $query = "SELECT floor FROM rooms";
            $result = $this->db->select($query);
            return $result;
        }
        public function deleteFloor($name){
            if($name == '0'){
                $msg = "<span class='error'>Select a floor</span>";
                return $msg;
            }
            $query = "SELECT * FROM rooms WHERE floor='$name'";
            $result = $this->db->select($query);
            $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $start = $result[0]['start'];
            $end = $result[0]['end'];

            $query = "SELECT * FROM residential WHERE roomNo BETWEEN '$start' AND '$end'";
            $result = $this->db->select($query);
            if($result){
                $msg = "<span class='error'>Can not delete. Floor contains student.</span>";
                return $msg;
            }

            $query = "DELETE FROM rooms WHERE floor='$name'";
            $result = $this->db->insertUpdateDelete($query);
            if($result){
                $msg = "<span class='success'>Floor deleted successfully</span>";
                return $msg;
            }
            $msg = "<span class='error'>Failed</span>";
            return $msg;
        }
        public function getRoomsByFloor($name){
            $query = "SELECT * FROM rooms WHERE floor='$name'";
            $result = $this->db->select($query);
            return $result;   
        }
        public function addRooms($name,$start,$end){
            $start = $this->fm->validation($start);
            $end = $this->fm->validation($end);
            $start = mysqli_real_escape_string($this->db->link, $start);
            $end = mysqli_real_escape_string($this->db->link, $end);

            $query = "SELECT start,end FROM rooms WHERE floor='$name'";
            $result = $this->db->select($query);
            if($result){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $oldstart = $result[0]['start'];
                $oldend = $result[0]['end'];
                if($oldend!=NULL && $oldstart!=NULL && ($start > $oldstart || $end < $oldend)){
                    $msg = "<span class='error'>You can not concise roomNo.</span>";
                    return $msg;
                }
            }
            //$start = intval($start);
            //$end = intval($end);
            $query = "UPDATE rooms SET start='$start',end='$end' WHERE floor='$name'";
            $result = $this->db->insertUpdateDelete($query);
            if($result){
                $msg = "<span class='success'>Rooms updated successfully</span>";
                return $msg;
            }
            $msg = "<span class='error'>Failed</span>";
            return $msg;
        }
        public function checkEmptyRoom($roomNo){
            $roomNo = $this->fm->validation($roomNo);
            $roomNo = mysqli_real_escape_string($this->db->link, $roomNo);

            $query = "SELECT studentId FROM residential WHERE roomNo='$roomNo'";
            $result = $this->db->select($query);
            if($result)
                $rowcount=mysqli_num_rows($result);
            else {
                $rowcount = 0;
            }
            return $rowcount;
        }
        public function assignRoom($adminId,$formNo,$studentId,$roomNo){
            $adminId = $this->fm->validation($adminId);
            $formNo = $this->fm->validation($formNo);
            $studentId = $this->fm->validation($studentId);
            $roomNo = $this->fm->validation($roomNo);
            $adminId = mysqli_real_escape_string($this->db->link, $adminId);
            $formNo = mysqli_real_escape_string($this->db->link, $formNo);
            $studentId = mysqli_real_escape_string($this->db->link, $studentId);
            $roomNo = mysqli_real_escape_string($this->db->link, $roomNo);

            $dateTime=getdate();
            $date = $dateTime['month']." ".$dateTime['mday'].", ".$dateTime['year'];

            if($roomNo == 0){
                $msg = "<span class='error'>Select Room.</span>";
                return $msg;
            }

            $query = "SELECT studentId FROM residential WHERE studentId='$studentId'";
            $res = $this->db->select($query);
            if($res==false){
                $query = "UPDATE seat_application_form SET approvalDate='$date',adminId='$adminId',approval='1' WHERE formId='$formNo'";
                $result = $this->db->insertUpdateDelete($query);
                if($result){
                    $query = "INSERT INTO residential (studentId,formId,roomNo) VALUES('$studentId','$formNo','$roomNo')";
                    $result = $this->db->insertUpdateDelete($query);

                    $query = "UPDATE student SET type=true WHERE studentId='$studentId'";
                    $result2 = $this->db->insertUpdateDelete($query);
                    if($result && $result2){
                        $msg = "<span class='success'>Rooms assigned successfully</span>";
                        return $msg;
                    }
                }
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
            else{
                $msg = "<span class='error'>Student alredy has a seat.</span>";
                return $msg;
            }
        
        }
        public function acceptRequest($data, $studentId){
            $studentId = $this->fm->validation($studentId);
            $studentId = mysqli_real_escape_string($this->db->link, $studentId);

            $query = "UPDATE residential SET acceptRequest='1' WHERE studentId='$studentId'";
            $result = $this->db->insertUpdateDelete($query);
            $st = new Student();
            if($result){
                $res = $st->clearNotification(session::get("studentId"),session::get("approval"));
                $msg = "Seat exchange request accepted successfully. Wait for admin approval.";
                header("Location: successMsg.php?msg=".$msg);
                exit();
            }
            $msg = "<span class='error'>Failed</span>";
            return $msg;
        }
        public function rejectRequest($data, $studentId){
            $studentId = $this->fm->validation($studentId);
            $studentId = mysqli_real_escape_string($this->db->link, $studentId);

            $query = "UPDATE residential SET request=NULL WHERE studentId='$studentId'";
            $result = $this->db->insertUpdateDelete($query);
             $st = new Student();
            if($result){
                $res = $st->clearNotification(session::get("studentId"),session::get("approval"));
                $msg = "Seat exchange request rejected successfully.";
                header("Location: successMsg.php?msg=".$msg);
                exit();
            }
            $msg = "<span class='error'>Failed</span>";
            return $msg;
        }
    }
?>