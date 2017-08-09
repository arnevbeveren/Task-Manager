<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/register.css">
<meta charset="UTF-8">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
</head>
<body>
<?php include_once('includes/include.nav1.php'); ?>

<div class="col-md-4 col-md-offset-4">
    <h2>Login.</h2>
    <div class="input-group">


        <input id="textvak" type="text" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1">



        <input id="textvak" type="text" class="form-control" placeholder="Password" name="password" aria-describedby="basic-addon1">



        <input class="btn btn-default" type="submit" value="Login">

        </br>

        <a href="register.php">Don't have an account yet?</a>

</div>

</body>
</html>