<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="../css/blogstyle.css" type="text/css">
    <title><?= $blog->getBlogTitle() ?></title>
    </head>
    
    <body>
        <div class="container">
            <div class="container col-md-9 navbar-default">
            <h1><?= $blog->getBlogTitle() ?></h1>
            <div class="container col-md-6">
            <p><?= $blog->getBlogBody() ?></p>
            </div>
        </div>
            <div class="container col-md-3">
                <img src="<?= $user->getPortraitLink() ?>" class="img-responsive img-rounded">
            </div>
        </div>
    </body>
</html>
