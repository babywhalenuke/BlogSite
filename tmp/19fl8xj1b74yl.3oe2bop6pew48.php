<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap-theme.css" type="text/css">
    <link rel="stylesheet" href="../css/blogstyle.css" type="text/css">
    <title>Update blog</title>
    </head>
    
    <body>
        <div class="container">
            <div class="container col-md-10">
                     <div class="container navbar-default">
                    <div class="row col-md-9">
                        <h1>Change your mind?</h1>
                    </div>
                     <div class="row col-md-3">
                         <img src="../images/notepad.png" class="img-responsive img-rounded">
                     </div>
                </div>
            <form action="submitupdateblog" method="post">
                <div class="form-group">
                    <label for="title">Update Title</label>
                    <input class="form-control" type="textbox" name="title" value="<?= $blog->getBlogTitle() ?>">
                </div>
                <div class="form-group">
                    <input type="textbox" name="blogid" value="<?= $blog->getBlogID() ?>" hidden>
                </div>
                   <div class="form-group">
                    <label for="entry">Update Entry</label>
                    <textarea class="form-control"  type="textarea" name="entry"><?= $blog->getBlogBody() ?></textarea>
                </div>
                <input type="submit" value="Save" class="btn-primary big-btn img-rounded col-md-offset-5">               
            </form>                
            </div>
        </div>     
    </body>
</html>
