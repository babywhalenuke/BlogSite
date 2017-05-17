<?php
if($_SESSION['isAuthenticated']){
 $username = $_SESSION['username'];
 $userID = $_SESSION['userid'];
 ECHO' <div class="container col-md-2">
            <img class="img-responsive" src="images/waterfall.jpg">
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
            <img class="img-responsive" src="images/waterfall.jpg">
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