<?php
    include "../lib/Session.php";
    Session::checkSession(); 
?>
<?php include "../config/config.php" ?>
<?php include "../lib/Database.php" ?>
<?php include "../helpers/Format.php" ?>
<?php
    $db = new  Database();
?>
<?php
    if(!isset($_GET['delpage']) || $_GET['delpage'] == Null){
        //echo "<script>window.location='postlist.php'</script>"
        header("location: index.php");
    }else{
        $pageid = $_GET['delpage'];

        $pagequery = "DELETE FROM tbl_page WHERE id='$pageid'";
        $delpage = $db->delete($pagequery);
        if ($delpage) {
            echo "<script>alert('PAGE DELETED SUCCESSFULLI !!');</script>";
            header("location: index.php");
        }else {
            echo "<script>alert('PAGE NOT DELETED !!');</script>";
            header("location: index.php");
        }
    }
?>