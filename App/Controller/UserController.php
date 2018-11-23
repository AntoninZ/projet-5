<?php

namespace AntoninZ\Controller;

use AntoninZ\Model\UserManager;
use AntoninZ\Model\User;
use AntoninZ\Controller\ConnectionController;

class UserController {
    public function createUser()
    {
        $user = new User([
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'gender' => $_POST['gender'],
            'role' => $_POST['role']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new UserManager($db);
        $manager->createUser($user);
    }
    
    public function getUser()
    {
        $user = new User([
            'idUser' => $_GET['idUser'],
            'username' => $_POST['username']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new UserManager($db);
        $data = $manager->getUser($user);
        
        return $a = new User($data);
    }
    
    public function getAllUser()
    {
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new UserManager($db);
        $users = $manager->getAllUser();
        
        return $users;
    }
    
    public function getAllUserWherePsychologist()
    {
	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new UserManager($db);
	$users = $manager->getAllUserWherePsychologist();
	
	return $users;
    }
    
    public function updateUser()
    {
        $user = new User([
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'gender' => $_POST['gender'],
            'role' => $_POST['role'],
            'idUser' => $_GET['idUser']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new UserManager($db);
        $manager->updateUser($user);
    }
    
    public function deleteUser()
    {
        $user = new User([
            'idUser' => $_GET['idUser']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new UserManager($db);
        $manager->deleteUser($user);
    }
    
    public function passwordVerify()
    {
        $userVerify = new User([
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        
        $manager = new UserManager($db);
        $user = $manager->getUser($userVerify);
        
        
        if($user)
        {
            if(password_verify($userVerify->getPassword(), $user->getPassword()))
            {
                return $user;
            }
            else
            {
                return $a = false;
            }
        }
        else
        {
            return $a = false;
        }  
    }
    
}
