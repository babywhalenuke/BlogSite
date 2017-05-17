<?php
    
    Class Blogger
    {
        
        private $_username;
        private $_email;
        private $_password;
        private $_portraitlink;
        private $_bio;
        
        function __construct($username,$password,$email,$bio,$portraitlink){
            $this->_username = $username;
            $this->_email = $email;
            $this->_password = $password;
            $this->_portraitlink = $portraitlink;
            $this->_bio = $bio;
        }
        
        function setUsername($username){
        
        }
        function getUsername(){
            return $this->_username;
        }
        
        function setEmail($email){
            $this->_email = $email;
        }
        function setPassword($password){
            $this->_password = $password;
        }
        function setPortraitLink($portraitlink){
             $this->_portraitlink = $portraitlink;
        }
        function setBio($bio){
            $this->_bio = $bio;
        }
        function getEmail(){
            return $this->_email;
        }
        function getPassword(){
            return $this->_password;
        }
        function getPortraitLink(){
            return $this->_portraitlink;
        }
        function getBio(){
            return $this->_bio;
        }
        
        
        
        
        
        
    }