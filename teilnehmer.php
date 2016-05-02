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
	  $res = $db->getTeilnehmer();
	  if ($res !== NULL){
	   $num = $res->num_rows;
		echo "<table border = '1'>"; //Tabellenbeginn
		echo "<tr> <th>Nachname</th> <th>Vorname</th>"; //Überschrift
		 while ($dsatz = $res->fetch_object()){
		  echo "<tr>";
		  echo "<td>" . $dsatz->tn_nname . "</td>";
		  echo "<td>" . $dsatz->tn_vname . "</td>";
		  echo "</tr>";
		 }
		echo "</table>"; //Tabellenende 
	  }else echo "Keine Teilnehmer!";
	 } catch (Exception $e){
	  echo $e->getMessage();
	 }

?>

</body>
</html>