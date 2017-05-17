<?php

Class UserDB
{
    
    private $_pdo;
        
        function __construct()
        {
            //Require configuration file
            require('../../../config.php');
            
            try {
                
                ##DB configurations are located in public_html/config.php
                //Establish database connection
                $this->_pdo = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
                
                //Keep the connection open for reuse to improve performance
                $this->_pdo->setAttribute( PDO::ATTR_PERSISTENT, true);
                
                //Throw an exception whenever a database error occurs
                $this->_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch (PDOException $e) {
                die( "Error!: " . $e->getMessage());
            }
        }
        
        function addUser($username, $userpassword,$email,$userbio,$image){
             $insert = 'INSERT INTO user (username,userpassword,email,userbio,image)
                        VALUES (:username,:userpassword,:email,:userbio,:image)';
             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindParam(':username', $username, PDO::PARAM_STR); 
            $statement->bindParam(':userpassword', $userpassword, PDO::PARAM_STR); 
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':userbio', $userbio, PDO::PARAM_STR); 
            $statement->bindParam(':image', $image, PDO::PARAM_STR); 
            
            $statement->execute();
            
        }
        
         function getUser($userid){
             $select = 'SELECT username,userpassword,email,userbio,image FROM user where userid = :userid';
             
            $statement = $this->_pdo->prepare($select);
            $statement->bindParam(':userid', $userid, PDO::PARAM_STR);         
            $statement->execute();            
            $resultArray = $statement->fetchAll(PDO::FETCH_ASSOC);
           
            foreach($resultArray as $row){
            $user = new Blogger($row['username'],$row['password'],$row['email'],$row['userbio'],$row['image']);
            return $user;
            }
         
        }
        

        
        function getCredentials($username,$password)
        {
           $select = 'SELECT username, userpassword FROM user WHERE username = :username and userpassword = :password';
           $statement = $this->_pdo->prepare($select);
           $statement->bindParam(':username',$username,PDO::PARAM_STR);
           $statement->bindParam(':password',$password,PDO::PARAM_STR);
           $statement->execute();
           $result = $statement->fetchAll(PDO::FETCH_ASSOC);           
           return $result;
        }
        
        function getUserID($username,$password){
           $select = 'SELECT userid FROM user WHERE username = :username and userpassword = :password';
           $statement = $this->_pdo->prepare($select);
           $statement->bindParam(':username',$username,PDO::PARAM_STR);
           $statement->bindParam(':password',$password,PDO::PARAM_STR);
           $statement->execute();
           $result = $statement->fetchAll(PDO::FETCH_ASSOC);           
           return $result;
            
        }
        
        function getUsers()
        {
            
             $select = 'SELECT';
             
            $statement = $this->_pdo->prepare($select);
            
            $statement->execute();
            
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;            
            
        }
}
