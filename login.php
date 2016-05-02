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
			$res = $login->doLogin('user'); //Methode f�r login aufrufen
			echo $_SESSION["user"];
			if (!isset($_SESSION["user"])) {    //irgendwas ist schiefgelaufen   
				require_once("navBar.php"); //Navigation anzeigen (nicht vorher, weil sonst die Abfrage, ob User eingeloggt ist nicht stimmt
				echo "Fehler:";
					foreach ($res as $err) 
						echo "<p> $err </p>";                       
			} else {
				 echo "\n Willkommen ".$_SESSION["name"]."!"; //Benutzer begrüßen
				 header("Location: index.php");
			}
			
		}


?>
    <form name="user" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> <!-- Affenformular -->
    <p>
        <label>Username:</label>
        <input type="text" name="username" />
     </p>
     <p>
        <label>Passwort:</label>
        <input type="password" name="password" />
      </p>
      <p><input type = "submit" name = "send" value="Login" /></p>
	  <li><a href="adminlogin.php">Als Administrator anmelden</a></li>
    </form>



</body>
</html>
