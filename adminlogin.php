<?php
   session_start();
?>

<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        Login 
    </title>
</head>
<body>
<?php
require_once("class_login.php"); // login Klasse laden

    if (isset($_POST["send"])){    

        $login = new login(); //login Objekt erzeugen
        $res = $login->doLogin('admin'); //Methode f�r login aufrufen

        if (!isset($_SESSION["user"])) {    //irgendwas ist schiefgelaufen   
            require_once("navBar.php"); //Navigation anzeigen (nicht vorher, weil sonst die Abfrage, ob User eingeloggt ist nicht stimmt
            echo "Fehler:";
                foreach ($res as $err) 
                    echo "<p> $err </p>";                       
        } else {
             //require_once("navBar.php"); //Navigation anzeigen (nicht vorher, weil sonst die Abfrage, ob User eingeloggt ist nicht stimmt
             echo "\n Willkommen ".$_SESSION["user"]."!"; //Benutzer begr��en
             header("Location: adminIndex.php");
        }
        
    }

?>
    <form name="user" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
    <p>
        <label>Username:</label>
        <input type="text" name="username" />
     </p>
     <p>
        <label>Passwort:</label>
        <input type="password" name="password" />
      </p>
      <p><input type = "submit" name = "send" value="Login" /></p>
	  <li><a href="login.php">Als User anmelden</a></li>
    </form>



</body>
</html>
