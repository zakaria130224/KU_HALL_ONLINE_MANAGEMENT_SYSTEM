<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $adLink = new webOptions();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $check = $adLink->addScrollNotice($_POST);
    }
    $result = $adLink->getScrollNotice();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Scroll Notice</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">	
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Update Notice:</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result['scrollNotice']; ?>" name="notice" class="large" required=""/>
                    </td>
                </tr>		
	

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" onclick="return confirm('Are you sure to Update Notice!');" />
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


