<?php
spl_autoload_register( function($class){
    include_once("classes/". $class . ".php");
});

session_start();

$user = new User();
$currentProfile = $user->getUser();

$deadline = new Deadlines();
$deadlines = $deadline->getDeadlines();
?>
<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<meta charset="UTF-8">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
</head>
<body>
<?php include_once('includes/include.nav2.php'); ?>

<div id="profile" class="col-md-3">
    <h3 id="name" class="text-center"><?php echo($currentProfile['firstname']);?> <?php echo($currentProfile['lastname']);?></h3>

    <a href="add-deadline.php" class="center-block">+ add deadline</a>

</div>

    <div id="date" class="col-md-9">


        <h4> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            <?php echo (new \DateTime())->format('l, jS F, Y'); ?></h4>
    </div>
    <div id="list" class="col-md-9">
        <ul>
            <?php foreach($deadlines as $key=>$deadline): ?>
            <li>
                <p><?php echo $deadline['deadline']; ?></p>
                <p><?php echo $deadline['expiredate']; ?></p>
                <p><?php echo $deadline['duration']; ?>h</p>
                <div class="btns">
                <button type="button" class="btn btn-default" aria-label="Left Align">
                    <span id="blue"  class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </button>
                <button type="button" class="delete btn btn-default" aria-label="Left Align">
                    <span id="red" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                </button>
                </div>

            </li>
            <?php endforeach; ?>
        </ul>

    </div>



</body>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>