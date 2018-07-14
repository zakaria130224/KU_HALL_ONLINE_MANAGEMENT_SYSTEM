<?php
/**
*Session Class
**/
class session{
 public static function init(){
  if(!isset($_SESSION)){
    session_start();
}
 }

 public static function set($key, $val){
  $_SESSION[$key] = $val;
 }

 public static function get($key){
  if (session_status() == PHP_SESSION_NONE) {
        self::init();
      }
  if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
  } else {
   return false;
  }
 }

 public static function checkSession(){    //session sesh hole login page e chole jabe
  self::init();
  if (self::get("login")== false) {
   self::destroy();
   header("Location:login.php");
  }
 }

 public static function checkLogin(){          //login obosthay thakle login page e na giye sorasori index page e jachse
  self::init();
  if (self::get("login")== true) {
   header("Location:index.php");
  }
 }

  public static function checkSessionStudent(){    //session check for student
      if (session_status() == PHP_SESSION_NONE) {
        self::init();
      }
      
      if (self::get("studentLogin")== false) {
        return false;
      }
        return true;
 }
 public static function destroyStu(){
  if (session_status() == PHP_SESSION_NONE) {
        self::init();
      }
  session_destroy();
  header("Location:index.php");
}

 public static function destroy(){
  session_destroy();
     //echo 'ok';
  header("Location:login.php");
 }
}
?>