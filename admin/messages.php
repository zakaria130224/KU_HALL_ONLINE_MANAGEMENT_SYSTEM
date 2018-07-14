<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $adLink = new webOptions();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $check = $adLink->addMsg($_POST);
    }
    $result = $adLink->getMsg();
    $result = mysqli_fetch_assoc($result);
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Messages</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">			
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Provost Message:</label>
                    </td>
                    <td>
                        <textarea rows="10" cols="100" class="textBox" name="provostMsg"><?php echo $result['provostMsg']; ?></textarea>
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Welcome:</label>
                    </td>
                    <td>
                        <textarea rows="10" cols="100" class="textBox" name="welcomeMsg"><?php echo $result['welcomeMsg']; ?></textarea>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
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


<!-- style="border: 2px solid #837171;" rows="10" cols="100" -->