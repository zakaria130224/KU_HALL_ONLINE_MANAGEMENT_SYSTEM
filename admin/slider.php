<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $access = new webOptions();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $access->addSlider($_FILES,$_POST['slide-number']);
    }
    
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Sliders</h2>
        <div class="block">               
         <section class="col span-3-of-5 content-body">
         <?php
            $slider = $access->getAllSliders();
          ?>
                <?php $flag=0; foreach ($slider as $sl) {
                    if($sl['image']){
                     ?>
                <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label><?php echo "&nbsp;Slot ".$sl['id'].":"; ?></label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl['image']; ?>" height="120px" width="230px">
                            <a href="deleteSlider.php?id=<?php echo $sl['id']; ?>" onclick="return confirm('Are you sure to delete!');">Delete</a>
                        </div>
                    </div>
                    <?php $flag++; }} ?>
                    <?php if($flag==0){ ?>
                    <p class="error">Currently there are no silder images.</p>
                    <?php } ?>
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form" enctype="multipart/form-data">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="slide-number">Choose Slide Number:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="slide-number" id="slide-number">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>Upload Image:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="file" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input style="padding: 8px 20px;" type="submit" name="submit" value="Save">
                        </div>
                    </div>
                </form>
                 <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>   
            </div>
       </section>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>