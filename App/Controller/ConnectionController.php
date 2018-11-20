<?php

namespace AntoninZ\Controller;

class ConnectionController {
    
    public function connect()
    {
 
	$db = new \PDO('mysql:host=localhost;dbname=projet5', 'root', ''); 
        $db->exec("SET CHARACTER SET utf8");
	return $db;
    }
}
