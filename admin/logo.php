<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $access = new webOptions();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $access->addLogo($_FILES,$_POST['slide-number']);
    }
    $sl = $access->getAllLogo();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Logo</h2>
        <div class="block">               
         <section class="col span-3-of-5 content-body">
                <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label>Header Image:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl['headerImage']; ?>" height="120px" width="230px">
                        </div>
                    </div>
                <div class="row">
                <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label>Top-Left Logo:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl['logo1']; ?>" height="120px" width="230px">
                        </div>
                    </div>
                <div class="row">
                <!--<div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label>Top-Right Logo:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php //echo $sl['logo2']; ?>" height="120px" width="230px">
                        </div>
                    </div> -->
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form" enctype="multipart/form-data">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="slide-number">Choose Logo type:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="slide-number" id="slide-number">
                                <option value="1">Header image</option>
                                <option value="2">Top-Left Logo</option>
                               <!-- <option value="3">Top-Right Logo</option> -->
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
                            <input type="submit" name="submit" value="Save">
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