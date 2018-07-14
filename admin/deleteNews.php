<?php require '../resources/classes/webOptions.php'; ?>  
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $wbo = new webOptions();
    if(isset($_POST['delete'])){
        $check = $wbo->deleteNews($_POST);
    }
    $title = $wbo->getAllTitle();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Delete News</h2>
        <div class="block copyblock"> 
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <table class="form">					
                <tr>
                    <td>
                        <select id="select" name="select">
                            <option value="0">Select Title-latest first</option>
                             <?php if($title){ while($row = $title->fetch_assoc()){ ?>
                            <option><?php echo $row['title']; ?></option>
                            <?php }} ?>
                        </select>
                    </td>
                </tr>
				 <tr> 
                    <td>
                        <input type="submit" name="seeDetail" Value="See Detail"/>
                    </td>
                </tr>
                <?php
                    if (isset($_POST['seeDetail'])) {
                       $detail = $wbo->getDetailByTitle($_POST['select']);
                       if($detail){
                        $detail = $detail->fetch_assoc();
                ?>
                <tr>
                    <td>
                    <input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
                        <textarea rows="10" cols="100" class="textBox" name="detail"><?php echo $detail['detail']; ?></textarea>
                    </td>
                </tr>
                <tr> 
                    <td>
                        <input type="submit" name="delete" Value="Delete News" onclick="return confirm('Are you sure to Delete!');" />
                    </td>
                </tr>
                <?php }} ?>
            </table>
            <?php
                    if(isset($check)){
                        echo $check;
                    }
                ?>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>