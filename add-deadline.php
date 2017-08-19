<?php

spl_autoload_register( function($class){
    include_once("classes/". $class . ".php");
});

    session_start();

    $user = new User();
    $currentProfile = $user->getUser();

    $deadline = new Deadlines();


if (!empty($_POST)) {
    $deadline->setDeadline($_POST['deadline']);
    $deadline->setList($_POST['list']);
    $deadline->setDuration($_POST['duration']);
    $deadline->setExpiredate($_POST['expiredate']);
    $deadline->setUserId($_SESSION['user_id']);
    $deadline->AddDeadline();
}

?><!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.2.1.min.js"></script>
<meta charset="UTF-8">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
</head>
<body>
<?php include_once('includes/include.nav2.php'); ?>

<div class="col-md-4 col-md-offset-4">
    <h2>Add deadline.</h2>
    <div class="input-group">

        <form  id="addd" action="" method="post">


            <input id="textvak" type="text" class="form-control" placeholder="Deadline" name="deadline" aria-describedby="basic-addon1">

            <input id="textvak" type="text" class="form-control" placeholder="List" name="list" aria-describedby="basic-addon1">

            <input id="textvak" type="number" class="form-control" placeholder="Duration" name="duration" aria-describedby="basic-addon1">

            <input id="textvak" type="date" class="form-control" placeholder="Expiredate" name="expiredate" aria-describedby="basic-addon1">



            <button type="submit">Add deadline</button>

            </br>

            <a href="index.php">Cancel</a>

        </form>

    </div>

</body>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>