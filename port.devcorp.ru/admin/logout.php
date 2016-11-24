<?php
ob_start();
?>
<?php include("include/connection.php");

?>
<?php
 session_destroy();
 header("location: index.php");
?>

<?php
ob_flush();
?>