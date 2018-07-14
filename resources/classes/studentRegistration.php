<?php               
$filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>
<?php
class studentRegistration
{
	private $db;
    private $fm;
	function __construct()
	{
		$this->db = new database();
        $this->fm = new format();
	}
	public function registration($data, $file){
            $studentId = $this->fm->validation($data['studentId']);
            $studentName = $this->fm->validation($data['studentName']);
            $email = $this->fm->validation($data['email']);
            $discipline = $this->fm->validation($data['discipline']);
            $year = $this->fm->validation($data['year']);
            $term = $this->fm->validation($data['term']);
            $session = $this->fm->validation($data['session']);
            $username = $this->fm->validation($data['username']);
            $password = $this->fm->validation($data['password']);

            $studentId = mysqli_real_escape_string($this->db->link, $studentId);
            $studentName = mysqli_real_escape_string($this->db->link, $studentName);
            $email = mysqli_real_escape_string($this->db->link, $email);
            $discipline = mysqli_real_escape_string($this->db->link, $discipline);
            $year = mysqli_real_escape_string($this->db->link, $year);
            $term = mysqli_real_escape_string($this->db->link, $term);
            $session = mysqli_real_escape_string($this->db->link, $session);
            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, $password);
            $password = md5($password);


            //image validation
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
            
            
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $photo = "../resources/photo/".$unique_image;
            $photoLoc = "resources/photo/".$unique_image;

            $file_name2 = $file['moneyReceipt']['name'];
            $file_size2 = $file['moneyReceipt']['size'];
            $file_temp2 = $file['moneyReceipt']['tmp_name'];
            
            
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $moneyReceipt = "../resources/moneyReceipt/".$unique_image;
            $moneyReceiptLoc = "resources/moneyReceipt/".$unique_image;
               
            if(empty($studentId)||empty($studentName)||empty($email)||empty($discipline)||empty($year)||empty($term)||empty($session)||empty($username)||empty($password)||empty($file_name)||empty($file_name2)||$year=="0"||$term=="0"){
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            elseif ($file_size >2097152 || $file_size2 >2097152) {
             $msg = "<span class='error'>Image size should not be less than 2mb</span>";
                return $msg;
            } elseif (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }
            else{
                $query = "SELECT studentId FROM student WHERE studentId='$studentId'";
                $getID = $this->db->select($query);

                $query = "SELECT studentId FROM sign_up_form WHERE studentId='$studentId'";
                $getID2 = $this->db->select($query);

                $query = "SELECT username FROM student WHERE username='$username'";
                $getID3 = $this->db->select($query);
            
                if($getID ==false && $getID2==false && $getID3==false){
                move_uploaded_file($file_temp, $photoLoc);
                move_uploaded_file($file_temp2, $moneyReceiptLoc);
                $formId = substr(md5(time()), 0, 10);
                $query = "INSERT INTO sign_up_form (formID,studentId,studentName,email,discipline,year,term,session,photo,moneyReceipt,username,password) VALUES('$formId','$studentId','$studentName','$email','$discipline','$year','$term','$session','$photo','$moneyReceipt','$username','$password')";

                $result = $this->db->insertUpdateDelete($query);
                if($result){  
                    $msg = "Registration successful. You can sign-in after admin approval.";
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
                $msg = "<span class='error'>Student ID already Exists or you already registered.</span>";
                return $msg;
             }
            
        }
    }
}
?>