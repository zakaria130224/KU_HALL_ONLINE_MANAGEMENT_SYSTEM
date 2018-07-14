<?php               
$filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>
<?php
class admin
{
	private $db;
    private $fm;
	function __construct()
	{
		$this->db = new database();
        $this->fm = new format();
	}
	public function updateProfile($data, $oldUsername)
        {
            $adminName = $this->fm->validation($data['adminName']);
            $designation = $this->fm->validation($data['designation']);
            $email = $this->fm->validation($data['email']);

        	$adminName = mysqli_real_escape_string($this->db->link, $adminName);
        	$designation = mysqli_real_escape_string($this->db->link, $designation);
        	$email = mysqli_real_escape_string($this->db->link, $email);
                	session::set("adminName",$adminName);
                    session::set("designation",$designation);
                    session::set("email",$email);
                	$query = "UPDATE admin SET adminName='$adminName',designation='$designation',email='$email' where username='$oldUsername'";
                	$result2 = $this->db->insertUpdateDelete($query);
                    if($result2){   
                        $msg = "<span class='success'>Profile Updated successfully</span>";
                        return $msg;
                    }
                    else{
                        $msg = "<span class='error'>Failed</span>";
                        return $msg;
                    } 
        
        }

        public function changePassword($username,$oldpassword,$password)
        {
            $username = $this->fm->validation($username);
            $adminPassword = $this->fm->validation($password);
            $adminoldPassword = $this->fm->validation($oldpassword);
            
            if(empty($username) || empty($adminPassword) || empty($adminoldPassword)){
                $msg = "<span class='error'>Fields must not be empty</span>";
                return $msg;
            }
            else{
                $query = "select * from admin where username='$username' and password='$adminoldPassword'";
                $result = $this->db->select($query);
                if($result!= false){
                    $query = "UPDATE admin SET password='$adminPassword' WHERE username='$username'";
                    $result = $this->db->insertUpdateDelete($query);
                    if($result == true){
                        $msg = "<span class='success'>Password Change Successfull</span>";
                    }
                    else{
                        $msg = "<span class='error'>Failed</span>";
                    }
                return $msg;
            }
            $msg = "<span class='error'>Old Password not match.</span>";
            return $msg;
        }
    }
    public function addNewAdmin($data){
        $adminId = $this->fm->validation($data['adminId']);
        $username = $this->fm->validation($data['username']);
        $password = $this->fm->validation($data['password']);

        $adminId = mysqli_real_escape_string($this->db->link, $adminId);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $password = mysqli_real_escape_string($this->db->link, $password);
        $password = md5($password);

        $query = "SELECT adminId FROM admin WHERE adminId='$adminId'";
        $result = $this->db->select($query);
        if($result){
            $msg = "<span class='error'>adminId already exists.</span>";
            return $msg;
        }
        $query = "SELECT username FROM admin WHERE username='$username'";
        $result = $this->db->select($query);
        if($result){
            $msg = "<span class='error'>Username already exists.</span>";
            return $msg;
        }

        $query = "INSERT INTO admin(adminId,username,password) VALUES('$adminId','$username','$password')";
        $result = $this->db->insertUpdateDelete($query);
        if($result){
            $msg = "<span class='success'>New admin added. Now new admin can login.</span>";
            return $msg;
        }
    }
    public function getAllAdmin(){
        $query = "select username,level FROM admin WHERE validity is true";
        $result = $this->db->select($query);
        return $result;
    }
    public function deleteAdmin($username){
        $username = $this->fm->validation($username);
        $username = mysqli_real_escape_string($this->db->link, $username);
        if($username=="0"){
            $msg = "<span class='error'>No admin selected.</span>";
            return $msg;
        }
        $query = "UPDATE admin SET validity=false WHERE username='$username'";
        $result = $this->db->insertUpdateDelete($query);
        if($result){
            $msg = "<span class='success'>Admin deleted successfully.</span>";
            return $msg;
        }
    }
    public function addNewAuthority($data,$file){
        $name = $this->fm->validation($data['name']);
        $name = mysqli_real_escape_string($this->db->link, $name);
        $designation = $this->fm->validation($data['designation']);
        $designation = mysqli_real_escape_string($this->db->link, $designation);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "../resources/album/".$unique_image;
        if(empty($file_name))
        {
            $msg = "<span class='error'>field must not be empty</span>";
            return $msg;
        }
        else if (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
        }
        else
        {
            $query = "INSERT INTO authorities (name,designation,image) VALUES('$name','$designation','$uploaded_image')";
            $result = $this->db->insertUpdateDelete($query);
            if($result){   
                move_uploaded_file($file_temp, $uploaded_image);
                $msg = "<span class='success'>Authority inserted successfully</span>";
                return $msg;
            }
            else{
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
    }
    public function getAuthority(){
        $query = "select name,designation,image FROM authorities";
        $result = $this->db->select($query);
        return $result;
    }
}
?>