<?php
    session_start();
	include ("class_DBConnector.php");
?>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
       Teilnehmerliste
    </title>
</head>
    <body>

<?php
	if (! isset ($_SESSION['user']))
		{
			exit("<p>Sie sind nicht eingeloggt!<br /><a href='login.php'>Zum Login</a></p>");
		}
	$db = new DBConnector();
	require_once("navBar.php");
	 try{
	  $res = $db->getVortragende();
	  if ($res !== NULL){
	   $num = $res->num_rows;
		echo "<table border = '1'>"; //Tabellenbeginn
		echo "<tr> <th>Vorname</th> <th>Nachname</th><th>E-Mail</th><th>Veranstaltung</th><th>Uhrzeit</th><th>Typ</th>"; //Überschrift
		 while ($dsatz = $res->fetch_object()){
		  echo "<tr>";
		  echo "<td>" . $dsatz->vt_vname . "</td>";
		  echo "<td>" . $dsatz->vt_nname . "</td>";
		  echo "<td>" . $dsatz->vt_email . "</td>";
		  echo "<td>" . $dsatz->titel . "</td>";
		  echo "<td>" . $dsatz->uhrzeit . "</td>";
		  echo "<td>" . $dsatz->typ . "</td>";
		  echo "</tr>";
		 }
		echo "</table>"; //Tabellenende 
	  }else echo "Keine Vortragenden!";
	 } catch (Exception $e){
	  echo $e->getMessage();
	 }

?>

</body>
</html>