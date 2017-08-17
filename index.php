<?php
spl_autoload_register( function($class){
    include_once("classes/". $class . ".php");
});

session_start();


$user = new User();
$currentProfile = $user->getUser();

$deadline = new Deadlines();
$deadlines = $deadline->getDeadlines();

if( !empty($_POST)){

    if ($_POST['action'] === "removeDeadline") {
        $deadline->Id = $_POST['id'];

        try {
            $deadline->removeDeadline();
        } catch (Exception $e) {
            $feedback = $e->getMessage();
        }

    }


}

?>
<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/removeDeadline.js"></script>
<meta charset="UTF-8">
<head>
    <meta charset="UTF-8">
    <title>Tasky - Task Manager</title>
</head>
<body>
<?php include_once('includes/include.nav2.php'); ?>

<div id="profile" class="col-md-3">


    <div class="logo">
        <div class="c c1"></div>
        <div class="c c2"></div>
        <div class="c c3"></div>
        <div class="c c4"></div>

    <p class="text-center"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></p>

    <h2 class="text-center">Tasky</h2>
        <p class="text-center">Welcome to Tasky, the new generation task manager!</p>


        <a href="add-deadline.php" class="center-block"><p class="text-center">+ add deadline</p></a>

    </div>





</div>

    <div id="date" class="col-md-9">


        <h4> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            <?php echo (new \DateTime())->format('l, jS F, Y'); ?></h4>
    </div>
    <div id="list" class="col-md-9">
        <ul id="listupdates">

            <?php foreach($deadlines as $key=>$deadline): ?>

            <li id="<?php echo $deadline['id']; ?>">



                    <p><?php echo $deadline['deadline']; ?></p>
                    <p><?php echo $deadline['expiredate']; ?></p>
                    <p><?php echo $deadline['duration']; ?>h</p>

                <form method='post' action=''>

                    <input type='hidden' name='action' value='removeDeadline' />

                    <input type='hidden' id='id' name='id' value="<?php echo $deadline['id']; ?>" />

                    <input type='image' src='img/soft_grey_action_delete.png' id="btnRemove <?php echo $deadline['id']; ?>" class="btnRemove" />

                </form>
            </li>
            <?php endforeach; ?>
        </ul>

    </div>



</body>

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>