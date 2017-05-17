<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="css/blogstyle.css" type="text/css">
    <title>View My Blogs</title>
    </head>
    
    <body>
        <div class="container">

            <div class="container col-md-10">
                    <div class="container navbar-default">
                    <div class="row col-md-9">
                        <h1>Your blogs!</h1>
                    </div>
                     <div class="row col-md-3">
                       <img src="<?= $user->getPortraitLink() ?>" class="img-responsive img-rounded">                      
                     </div>   
                </div>
                    <div class="container col-md-9">
                             <table class="table">
                    <tr>
                        <td><strong>Blog</strong></td>
                        <td><strong>Update</strong></td>
                        <td><strong>Delete</strong></td>
                    </tr>
                    <?php foreach (($blogs?:[]) as $blog): ?>
                        <tr>
                            <td><?= $blog->getBlogTitle() ?></td>
                            <td><a href="updateblog/<?= $blog->getBlogID() ?>"><span class="glyphicon glyphicon-wrench"></span></a></td>
                            <td><a href="deleteblog/<?= $blog->getBlogID() ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                        <?php endforeach; ?>
                </table>    
                    </div>
                    <div class="container col-md-3 text-center">
                        <h3><?= $user->getUsername() ?></h3>
                        <hr>
                        <p>Bio: <?= $user->getBio() ?></p>
                    </div>
           
                
            </div>
        </div>
    </body>
</html>
