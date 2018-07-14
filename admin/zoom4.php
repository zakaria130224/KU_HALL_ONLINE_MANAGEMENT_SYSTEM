<!DOCTYPE html>
<html lang="en">

<style>
body {
    background-color: black;
    padding-right: 40px;
    padding-left: 40px;
    padding-bottom: 40px;
}
i {
 
}
i:hover{

}
.icon-big{
     float: right;
    font-size: 250%;
    display: block;
    color: white;
    margin-bottom: 10px;
     transition: color .5s;
}
.icon-big:hover{
     color: red;
}
.actions a{
  color: white;
  font-size: 40px;
  text-decoration: none;
  border: 1px solid white;
  padding:10px;
  background-color: transparent;
  transition: color .3s, background-color .3s;
}
.actions a:hover{
  color: red;
  background-color: white;
}
.actions{
    margin-top: 20px;
}
</style>
    <head>
        <link rel="stylesheet" type="text/css" href="css/ionicons.min.css">
    </head>
    
  <body>
  <?php
  if(isset($_GET['image'])){
      $photo = $_GET['image'];
    ?>
    <a href="seatExchange.php"><i class="ion-close-round icon-big"></i></a>
      <img src="<?php echo $photo; ?>" height="520px;" width="100%;"/>
      <?php
  } 
  ?>
  </body>
</html>