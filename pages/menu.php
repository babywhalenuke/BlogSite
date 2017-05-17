<?php
if($_SESSION['isAuthenticated']){
 $username = $_SESSION['username'];
 $userID = $_SESSION['userid'];
 ECHO'
 
     <head>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="../css/blogstyle.css" type="text/css">
    <title>Create a blog</title>
    </head>
 
 
 
 
           <div class="container col-md-2">
            <img class="img-responsive" src="http://images.fineartamerica.com/images-medium-large-5/iceland-black-and-white-skogafoss-waterfall-matthias-hauser.jpg">
            <nav class="navbar navbar-default">
            <ul>
                <p>Hello, '.$username.' </p>
                <li><a href="/328/blog">Home</li></a>
                <li><a href="/328/blog/myblogs">My Blogs</li></a>
                <li><a href="/328/blog/createblog">Create Blog</li></a>
                <li><a href="/328/blog/about">About Us</li></a>
                <li><a href="/328/blog/logout">Log Out</li></a>
            </ul>
            </nav>
   </div>';

}
else{
    
 ECHO' <div class="container col-md-2">
            <img class="img-responsive" src="http://images.fineartamerica.com/images-medium-large-5/iceland-black-and-white-skogafoss-waterfall-matthias-hauser.jpg">
            <nav class="navbar navbar-default">
            <ul>
                <li><a href="/328/blog">Home</li></a>
                <li><a href="/328/blog/about">About Us</li></a>
                <li><a href="/328/blog/signup">Sign Up!</li></a>
                <li><a href="/328/blog/login">Log In</li></a>
            </ul>
            </nav>
   </div>';
}