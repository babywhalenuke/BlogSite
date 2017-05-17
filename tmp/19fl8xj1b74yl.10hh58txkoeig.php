<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="../css/blogstyle.css" type="text/css">
    <title>View My Blogs</title>
    </head>
    
    <body>
        <div class="container">
            <div class="container col-md-12">
                <div class="container navbar-default">
                    <div class="row text-center">
                        <h1><?= $user->getUsername() ?>'s Blogs!!</h1>
                    </div>
                </div>    
            <br>
            <div class="container col-md-9">            
                <?php foreach (($blogs?:[]) as $blog): ?><?php endforeach; ?>
                    <div class="container col-md-12 ">
                        <div class="row">
                            <h2>My Blogs:</h2>
                        </div>
                        <div class="row navbar-default">                     
                            <a href="../viewblogdtl/<?= $blog->getBlogID() ?>"><h3><?= $blog->getBlogTitle() ?></a> -
                            word count <?= str_word_count($blog->getBlogBody()) ?> - <?= date("m/d/Y", strtotime($blog->getCreateDate())) ?></h3>
                            <hr>
                        </div>
                    </div>              
            </div>
                    <div class="container col-md-3 text-center navbar-default">
                        
                        <img src="<?= $user->getPortraitLink() ?>" class="img-responsive">
                        <h3><?= $user->getUsername() ?></h3>
                        <hr>
                        <p>Bio: <?= $user->getBio() ?></p>
                    </div>
           
                
            </div>
        </div>
    </body>
</html>
