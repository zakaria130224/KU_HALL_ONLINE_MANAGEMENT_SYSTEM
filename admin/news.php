<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $adLink = new webOptions();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $check = $adLink->addNews($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add News</h2>
        <div class="block"> 
        <?php
                    if(isset($check)){
                        echo $check;
                    }
            ?>              
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <table class="form">    
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Title:</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Title..." name="title" class="large" required="" />
                    </td>
                </tr>       
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Detail:</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="detail"></textarea>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Image:</label>
                    </td>
                    <td>
                         <img id="uploadPreview" style="width: 380px; height: 200px;" />
                        <div class="imageborder fix">
                            <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" required><br/>
                        </div>
                    </td>
                </tr>  
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" onclick="return confirm('Are you sure to Save News!');" />
                    </td>
                </tr>
            </table>
            </form>
            
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


