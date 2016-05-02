<?php

class DBConnector
{
    private $con = NULL;
    // create a database connection, using the constants from config/db.php (which we loaded in index.php)
    public $errors = array();  //collecting error messages

    function connect(){
        require_once("config.php");
        $this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    function close(){
        $this->con->close();
    }

    function getUserDetails($user)
	{
        $this->connect(); //verbinden
        if (!$this->con->connect_errno) { //db Verbindung funktioniert, wenn keine Fehler
		    if($user!=NULL) //Parameter nicht leer
		    {
                $userName = $this->con->real_escape_string($user); //SQL injection vermeiden
			    $sql = "SELECT * FROM t_benutzer WHERE login='".$userName."'";    
                $result = $this->con->query($sql);    //sql Query absetzen
                if ($result != NULL) {   //wir haben ein Ergebnis
                    $row = $result->fetch_object();   //erste Reihe auslesen
                    $this->close();
                    return ($row);
           } 
		}
        } else throw new Exception('Keine Datenbankverbindung');
        return NULL;
	}
	
	function getTeilnehmer()
	{
		$this->connect();
		if (!$this->con->connect_errno)
		{
			 $sql = "select * from t_teilnehmer";
			 $result = $this->con->query($sql);   
			 $this->close();
			 return ($result);
		}else throw new Exception('Keine Datenbankverbindung');
		return NULL;
	}
	
	function getVeranstaltungen()
	{
		$this->connect();
		if(!$this->con->connect_errno)
		{
			$sql = "SELECT idveranstaltungen, titel, uhrzeit, typ, pdf, vt_vname, vt_nname FROM t_veranstaltungen v, t_vortragender t WHERE v.t_vortragender_idvortragender = t.idvortragender";
			$result = $this->con->query($sql);
			$this->close();
			return ($result);
		}else throw new Exception('Keine Datenbankverbindung');
		return NULL;
	}
	
	function getVortragende()
	{
		$this->connect();
		if(!$this->con->connect_errno)
		{
			$sql = "SELECT idvortragender, vt_vname, vt_nname, vt_email, titel, uhrzeit, typ, t_vortragender_idvortragender FROM t_vortragender v, t_veranstaltungen t WHERE v.idvortragender = t.t_vortragender_idvortragender";
			$result = $this->con->query($sql);
			$this->close();
			return ($result);
		}else throw new Exception('Keine Datenbankverbindung');
		return NULL;
	}
	
	function getMeineVeranstaltung()
	{
		$this->connect();
		if(!$this->con->connect_errno)
		{
			$sql = "SELECT ";
			$result = $this->con->query($sql);
			$this->close();
			return ($result);
		}else throw new Exception('Keine Datenbankverbindung');
		return NULL;
	}

}
