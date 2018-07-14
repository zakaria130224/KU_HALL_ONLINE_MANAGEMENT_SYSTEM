<?php
include "database.php";

$db = new database();
$query = "select * from admin";
$result = $db->select($query);
$result = mysqli_fetch_all($result,MYSQLI_ASSOC);
//while($row = $read->fetch_assoc())
   //print_r($result);
echo $result[0]['password'];
//echo var_dump($read);
//$name = mysqli_real_escape_string($db->link, $name);
//echo "<span style='color:green'>"abc"</span>";
?>