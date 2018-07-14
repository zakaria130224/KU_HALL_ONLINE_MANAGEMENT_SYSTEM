<?php require '../resources/classes/adminLogin.php' ?>
<?php
    $adlog = new adminLogin();
    $db = new database();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $username = mysqli_real_escape_string($db->link, $username);
        $password = mysqli_real_escape_string($db->link, $password);
        $logincheck = $adlog->login($username, $password);
    }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/ownStyle.css">
</head>
<body>
<div class="container">
	<section id="content">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<p class="msg">
                    <?php
                        if(isset($logincheck)){
                            echo $logincheck;
                        }
                    ?>
                </p>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Khulna University Hall Management</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>