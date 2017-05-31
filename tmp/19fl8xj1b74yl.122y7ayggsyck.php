<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="css/blogstyle.css" type="text/css">
    <title>Blog Home</title>
    </head>
    
    <body>
        <div class="container col-md-10">           
                <?php foreach (($users?:[]) as $user): ?>
                <div class="container col-md-4 text-center navbar-default ">
                    <img src="<?= $user['image'] ?>" class="center-block img-responsive">
                    <hr>
                    <p><?= $user['username'] ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                             <a href="viewuserblogs/<?= $user['userid'] ?>"><p>View Blogs</p></a>    
                        </div>
                         <div class="col-md-6">
                            <p>Total: <?= $user['numposts'] ?></p>    
                        </div>                   
                    </div>
                    <div class="row">
                        <p>Something from my latest blog: "<?= $user['blogsnip'] ?>"</p>
                    </div>
                    
                </div>
                <?php endforeach; ?>
            </div>
    </body>
</html>

    
    