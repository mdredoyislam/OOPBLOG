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
    if(!isset($_GET['delpostid']) || $_GET['delpostid'] == Null){
        //echo "<script>window.location='postlist.php'</script>"
        header("location: postlist.php");
    }else{
        $postid = $_GET['delpostid'];
        $query = "SELECT * FROM tbl_post WHERE id='$postid'";
        $getdata = $db->select($query);
        if($getdata){
        	while ($delimg = $getdata->fetch_assoc()) {
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery = "DELETE FROM tbl_post WHERE id='$postid'";
        $deldata = $db->delete($delquery);
        if ($deldata) {
            echo "<script>alert('DATA DELETED SUCCESSFULLI !!');</script>";
            header("location: postlist.php");
        }else {
            echo "<script>alert('DATA NOT DELETED !!');</script>";
            header("location: postlist.php");
        }
    }
?>