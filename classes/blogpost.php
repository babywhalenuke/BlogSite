<?php
    
    Class BlogPost
    {
        private $_blogid;
        private $_blogtitle;
        private $_blogbody;
        private $_userid;
        private $_isactive;
        private $_createdate;
        
        
        function __construct($blogid,$blogtitle,$blogbody,$userid,$isactive,$createdate){
            $this->_blogid = $blogid;
            $this->_blogtitle = $blogtitle;
            $this->_blogbody = $blogbody;
            $this->_userid = $userid;
            $this->_isactive = $isactive;
            $this->_createDate = $createdate;
        }
        
        function setBlogID($blogid){
            $this->_blogid = $blogid;
        }
        
        function getBlogID(){
            
            return $this->_blogid;
        
        }
        
        function setBlogTitle($title){
            $this->_blogtitle = $title;
        }
        
        function getBlogTitle(){
            return $this->_blogtitle;
        }
        
        function setBlogBody($body){
            $this->_blogbody = $body;
        }
        
        function getBlogBody(){
            return $this->_blogbody;
        }
        
        function setUserID($userid){
            $this->_userid = $userid;
        }
        
        function getUserID(){
            return $this->_userid;
        }
        
        function setIsActive($isActive){
            $this->_isactive = $isActive;
        }
        
        function getIsActive(){
            return $this->_isactive;
        }
        
        function setCreateDate($createDate){
            $this->_createDate = $createDate;
        }
        
        function getCreateDate(){
            return $this->_createDate;
        }
        
    }