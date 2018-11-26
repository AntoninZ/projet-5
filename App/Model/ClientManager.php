<?php

namespace AntoninZ\Model;

class ClientManager {
    private $_db;
    
    //SETTER
    public function setDb(\PDO $db)
    {
        $this->_db = $db;
    }
    
    public function __construct($db)
    {
        $this->setDb($db);
    }
    
    public function createClient(Client $client)
    {
        $req = $this->_db->prepare('INSERT INTO clients
                (idCompany, firstname, lastname, gender, address, zipCode, city, phoneNumber, cellphoneNumber, email)
                VALUES
                (:idCompany, :firstname, :lastname, :gender, :address, :zipCode, :city, :phoneNumber, :cellphoneNumber, :email)');
        $req->bindValue(':idCompany', $client->getIdCompany(), \PDO::PARAM_INT);
        $req->bindValue(':firstname', $client->getFirstname(), \PDO::PARAM_STR);
        $req->bindValue(':lastname', $client->getLastname(), \PDO::PARAM_STR);
        $req->bindValue(':gender', $client->getGender(), \PDO::PARAM_STR);
        $req->bindValue(':address', $client->getAddress(), \PDO::PARAM_STR);
	$req->bindValue(':zipCode', $client->getZipCode(), \PDO::PARAM_STR);
	$req->bindValue(':city', $client->getCity(), \PDO::PARAM_STR);
        $req->bindValue(':phoneNumber', $client->getPhoneNumber(), \PDO::PARAM_INT);
        $req->bindValue(':cellphoneNumber', $client->getCellphoneNumber(), \PDO::PARAM_INT);
	$req->bindValue(':email', $client->getEmail(), \PDO::PARAM_STR);
        $req->execute();
	
	$req = $this->_db->query('SELECT MAX(idClient) FROM clients');
	$idClient = $req->fetch(\PDO::FETCH_ASSOC);
        
        return $idClient['MAX(idClient)'];
    }
    
    public function getClient(Client $client)
    {
        $req = $this->_db->prepare('SELECT * FROM clients WHERE idClient = :idClient');
        $req->bindValue(':idClient', $client->getIdClient(), \PDO::PARAM_INT);
        $req->execute();
        
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        return $client = new Client($data);
    }
    
    public function getAllClient(Client $client)
    {
	$clients = [];
	
        $req = $this->_db->prepare('SELECT * FROM clients WHERE idCompany = :idCompany');
	$req->bindValue(':idCompany', $client->getIdCompany(), \PDO::PARAM_INT);
        $req->execute();
        
        while($data = $req->fetch(\PDO::FETCH_ASSOC))
        {
            $clients[] = new Client($data);
        }
        
        return $clients;
    }
    
    public function updateClient(Client $client)
    {
        $req = $this->_db->prepare('UPDATE clients SET
            idCompany = :idCompany,
            firstname = :firstname,
            lastname = :lastname,
            gender = :gender,
            address = :address,
	    zipCode = :zipCode,
	    city = :city,
            phoneNumber = :phoneNumber,
            cellphoneNumber = :cellphoneNumber,
	    email = :email
            WHERE idClient = :idClient');
        $req->bindValue(':idCompany', $client->getIdCompany(), \PDO::PARAM_INT);
        $req->bindValue(':firstname', $client->getFirstname(), \PDO::PARAM_STR);
        $req->bindValue(':lastname', $client->getLastname(), \PDO::PARAM_STR);
        $req->bindValue(':gender', $client->getGender(), \PDO::PARAM_STR);
        $req->bindValue(':address', $client->getAddress(), \PDO::PARAM_STR);
	$req->bindValue(':zipCode', $client->getZipCode(), \PDO::PARAM_STR);
	$req->bindValue(':city', $client->getCity(), \PDO::PARAM_STR);
        $req->bindValue(':phoneNumber', $client->getPhoneNumber(), \PDO::PARAM_STR);
        $req->bindValue(':cellphoneNumber', $client->getCellphoneNumber(), \PDO::PARAM_STR);
	$req->bindValue(':email', $client->getEmail(), \PDO::PARAM_STR);
        $req->bindValue(':idClient', $client->getIdClient(), \PDO::PARAM_INT);
        $req->execute();
    }
    
    public function deleteClient(Client $client)
    {
        $req = $this->_db->prepare('DELETE FROM clients WHERE idClient = :idClient');
        $req->bindValue(':idClient', $client->getIdClient(), \PDO::PARAM_INT);
        $req->execute();
    }
}
