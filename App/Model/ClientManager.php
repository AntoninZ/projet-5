<?php

namespace AntoninZ\Model;

class ClientManager {
    private $_db;
    
    //SETTER
    public function setDb(PDO $db)
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
                (idCompany, firstname, lastname, gender, address, phoneNumber, cellphoneNumber)
                VALUES
                (:idCompany, :firstname, :lastname, :gender, :address, :phoneNumber, :cellphoneNumber)');
        $req->bindValue(':idCompany', $client->getIdCompany(), PDO::PARAM_INT);
        $req->bindValue(':firstname', $client->getFirstname(), PDO::PARAM_STR);
        $req->bindValue(':lastname', $client->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':gender', $client->getGender(), PDO::PARAM_STR);
        $req->bindValue(':address', $client->getAddress(), PDO::PARAM_STR);
        $req->bindValue(':phoneNumber', $client->getPhoneNumber(), PDO::PARAM_INT);
        $req->bindValue(':cellphoneNumber', $client->getCellphoneNumber(), PDO::PARAM_INT);
        $req->execute();
    }
    
    public function getClient(Client $client)
    {
        $req = $this->_db->prepare('SELECT * FROM clients WHERE idClient = :idClient OR lastname = :lastname');
        $req->bindValue(':idClient', $client->getIdClient(), PDO::PARAM_INT);
        $req->bindValue(':idCompany', $client->getIdCompany(), PDO::PARAM_INT);
        $req->execute();
        
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $a = new Client($data);
    }
    
    public function getAllClient()
    {
        $req = $this->_db->prepare('SELECT * FROM clients');
        $req->execute();
        
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $users[] = new Client($data);
        }
        
        return $users;
    }
    
    public function updateClient(Client $client)
    {
        $req = $this->_db->prepare('UPDATE clients SET
            idCompany = :idCompany,
            firstname = :firstname,
            lastname = :lastname,
            gender = :gender,
            address = :address,
            phoneNumber = :phoneNumber,
            cellphoneNumber = :cellphoneNumber
            WHERE idClient = :idClient');
        $req->bindValue(':idCompany', $client->getIdCompany(), PDO::PARAM_INT);
        $req->bindValue(':firstname', $client->getFirstname(), PDO::PARAM_STR);
        $req->bindValue(':lastname', $client->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':gender', $client->getGender(), PDO::PARAM_STR);
        $req->bindValue(':address', $client->getAddress(), PDO::PARAM_STR);
        $req->bindValue(':phoneNumber', $client->getPhoneNumber(), PDO::PARAM_INT);
        $req->bindValue(':cellphoneNumber', $client->getCellphoneNumber(), PDO::PARAM_INT);
        $req->bindValue(':idClient', $client->getIdClient(), PDO::PARAM_INT);
        $req->execute();
    }
    
    public function deleteClient(Client $client)
    {
        $req = $this->_db->prepare('DELETE * FROM clients WHERE idClient = :idClient');
        $req->bindValue(':idClient', $client->getIdClient(), PDO::PARAM_INT);
        $req->execute();
    }
}
