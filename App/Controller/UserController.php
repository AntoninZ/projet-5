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
            'role' => $_POST['role'],
	    'adeliNumber' => $_POST['adeliNumber']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new UserManager($db);
        $manager->createUser($user);
    }
    
    public function getUser()
    {
	if(isset ($_SESSION['username']))
	{
	    $username = $_SESSION['username'];
	}
	else
	{
	    $username = $_POST['username'];
	}
	
        $user = new User([
            'username' => $username
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new UserManager($db);
        $data = $manager->getUser($user);
        
        return $data;
    }
    
    public function getUserById($idUser)
    {
	$user = new User([
	    'idUser' => $idUser
	]);
	
	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new UserManager($db);
	$user = $manager->getUser($user);
	
	return $user;
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
    
    public function updateUserAccount()
    {
        $user = new User([
            'username' => $_POST['username'],
            'gender' => $_POST['gender'],
            'role' => $_POST['role'],
	    'adeliNumber' => $_POST['adeliNumber'],
            'idUser' => $_POST['idUser']
        ]);
        
        $connection = new ConnectionController();
        $db = $connection->connect();
        $manager = new UserManager($db);
	$manager->updateUserAccount($user);
    }
    
    public function updateUserPassword()
    {
	$user = new User([
	    'password' => $_POST['password'],
	    'idUser' => $_POST['idUser']
	]);
	
	$connection = new ConnectionController();
	$db = $connection->connect();
	$manager = new UserManager($db);
	$manager->updateUserPassword($user);
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
