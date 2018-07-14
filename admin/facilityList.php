<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../resources/classes/webOptions.php';?>
<?php
    $f = new webOptions();
    $facilities = $f->getFacilities();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Facility List</h2>
        <div class="block">               
                <table class="form delete">   
            <?php if($facilities){foreach ($facilities as $data) { ?> 
                 <tr>
                    <td>
                        <label>Title:</label>
                        <p style="display: inline-block;"><?php echo $data['title']; ?></p>
                    </td>

                </tr>
                
                 <tr>
                    <td>
                        <label>Description:</label>
                        <p style="display: inline-block;"><?php echo $data['details']; ?></p>
                    </td>
                </tr>
                <tr>
                <td>
                
                <a href="deleteFacility.php?title=<?php echo $data['title']; ?>" onclick="return confirm('Are you sure to Delete');">Delete Facility</a>
                <hr style="margin-bottom: 60px;">
                    
                </td>
                </tr>
                <?php }} ?>
                <p class="msg">
                    <?php
                        if(isset($check)){
                            echo $check;
                        }
                    ?>
                </p>

            </table>
            
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>