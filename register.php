<?php

spl_autoload_register( function($class){
    include_once("classes/". $class . ".php");
});

$feedback = "";

try {
if (!empty($_POST)) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new User();
        $user->setFirstName($firstname);
        $user->setLastName($lastname);
        $user->setEmail($email);
        $user->setPassWord($password);
if ($user->EmailIsAvailable()) {
        $user->Save();
} else {
        $feedback = "Emailadres al in gebruik <br />";
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
    <h2>Register.</h2>
    <h3><?php echo $feedback; ?></h3>

    <div class="input-group">

        <form  id="register" action="" method="post">

        <input id="textvak" type="text" class="form-control" placeholder="First name" name="firstname" aria-describedby="basic-addon1">



        <input id="textvak" type="text" class="form-control" placeholder="Last name" name="lastname" aria-describedby="basic-addon1">



        <input id="textvak" type="text" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1">



        <input id="textvak" type="password" class="form-control" placeholder="Password" name="password" aria-describedby="basic-addon1">



        <button type="submit">Submit</button>

    </form>

    </div>


</body>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>