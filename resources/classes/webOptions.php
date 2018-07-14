<?php
    $filepath = realpath(dirname(__FILE__));
    require_once ($filepath.'/../library/database.php');
    require_once ($filepath.'/../helpers/format.php');
?>
<?php
    class webOptions{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        
        public function getOptions(){
            $query="SELECT * FROM siteoptions WHERE id='1'";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateOptions($data){
            $title = $this->fm->validation($data['title']);
            $hallName = $this->fm->validation($data['name']);
            $address = $this->fm->validation($data['address']);
            $phone = $this->fm->validation($data['phone']);
            $fax = $this->fm->validation($data['fax']);
            $email = $this->fm->validation($data['email']);

            $title = mysqli_real_escape_string($this->db->link, $title);    //built in- for security of database
            $hallName = mysqli_real_escape_string($this->db->link, $hallName);
            $address = mysqli_real_escape_string($this->db->link, $address);
            $phone = mysqli_real_escape_string($this->db->link, $phone);
            $fax = mysqli_real_escape_string($this->db->link, $fax);
            $email = mysqli_real_escape_string($this->db->link, $email);

            $query = "UPDATE siteoptions SET title='$title',hallName='$hallName',address='$address',phone='$phone',fax='$fax',email='$email' WHERE id='1'";
            $result = $this->db->insertUpdateDelete($query);
            if($result)
            {
                $msg = "<span class='success'>Updated successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }

        public function getAllSliders(){
            $query="SELECT * FROM slide";
            $result = $this->db->select($query); 
            return $result;
        }
        public function getAllLogo(){
            $query="SELECT headerImage,logo1,logo2 FROM siteoptions WHERE id='1'";
            $result = $this->db->select($query); 
            $result = mysqli_fetch_assoc($result);
            return $result;
        }
        public function addSlider($file, $slideNumber)
        {
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "../resources/sliders/".$unique_image;
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
                $query = "SELECT image FROM slide WHERE id='$slideNumber'";
                $result2 = $this->db->select($query);
                if($result2)
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                if($result2[0]['image']){
                    $uploaded_image = $result2[0]['image'];
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE slide SET image='$uploaded_image' WHERE id=$slideNumber";
                $result = $this->db->insertUpdateDelete($query);
                if($result){   
                    $msg = "<span class='success'>Slider updated successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
            }
        }
        public function addLogo($file, $slideNumber)
        {
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "../resources/logo/".$unique_image;
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
                if($slideNumber=="1"){
                    $query = "SELECT headerImage FROM siteoptions WHERE id='1'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['headerImage']){
                        $uploaded_image = $result2[0]['headerImage'];
                    }
                }
                else if($slideNumber=="2"){
                    $query = "SELECT logo1 FROM siteoptions WHERE id='1'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['logo1']){
                        $uploaded_image = $result2[0]['logo1'];
                    }
                }
                else if($slideNumber=="3"){
                    $query = "SELECT logo2 FROM siteoptions WHERE id='1'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['logo2']){
                        $uploaded_image = $result2[0]['logo2'];
                    }
                }
                move_uploaded_file($file_temp, $uploaded_image);
                if($slideNumber=="1")
                    $query = "UPDATE siteoptions SET headerImage='$uploaded_image' WHERE id='1'";
                else if($slideNumber=="2")
                    $query = "UPDATE siteoptions SET logo1='$uploaded_image' WHERE id='1'";
                else if($slideNumber=="3")
                    $query = "UPDATE siteoptions SET logo2='$uploaded_image' WHERE id='1'";
                $result = $this->db->insertUpdateDelete($query);
                if($result){   
                    $msg = "<span class='success'>Logo updated successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
            }
        }
         public function getAboutContact()
        {
            $query = "SELECT aboutUs,contact FROM siteoptions WHERE id='1'";
            $result = $this->db->select($query);
            return $result;
        }
         public function addAboutContact($data)
         {
            $aboutUs = $data['aboutUs'];
            $contact = $data['contact'];
            //$aboutUs = $this->fm->validation($data['aboutUs']);
            //$contact = $this->fm->validation($data['contact']);
            $aboutUs = mysqli_real_escape_string($this->db->link, $aboutUs);
            $contact = mysqli_real_escape_string($this->db->link, $contact);

            $query = "UPDATE siteoptions SET aboutUs='$aboutUs',contact='$contact' WHERE id='1'";
            $result = $this->db->insertUpdateDelete($query);
            if($result)
            {
                $msg = "<span class='success'>Updated Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function addNotice($data)
        {
            //$title = $this->fm->validation($data['title']);
            //$detail = $this->fm->validation($data['detail']);
            $title = mysqli_real_escape_string($this->db->link, $data['title']);
            $detail = mysqli_real_escape_string($this->db->link, $data['detail']);
            $date = date("d/m/Y");
            if(empty($title) || empty($detail)){
                $msg = "<span class='error'>Fields must not be empty.</span>";
                return $msg;
            }
            $query = "SELECT title FROM notices WHERE title='$title'";
            $result = $this->db->select($query);
            if($result){
                $msg = "<span class='error'>Title already exists.</span>";
                return $msg;
            }

            $query = "INSERT INTO notices (title,detail,date) values('$title','$detail','$date')";
            $result = $this->db->insertUpdateDelete($query);
            if($result)
            {
                $msg = "<span class='success'>Notice Inserted Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed.</span>";
                return $msg;
            }
        }
        public function countNews(){
            $query = "SELECT count(id) FROM news";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function get4News(){
            $query="SELECT * FROM news ORDER BY id DESC LIMIT 4 OFFSET 0";
            $result = $this->db->select($query); 
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        
        }
        public function getNewsById($id){
            $query="SELECT * FROM news WHERE id='$id'";
            $result = $this->db->select($query); 
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        
        }
        public function getDetailByTitle($title){
            $query="SELECT id,detail FROM news WHERE title='$title' ORDER BY id DESC";
            $result = $this->db->select($query); 
            return $result;
        }
        public function getDetailByTitleNotice($title){
            $query="SELECT id,detail FROM notices WHERE title='$title' ORDER BY id DESC";
            $result = $this->db->select($query); 
            return $result;
        }
        public function getAllTitle(){
            $query="SELECT title FROM news ORDER BY id DESC";
            $result = $this->db->select($query); 
            return $result;
        
        }
        public function getAllNotice(){
            $query="SELECT title FROM notices ORDER BY id DESC";
            $result = $this->db->select($query); 
            return $result;
        
        }
        public function deleteNews($data){
            $id = $data['id'];
            $query="SELECT image FROM news WHERE id='$id'";
            $result = $this->db->select($query);
            if($result)
            {
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                $file = $result[0]['image'];
                unlink($file);
            }

            $query="DELETE FROM news WHERE id='$id'";
            $result = $this->db->insertUpdateDelete($query); 
             if($result){   
                $msg = "<span class='success'>News deleted successfully.</span>";
                return $msg;
            }
        
        }
        public function deleteNotice($data){
            $id = $data['id'];
            $query="DELETE FROM notices WHERE id='$id'";
            $result = $this->db->insertUpdateDelete($query); 
             if($result){   
                $msg = "<span class='success'>News deleted successfully.</span>";
                return $msg;
            }
        
        }
        public function addNews($data, $file)
        {
            //$title = $this->fm->validation($data['title']);
            $title = mysqli_real_escape_string($this->db->link, $data['title']);
            //$detail = $this->fm->validation($data['detail']);
            $detail = mysqli_real_escape_string($this->db->link, $data['detail']);
            $date = date("d/m/Y");

            $query = "SELECT title FROM news WHERE title='$title'";
            $result = $this->db->select($query);
            if($result){   
                $msg = "<span class='error'>Title already exists.</span>";
                return $msg;
            }
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
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO news (title,image,detail,date) VALUES('$title','$uploaded_image','$detail','$date')";
                $result = $this->db->insertUpdateDelete($query);
                if($result){   
                    $msg = "<span class='success'>News insertedd successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
            }
        }
        public function addScrollNotice($data){
            $notice = $this->fm->validation($data['notice']);
            $notice = mysqli_real_escape_string($this->db->link, $notice);

            if(empty($notice)){
                $msg = "<span class='error'>Fields must not be empty.</span>";
                return $msg;
            }

            $query = "UPDATE siteoptions SET scrollNotice='$notice' WHERE id=1";
            $result = $this->db->insertUpdateDelete($query);
            if($result)
            {
                $msg = "<span class='success'>Notice Updated Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed.</span>";
                return $msg;
            }
        }
        public function getScrollNotice()
        {
            $query="SELECT scrollNotice FROM siteoptions";
            $result = $this->db->select($query); 
            if($result)
                $result = mysqli_fetch_assoc($result);
            return $result;
        }
        public function getSiteData()
        {
            $query="SELECT * FROM siteoptions";
            $result = $this->db->select($query); 
            if($result)
                $result = mysqli_fetch_assoc($result);
            return $result;
        }
        public function get4Notice()
        {
            $query="SELECT * FROM notices ORDER BY id DESC LIMIT 4 OFFSET 0";
            $result = $this->db->select($query); 
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function getNoticeById($id){
            $query="SELECT detail FROM notices WHERE id='$id'";
            $result = $this->db->select($query); 
            if($result)
                $result = mysqli_fetch_assoc($result);
            return $result;
        }
        public function addMsg($data)
         {
            $provostMsg = $this->fm->validation($data['provostMsg']);
            $welcomeMsg = $this->fm->validation($data['welcomeMsg']);
            $provostMsg = mysqli_real_escape_string($this->db->link, $provostMsg);
            $welcomeMsg = mysqli_real_escape_string($this->db->link, $welcomeMsg);

            $query = "UPDATE siteoptions SET provostMsg='$provostMsg',welcomeMsg='$welcomeMsg' WHERE id='1'";
            $result = $this->db->insertUpdateDelete($query);
            if($result)
            {
                $msg = "<span class='success'>Updated Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function getMsg()
        {
            $query = "SELECT provostMsg,welcomeMsg FROM siteoptions WHERE id='1'";
            $result = $this->db->select($query);
            return $result;
        }
        public function addUserMsg($data){
            $firstName = $this->fm->validation($data['firstName']);
            $lastName = $this->fm->validation($data['lastName']);
            $email = $this->fm->validation($data['email']);
            $msg = $this->fm->validation($data['msg']);
            $firstName = mysqli_real_escape_string($this->db->link, $firstName);
            $lastName = mysqli_real_escape_string($this->db->link, $lastName);
            $email = mysqli_real_escape_string($this->db->link, $email);
            $msg = mysqli_real_escape_string($this->db->link, $msg);

            $query = "INSERT into messages (firstName,lastName,email,msg) VALUES('$firstName','$lastName','$email','$msg')";
            $result = $this->db->insertUpdateDelete($query);
            if($result){
                header('location: successMsg.php?msg=Enquiry sent successfully.');
                exit();
            }
        }
        public function getUserMsg(){
            $query = "SELECT * FROM messages ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function countNotice(){
            $query = "SELECT count(id) FROM notices";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function getNotice($limit, $offset){
            $query = "SELECT * FROM notices ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function getNews($limit, $offset){
            $query = "SELECT * FROM news ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function getAllAuthority(){
            $query = "SELECT * FROM authorities";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function getNumber(){
            $query = "SELECT * FROM emergency";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
        public function updateNumber($data)
         {
            $ambulance1 = $this->fm->validation($data['ambulance1']);
            $ambulance2 = $this->fm->validation($data['ambulance2']);
            $fire1 = $this->fm->validation($data['fire1']);
            $fire2 = $this->fm->validation($data['fire2']);
            $medical1 = $this->fm->validation($data['medical1']);
            $medical2 = $this->fm->validation($data['medical2']);
            $hospital1 = $this->fm->validation($data['hospital1']);
            $hospital2 = $this->fm->validation($data['hospital2']);
            $police1 = $this->fm->validation($data['police1']);
            $police2 = $this->fm->validation($data['police2']);
            

            $query = "UPDATE emergency SET phone1='$ambulance1',phone2='$ambulance2' WHERE service='ambulance'";
            $result = $this->db->insertUpdateDelete($query);
            $query = "UPDATE emergency SET phone1='$fire1',phone2='$fire2' WHERE service='fire'";
            $result = $this->db->insertUpdateDelete($query);
            $query = "UPDATE emergency SET phone1='$medical1',phone2='$medical2' WHERE service='medical'";
            $result = $this->db->insertUpdateDelete($query);
            $query = "UPDATE emergency SET phone1='$hospital1',phone2='$hospital2' WHERE service='hospital'";
            $result = $this->db->insertUpdateDelete($query);
            $query = "UPDATE emergency SET phone1='$police1',phone2='$police2' WHERE service='police'";
            $result = $this->db->insertUpdateDelete($query);
            if($result)
            {
                $msg = "<span class='success'>Updated</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function addNewFacility($data,$file){
        $title = $this->fm->validation($data['title']);
        $title = mysqli_real_escape_string($this->db->link, $title);
        $details = $this->fm->validation($data['details']);
        $details = mysqli_real_escape_string($this->db->link, $details);

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
            $query = "SELECT title FROM facilities WHERE title='$title'";
            $result = $this->db->select($query);
            if($result){   
                $msg = "<span class='error'>Facility title already exists.</span>";
                return $msg;
            }
            $query = "INSERT INTO facilities (title,details,image) VALUES('$title','$details','$uploaded_image')";
            $result = $this->db->insertUpdateDelete($query);
            if($result){   
                move_uploaded_file($file_temp, $uploaded_image);
                $msg = "<span class='success'>Facility inserted successfully</span>";
                return $msg;
            }
            else{
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
    }
    public function getFacilities(){
            $query = "SELECT * FROM facilities";
            $result = $this->db->select($query);
            if($result)
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        }
    }
?>