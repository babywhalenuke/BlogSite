<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
    <title>Blog Home</title>
    </head>
    
    <body>
        <div class="container">
            <div class="container col-md-10">
                <?php foreach (($users?:[]) as $user): ?>
                <div class="container col-md-4">
                    <img src="<?= $image ?>" class="img-responsive">
                    <p><?= $username ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
     
    </body>
</html>

    
    