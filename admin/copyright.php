<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $note = $fm->validation($_POST['note']);

                $note = mysqli_real_escape_string($db->link , $note);

                if($note == ""){
                    echo "<span class='error'>Field Must Not Be empty !!</span>";
                }else{
                    $query = "UPDATE tbl_footer
                        SET
                        note    = '$note'
                        WHERE id    = '1'
                    ";
                    $updated_row = $db->update($query);

                    if ($updated_row) {
                        echo "<span class='success'>data Updated Successfully.
                     </span>";
                    }else {
                        echo "<span class='error'>data Not Updated !</span>";
                    }
                }
            }
        ?>
        <?php
            $query = "SELECT * FROM tbl_footer WHERE id = '1'";
            $resultfooter = $db->select($query);
            if($resultfooter){
                while ($foresult = $resultfooter->fetch_assoc()) {
        ?>
        <div class="block copyblock"> 
         <form action="" method="POST">
            <table class="form">					
                <tr>
                    <td>
                        <input type="text" name="note" value="<?php echo $foresult['note'] ?>" class="large" />
                    </td>
                </tr>
				
				 <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    <?php } } ?>
    </div>
</div>
<?php include "inc/footer.php"; ?>
