<?php

Class BlogDB
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
        
        function addBlog($blogtitle,$blogbody,$userid,$isactive){
             $insert = 'INSERT INTO blogdtl (blogtitle,blogbody,userid,isactive)
                        VALUES (:blogtitle,:blogbody,:userid,:isactive)';             
            $statement = $this->_pdo->prepare($insert);
            $statement->bindParam(':blogtitle', $blogtitle, PDO::PARAM_STR); 
            $statement->bindParam(':blogbody', $blogbody, PDO::PARAM_STR); 
            $statement->bindParam(':userid', $userid, PDO::PARAM_STR);
            $statement->bindParam(':isactive', $isactive, PDO::PARAM_STR);            
            $statement->execute();
            
        }

        
        function getBlogsByUser($userid)
        {
           $select = 'SELECT blogid,blogtitle, blogbody, userid,isactive FROM blogdtl WHERE userid = :userid and isactive = 1';
           $statement = $this->_pdo->prepare($select);
           $statement->bindParam(':userid',$userid,PDO::PARAM_STR);
           $statement->execute();
           $resultArray = $statement->fetchAll(PDO::FETCH_ASSOC);
           $result = array();           
           foreach($resultArray as $row){
            $blog = new BlogPost($row['blogid'],$row['blogtitle'],$row['blogbody'],$row['userid'],$row['isactive']);
            array_push($result,$blog);
           }
           
           return $result;
        }
          function getAllBlogs()
        {
           $select = 'SELECT blogid, blogtitle, blogbody, userid, isactive FROM blogdtl WHERE  isactive = 1';
           $statement = $this->_pdo->prepare($select);
           $statement->execute();
           $resultArray = $statement->fetchAll(PDO::FETCH_ASSOC);
           $result = array();
           foreach($resultArray as $row){
            $blog = new BlogPost($row['blogid'],$row['blogtitle'],$row['blogbody'],$row['userid'],$row['isactive']);
            array_push($result,$blog);        
           }
           return $result;
        }
        
        function getBlogByID($blogid)
        {
           $select = 'SELECT blogid,blogtitle, blogbody, userid,isactive FROM blogdtl WHERE blogid = :blogid';
           $statement = $this->_pdo->prepare($select);
           $statement->bindParam(':blogid',$blogid,PDO::PARAM_STR);
           $statement->execute();
           $resultArray = $statement->fetchAll(PDO::FETCH_ASSOC);
           $result = array();           
           foreach($resultArray as $row){
            $blog = new BlogPost($row['blogid'],$row['blogtitle'],$row['blogbody'],$row['userid'],$row['isactive']);
            array_push($result,$blog);
           }
           
           return $result;
        }
        
        
        
        
  
}
