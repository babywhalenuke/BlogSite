<?php
require_once('vendor/autoload.php');
##Session Variables: isAuthenticated, 
session_start();
//Create an instance of the Base class
$f3 = Base::instance();
//create db class for dating
$GLOBALS['userDB'] = new UserDB();
$GLOBALS['blogDB'] = new BlogDB();
//set debug level
$f3->set('DEBUG',3);
//define default route

$f3->route('GET /', function($f3) {
    $blogDB = $GLOBALS['blogDB'];
    $userDB = $GLOBALS['userDB'];
    
    $results = $blogDB->getHomePageInfo();
 
    
    echo var_dump($results);
    $f3->set('users',$results);

    
    echo Template::instance()->render('pages/menu.php');
    echo Template::instance()->render('pages/home.html');

});

$f3->route('GET /about', function() {
    $view = new View;
    echo $view->render('pages/menu.php');
    echo $view->render('pages/about.html');
});

$f3->route('GET /login', function() {
    $view = new View;
    echo $view->render('pages/login.html');
});

$f3->route('GET /signup', function() {
    $view = new View;
    echo $view->render('pages/signup.html');
});

$f3->route('GET /createblog', function() {    
    $view = new View;
    echo $view->render('pages/menu.php');
    echo $view->render('pages/create.html');
});

$f3->route('POST /submitblog', function($f3) {
    $blogDB = $GLOBALS['blogDB'];
    $title = $_POST['title'];
    $body = $_POST['entry'];
    $userid = $_SESSION['userid'];     
    $blogDB->addBlog($title,$body,$userid, 1);
    $f3->reroute('@seeblogs');

});

$f3->route('GET @seeblogs: /myblogs', function($f3) {
    $userid = $_SESSION['userid'];
    $blogDB = $GLOBALS['blogDB'];
    $userDB = $GLOBALS['userDB'];
    $blogs = $blogDB->getBlogsByUser($userid);
    $user = $userDB->getUser($userid);
    
    

    $f3->set('user',$user);
    $f3->set('blogs',$blogs);
    echo Template::instance()->render('pages/menu.php');
    echo Template::instance()->render('pages/viewblogs.html');
    
});

$f3->route('GET /updateblog/@blogid', function($f3,$params) {
    $blogDB = $GLOBALS['blogDB'];
    $title = $_POST['title'];
    $body = $_POST['entry'];
    $userid = $_SESSION['userid'];     
    $blog = $blogDB->getBlogByID($params['blogid']);
    $f3->set('blog',$blog);
    
    
    
   # $f3->set('user',$user);
  #  $f3->set('blogs',$blogs);
    echo Template::instance()->render('pages/menu.php');
    echo Template::instance()->render('pages/updateblog.html');

});

$f3->route('POST /updateblog/submitupdateblog', function($f3) {
    $blogDB = $GLOBALS['blogDB'];
    $blogID = $_POST['blogid'];
    $title = $_POST['title'];
    $body = $_POST['entry'];     
    $blog = $blogDB->updateBlog($blogID,$title,$body);
    $f3->reroute("@seeblogs");

});

$f3->route('GET /deleteblog/@blogid', function($f3,$params) {
    $blogDB = $GLOBALS['blogDB'];    
    $blogDB->removeBlog($params['blogid']);
    $f3->reroute("@seeblogs");
});


$f3->route('POST /loginWelcome', function() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $userDB = $GLOBALS['userDB'];
    $result = $userDB->getCredentials($username, $password);
    $user = $userDB->getUserID($username,$password);
    
    foreach($user as $row){
        $userID = $row['userid'];    
    }
    foreach($result as $row){
       $returnUN = $row['username'];
       $returnPW = $row['userpassword'];
    }
    

    if($returnPW == $password){
        $_SESSION['userid'] = $userID;
        $_SESSION['isAuthenticated'] = true;
        $_SESSION['username'] = $username;
        $view = new View;
 
        echo $view->render('pages/home.html');
        
           
        }
    
    else{
    echo 'Username and password are invalid';
    }
});

$f3->route('POST /welcome', function() {    
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify = $_POST['verify'];
    $portrait  = $_POST['portraiturl'];
    $bio = $_POST['bio'];

    $user = new Blogger($username,$password,$email,$bio,$portrait);
    $userDB = $GLOBALS['userDB'];
    $userDB->addUser($username,$password,$email,$bio,$portrait);
    
    $view = new View;
    echo $view->render('pages/viewblogs.html');
});

$f3->route('GET /logout', function() {
    $_SESSION['isAuthenticated'] = false;
    $view = new View;
    echo $view->render('pages/home.html');
});

//Run fat free
$f3->run();
?>