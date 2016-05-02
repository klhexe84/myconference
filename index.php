<?php
    session_start();
?>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
       Home
    </title>
</head>
    <body>

<?php
    require_once("navBar.php");
    /* Kontrolle, ob innerhalb der Session */
    if (!isset($_SESSION["user"]))
        exit("<p>Kein Zugang<br /><a href='login.php'>Zum Login</a></p>");   //rest wird nicht angezeigt
    echo "\n Willkommen ".$_SESSION["user"]."! Sie sind als ". $_SESSION["level"]." angemeldet.";
?>

<a href="teilnehmer.php">Teilnehmerliste ausgeben</a>
<a href="veranstaltungen.php">Veranstaltungsliste ausgeben</a>
<a href="vortragende.php">Liste der Vortragenden ausgeben</a>

</body>
</html>
