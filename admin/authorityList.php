<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../resources/classes/webOptions.php';?>
<?php
    $authority = new webOptions();
    $authority = $authority->getAllAuthority();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Authority List</h2>
        <div class="block">               
                <table class="form delete">   
            <?php if($authority){foreach ($authority as $data) { ?> 
                 <tr>
                    <td>
                        <label>Name:</label>
                        <p style="display: inline-block;"><?php echo $data['name']; ?></p>
                    </td>

                </tr>
                
                 <tr>
                    <td>
                        <label>Designation</label>
                        <p style="display: inline-block;"><?php echo $data['designation']; ?></p>
                    </td>
                </tr>
                <tr>
                <td>
                
                <a href="deleteAu.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure to Delete');">Delete Authority</a>
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