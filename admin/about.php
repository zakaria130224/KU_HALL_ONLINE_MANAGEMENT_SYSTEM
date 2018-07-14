<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $adLink = new webOptions();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $check = $adLink->addAboutContact($_POST);
    }
    $result = $adLink->getAboutContact();
    $result = mysqli_fetch_assoc($result);
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Information</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">			
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>About Us:</label>
                    </td>
                    <td>
                    <!--rows="10" cols="100" class="textBox" -->
                        <textarea class="tinymce" name="aboutUs"><?php echo $result['aboutUs']; ?></textarea>
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Contact Information:</label>
                    </td>
                    <td>
                        <textarea rows="10" cols="100" class="textBox" name="contact"><?php echo $result['contact']; ?></textarea>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" onclick="return confirm('Are you sure to update')" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
                    if(isset($check)){
                        echo $check;
                    }
            ?>
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


