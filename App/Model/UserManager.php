<?php

namespace AntoninZ\Model;

class UserManager {
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
    
    public function createUser(User $user)
    {
        $passwordHash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        
        $req = $this->_db->prepare('INSERT INTO users (username, password, gender, role) VALUES (:username, :password, :gender, :role)');
        $req->bindValue(':username', $user->getUsername(), \PDO::PARAM_STR);
        $req->bindValue(':password', $passwordHash , \PDO::PARAM_STR);
        $req->bindValue(':gender', $user->getGender(), \PDO::PARAM_STR);
        $req->bindValue(':role', $user->getRole(), \PDO::PARAM_STR);
        $req->execute();
    }
    
    public function getUser(User $user)
    {
        $req = $this->_db->prepare('SELECT * FROM users WHERE idUser = :idUser OR username = :username');
        $req->bindValue(':idUser', $user->getIdUser(), \PDO::PARAM_INT);
        $req->bindValue(':username', $user->getUsername(), \PDO::PARAM_STR);
        $req->execute();
        
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        
        if(!empty($data))
        {
            return $a = new User($data);
        }
        else
        {
            return false;
        }
    }
    
    public function getAllUser()
    {
	$users = [];
	
        $req = $this->_db->query('SELECT * FROM users');
        while($data = $req->fetch(\PDO::FETCH_ASSOC))
	{
            $users[] = new User($data);
	}
        
        return $users;
    }
    
    public function getAllUserWherePsychologist()
    {
	$users = [];
	
	$req = $this->_db->query('SELECT idUser, username FROM users WHERE role="psychologist"');
	while($data = $req->fetch(\PDO::FETCH_ASSOC))
	{
	    $users[] = new User($data);
	}
	
	return $users;
    }
    
    public function updateUser(User $user)
    {
        $passwordHash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        
        $req = $this->_db->prepare('UPDATE users SET username = :username, password = :password, gender = :gender, role = :role WHERE idUser = :idUser');
        $req->bindValue(':username', $user->getUsername(), \PDO::PARAM_STR);
        $req->bindValue(':password', $passwordHash, \PDO::PARAM_STR);
        $req->bindValue(':gender', $user->getGender(), \PDO::PARAM_STR);
        $req->bindValue(':role', $user->getRole(), \PDO::PARAM_STR);
        $req->bindValue(':idUser', $user->getUser(), \PDO::PARAM_INT);
        $req->execute();        
    }
    
    public function deleteUser(User $user)
    {
        $req = $this->_db->prepare('DELETE * FROM users WHERE idUser = :idUser');
        $req->bindValue(':idUser', $user->getIdUser(), PDO::PARAM_INT);
        $req->execute();
    }
    
   
}
