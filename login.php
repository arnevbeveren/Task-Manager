<?php

spl_autoload_register( function($class){
    include_once("classes/". $class . ".php");
});

$feedback = "";

try {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User();
        $user->setEmail($email);
        $user->setPassWord($password);

        if ($user->canLogin()) {
            header('Location: index.php');
        } else {
            $feedback = "Sorry, we couldn't log you in";
        }
    }
} catch (Exception $e) {
    $feedback = "Er is iets mis gegaan: <br/>";
    $feedback .=  $e->getMessage();
}



?><!doctype html>
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
    <h3><?php echo $feedback; ?></h3>
    <div class="input-group">

        <form  id="login" action="" method="post">


        <input id="textvak" type="text" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1">



        <input id="textvak" type="password" class="form-control" placeholder="Password" name="password" aria-describedby="basic-addon1">



        <button type="submit">Login</button>

        </br>

        <a href="register.php">Don't have an account yet?</a>

        </form>

</div>

</body>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>