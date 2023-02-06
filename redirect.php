<?php 
    if(isset($_GET["redirect_url"])) {
        $redirect_url = $_GET["redirect_url"];
        header("Location: $redirect_url");
    } else {
        header("Location: index.php");
    }

?>
