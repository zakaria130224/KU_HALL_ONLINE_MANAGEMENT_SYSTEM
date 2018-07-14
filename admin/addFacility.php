<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../resources/classes/webOptions.php';?>
<?php
    $ad = new webOptions();
    if($_SERVER['REQUEST_METHOD']=='POST'){     
        $check = $ad->addNewFacility($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add authority</h2>
        <div class="block">               
         <form id="authority_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <table class="form">	
                <tr>
                    <td>
                        <label>Title:</label>
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Title..." class="medium" required />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Description</label>
                    </td>
                    <td>
                        <input type="text" name="details" placeholder="Enter Description..." class="medium" required />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                        <img id="uploadPreview" style="width: 380px; height: 200px;" />
                        <div class="imageborder fix">
                            <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" required><br/>
                        </div>
                    </td>
                </tr>
				
				<p class="msg">
                    <?php
                        if(isset($check)){
                            echo $check;
                        }
                    ?>
                </p>
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Add new Facility" onclick="return confirm('are you sure to add new Facility')" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>