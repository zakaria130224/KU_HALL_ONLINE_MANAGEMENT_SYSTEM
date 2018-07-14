<?php
    $filepath = realpath(dirname(__FILE__));

    require ($filepath.'/../library/session.php');
    session::checklogin();                    
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>

<?php
    class adminLogin{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        public function login($email, $password){
            $adminUsername = $this->fm->validation($email);
            $adminPassword = $this->fm->validation($password);
            
            if(empty($adminUsername) || empty($adminPassword)){
                $msg = "Username or passord must not be empty";
                return $msg;
            }
            else{
                $query = "select * from admin where username='$adminUsername' and password='$adminPassword' AND validity is true";
                $result = $this->db->select($query);
                if($result != false){
                    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    session::set("login",true);
                    session::set("adminId",$result[0]['adminId']);
                    session::set("username",$result[0]['username']);
                    session::set("adminName",$result[0]['adminName']);
                    session::set("designation",$result[0]['designation']);
                    session::set("email",$result[0]['email']);
                    session::set("level",$result[0]['level']);
                    header("Location: index.php");
                }
                else{
                    $msg = "<span class='error'>Username or password does not match.</span>";
                    return $msg;
                }
            }
        }
}
?>