<?php
session_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Admin Home
    </title>
</head>
<body>

    <?php
    require_once("navBar.php");
    
      //rest wird nicht angezeigt
    if($_SESSION['level'] != 'admin'){
        exit("<p>Keine Adminrechte!<br /><a href='login.php'>Zum Login</a></p>");
    } else echo "\n Willkommen ".$_SESSION["user"]."!";
    ?>



</body>
</html>
