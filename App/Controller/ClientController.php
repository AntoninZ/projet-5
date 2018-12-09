<?php

namespace AntoninZ\Controller;

use AntoninZ\Model\ClientManager;
use AntoninZ\Model\Client;

class ClientController
{
    public function createClient()
    {
	try {
	    $client = new Client([
		'idCompany' => $_POST['idCompany'],
		'firstname' => $_POST['firstname'],
		'lastname' => $_POST['lastname'],
		'gender' => $_POST['gender'],
		'address' => $_POST['address'],
		'zipCode' => $_POST['zipCode'],
		'city' => $_POST['city'],
		'phoneNumber' => $_POST['phoneNumber'],
		'cellphoneNumber' => $_POST['cellphoneNumber'],
		'email' => $_POST['email']
	    ]);

	    $connection = new ConnectionController();
	    $db = $connection->connect();
	    $manager = new ClientManager($db);
	    $lastId = $manager->createClient($client);

	    return $lastId;
	}
	catch(Exception $e)
	{
	    $e->getMessage();
	}
    }

    public function getClient()
    {
	try{
	    $client = new Client([
		'idClient' => $_GET['idClient'],
	    ]);

	    $connection = new ConnectionController();
	    $db = $connection->connect();
	    $manager = new ClientManager($db);
	    $client = $manager->getClient($client);

	    return $client;
	}
	catch(Exception $e)
	{
	    $e->getMessage();
	}
    }

    public function getAllClient()
    {
	try{
	    $client = new Client(['idCompany' => $_GET['idCompany']]);

	    $connection = new ConnectionController();
	    $db = $connection->connect();
	    $manager = new ClientManager($db);
	    $clients = $manager->getAllClient($client);

	    return $clients;
	}
	catch(Exception $e)
	{
	    $e->getMessage();
	}
    }

    public function updateClient()
    {
        $client = new Client([
            'idClient' => $_POST['idClient'],
            'idCompany' => $_POST['idCompany'],
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address'],
	    'zipCode' => $_POST['zipCode'],
	    'city' => $_POST['city'],
            'phoneNumber' => $_POST['phoneNumber'],
            'cellphoneNumber' => $_POST['cellphoneNumber'],
	    'email' => $_POST['email']
        ]);

        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new ClientManager($db);
        $manager->updateClient($client);
    }

    public function deleteClient()
    {
        $client = new Client([
            'idClient' => $_POST['idClient']
        ]);

        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager= new ClientManager($db);
        $manager->deleteClient($client);
	
	return $client;
    }
}