<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style.css">
    <title>FORM VIDEO</title>

    <?php
    include_once('index.php');
    ?>


</head>
<body>
    <div class="container-fluid" id="bg">
        <div class="content">
        <div class="row">
            <div >
            <h2 style="margin-left: 30px;margin-top: 50px"> <strong>UPLOAD EXCEL TV ADEX</strong></h2>
            </div>
        </div>
        <div class="" >
            <form style="margin-top: 30px; margin-left: 30px" action="inputdb.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label  for="name"><strong>UPLOAD EXCEL</strong></label>
                    <input name="db" style="margin-left: 30px" type="file" class="" id="name" require>
                </div>
                <input style="margin-top: 30px" name="submit" type="submit" class="btn btn-primary" value="SUBMIT">
            </form>
        </div>
        </div>
    </div>
</body>
</html>