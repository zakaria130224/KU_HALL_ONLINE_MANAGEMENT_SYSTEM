<?php include 'include/header.php'; ?>
<?php
    $st = new student();
    $adLink = new webOptions();
    $slider = $adLink->getAllSliders();
    $notices = $adLink->get4Notice();
    $msg = $adLink->getMsg();
    $msg = mysqli_fetch_assoc($msg);
    $count = $adLink->countNews();
    $news = $adLink->get4News();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $st->studentLogin($_POST);
    }
    $scroll = $adLink->getScrollNotice();
    //$request = $st->getRequest(session::get("studentId"));
    //$accRequest = $st->getAccRequest(session::get("studentId"));
    //$approval = $st->getApprovalNotice(session::get("studentId"));
    //$seatApproval = $st->getSeatApprovalNotice(session::get("studentId"));
    //session::set("approval","2");
?>
<nav>
		<div class="maincontent1_area fix">
		
		   <div class="sliding content fix">
			   <marquee style="color: #2A88AD; padding: 7px; font-size: 14px;" behavior="scroll" direction="left" scrollamount = "6"><?php if($scroll){echo $scroll['scrollNotice'];} ?> 
					     	</marquee>
		   </div>
		</div>
    </nav>
	    <div class="maincontent_area fix js--sticky--start">
		   <div class="maincontent content fix">
		     <div class="firstcontent fix">
		        <div class="slid fix">
			       <div id="slider" class="sli fix">
			           <?php if($slider){ while($sl = mysqli_fetch_assoc($slider)) { ?>
				       <img src="admin/<?php echo $sl['image']; ?>"/>
				       <?php }} ?>
			       </div>
			    </div>
                <div class="noticeandlink fix">
			        <div class="link fix">
		   		        <h4 style="color: #104B55;">Quick Links</h4>
		   		        <div class="linkmenu fix">
		   			       <ul>
		   				      <li><a href="authority.php">Authority</a></li>
		   				      <li><a href="facilities.php">Facilities</a></li>
		   				      <li><a href="emergencynumber.php">Emergency Number</a></li>
		   			       </ul>
		   		        </div>
		        	</div>
		        	<div class="noticeboard fix">
		   		       <h4 style="color: #104B55;">Notice board</h4>
		   		       <div class="noticemenu fix">
		   			       <ul>
		   			           <?php foreach($notices as $nt){ ?>
		   				       <li><a href="detailNotice.php?id=<?php echo $nt['id']; ?>"><?php echo $nt['title']; ?></a></li>
		   				       	<?php } ?>
		   				       	<li><a style="border: none;" href="allNotices.php"><b>See more.......</b></a></li>
		   			       </ul>
		   		       </div>
			        </div>
                 </div>
			  </div>
		     <div class="last fix"> 
		   	    <div class="provost floatleft fix">
			   	    <div class="messageheding fix">
			   	     	<h4 style="color: #104B55;">Message From Provost</h4>
			   	     </div>
			   	     <div class="prome fix">
			   	  	    <div class="message floatright fix">
			   	  		   <?php echo $msg['provostMsg']; ?>
			   	  	    </div>
			   	  	</div>
			   	</div>


			   	<div class="right-sidebar fix">
			   	   <div class="first-part fix">
			   	  	 <h4 style="color: #104B55;">Welcome...</h4>
			   	  	 <div>
			   	  	  <?php echo $msg['welcomeMsg']; ?>
			   	  	  </div>
			   	   </div>
		   	    </div>
		   	  </div>
              
		   	  <div class="clearfix"></div>

		   	  <div class="showing_pic content fix">
		   	    <div class="pic_heading fix">
		   	    	<h2 style="font-weight: 200; font-size: 25px;">News & Events</h2>
		   	    </div>
			   	    <?php if($news){ foreach ($news as $value) {
			   	     ?>
			   	    <div class="textimage floatleft fix">
			   	    	<a href="detailNews.php?id=<?php echo $value['id']; ?>"><img style="height: 158px; width: 250px;" src="admin/<?php echo $value['image']; ?>"/></a>
			   	    	<div class="text fix">
			   	    		<a href="detailNews.php?id=<?php echo $value['id']; ?>"><p><?php echo $value['title']; ?></p></a>
			   	    	</div>
			   	    </div>
			   	    <?php }} ?>
				   		
		       </div>
		        <div class="clearfix"></div> 
		       <div class="seeMore">
		       	<a href="allNews.php">See more......</a>
		       </div>
		        <div class="clearfix"></div> 
			<?php if(!session::checkSessionStudent()){ ?>
		   	  <div class="login floatright fix">
	              <h3 style="margin-left: 100px; color: black;">Student Login</h3>
				  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					 <span>Username:</span> <input type="text" name="username" value=""/><br>
				    <span style="margin-right: 16px;">Password:</span> <input type="password" name="password" value=""/><br>
					 <input type="submit" value="Login"/>
				  </form>
				  <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>
				</div>
				 <div class="clearfix"></div> 
				 <?php } ?>
		   	  
            	

		    </div>
		</div>
<?php include 'include/footer.php'; ?>