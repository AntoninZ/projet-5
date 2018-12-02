<?php

namespace AntoninZ\Controller;

class ConnectionController {
    
    public function connect()
    {
	try
	{
	    $db = new \PDO('mysql:host=localhost;dbname=projet5', 'root', ''); 
	    $db->exec("SET CHARACTER SET utf8");
	    return $db;
	}
	catch (\PDOException $e)
	{
	    print '<section><article class="center"><h2>Erreur :</h2><p>' . $e->getMessage() . '</p></article></section>';
	    die();
	}
    }
}
