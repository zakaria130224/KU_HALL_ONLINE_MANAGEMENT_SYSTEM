<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
	spl_autoload_register(function($class_name){
		include "resources/classes/".$class_name.".php";
    });
    require 'resources/library/session.php';
   // session::init();
?>
<?php
        if(isset($_GET['action'])){
            session::destroyStu();                                 //logout click korle session destroy
        }    
        $get = new webOptions();
        $siteData = $get->getSiteData();
        $st = new student();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title><?php echo $siteData['title']; ?></title>
	<link rel="stylesheet" href="vendors/css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="resources/css/style.css">
	<link rel="stylesheet" href="resources/css/style2.css">
	<link rel="stylesheet" href="resources/css/queries.css">
    <link rel="stylesheet" href="vendors/css/ionicons.min.css">
     <link rel="stylesheet" href="vendors/css/grid.css">
     <link rel="stylesheet" href="vendors/css/flash.css">
	</head>
	<style type="text/css">
		.header_area {
			background-image: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)),url(admin/<?php echo $siteData['headerImage']; ?>);
		}
	</style>
	<body>
		
		<section class="header_area fix">
			<div class="header content fix">
				<div class="logo floatleft fix">
					<img src="admin/<?php echo $siteData['logo1']; ?>"/>
				</div>
				<div class="write fix">
					<h4 style="text-transform: uppercase; font-weight: 200; font-size: 24px; margin-bottom: 5px;"><?php echo $siteData['hallName']; ?></h4>
					<h5 style="text-transform: uppercase; font-weight: 200; font-size: 24px;">KHULNA UNIVERSITY</h5>
				</div>
            
			<!--	<div style="margin-top: -70px;" class="image floatright fix">
					<img style="height: 207px; width: 167px;" src="admin/<?php// echo $siteData['logo2']; ?>"/>
					
				</div>
			-->	
			</div>
		</section>

        <div class="menu_area fix">
            <div class="menu content fix">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="abouthall.php">About Hall</a></li>
                    <?php if(!session::checkSessionStudent()){ ?>
                    <li><a href="Registration.php">Registration</a></li>
                    <?php } ?>
                    <?php if(session::checkSessionStudent()){ ?>
                    <?php if(session::get("isResidential")==false){ ?>
                    <li><a href="applyForSeat.php">Apply for Seat</a></li>
                    <?php } ?>
                    <?php if(session::get("isResidential") && $st->checkFormer(session::get("studentId"))==false){ ?>
                    <li><a href="applyForSeatExchange.php">Apply for Seat Exchange</a></li>
                    <?php } ?>

                    <?php } ?>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <?php if(session::checkSessionStudent()){ ?>
                    
                    <li>
                        <div class="searchStudent">
                            <form action="searchResult.php" method="post"> 
                                <input type="text" class="search" name="search" id="searchid" placeholder="Search Here..." /><br /> 
                                <input type="submit" 
                           style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                           tabindex="-1" />
                            </form> 
                        </div>
                        </li>
                        <?php } ?>
                    
                </ul>
                <div class="searchbtn floatright fix">
                    <?php if(session::checkSessionStudent()){ 
                        $request = $st->getRequest(session::get("studentId"));
                        $accRequest = $st->getAccRequest(session::get("studentId"));
                        $approval = $st->getApprovalNotice(session::get("studentId"));
                        $seatApproval = $st->getSeatApprovalNotice(session::get("studentId"));
                        ?>
                    <ul class="logout">
                        <?php if($request || $accRequest || ($approval && $approval[0]['approval']=="1") || ($approval && $approval[0]['approval']=="0") || ($seatApproval && $seatApproval[0]['approval']=="1") || ($seatApproval && $seatApproval[0]['approval']=="0")){ ?>
                        <li><a style="padding: 4px; margin:0 5px;" class="flashingbutton" href="notifications.php">New Notification</a></li>
                        <?php } else{ ?>
                        <li><a style="padding: 4px; margin:0 5px;" href="#">No Notification</a></li>
                        <?php } ?>
                        <li><a style="margin:0 5px; padding: 4px; margin-right: 5px;" href="profile.php?studentId=<?php echo session::get("studentId"); ?>"><?php echo session::get('studentName'); ?></a></li>
                        <li><a style="padding: 4px; margin:0 5px;" href="?action=logout">Logout</a></li>
                    </ul>
                    <?php } ?>
                </div> 
            </div>

        </div>