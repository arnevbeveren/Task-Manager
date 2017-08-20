<?php
spl_autoload_register( function($class){
    include_once("classes/". $class . ".php");
});

session_start();

if(!isset($_SESSION['user_id'])){
    header("Location:Login.php");
}


$user = new User();
$currentProfile = $user->getUser();


$deadline = new Deadlines();




if(isset($_GET["list"])){
    $deadline->setList( $_GET["list"] );
    $deadlines = $deadline->getDeadlineList();
    $deadlines_menu = $deadline->getDeadlines();

}
else{
    $deadlines = $deadline->getDeadlines();
    $deadlines_menu = $deadline->getDeadlines();
}



if( !empty($_POST)){

    if ($_POST['action'] === "removeDeadline") {
        $deadline->Id = ($_POST['id']);

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

<div class="wrapper">

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

        <h2 class="text-center">Lists</h2>

        <ul class="lists">
            <li>
                <a href="index.php"><span id='folder' class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> All deadlines</a>
            </li>
            <?php
            $lastList = "";
            foreach($deadlines_menu as $key=>$deadline):
                $list = $deadline['list'];
                ?>
            <li>
                <a href="index.php?list=<?php echo $list ?>">

                    <?php

                    if($list !== $lastList){
                        echo "<span id='folder' class=\"glyphicon glyphicon-folder-open\" aria-hidden=\"true\"></span>" . $list;
                        $lastList = $list;
                    }
                    ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

    </div>





</div>

    <div id="date" class="col-md-9">


        <h4> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            <?php echo (new \DateTime())->format('l, jS F, Y'); ?></h4>
    </div>
    <div id="list" class="col-md-9">
        <ul id="listupdates">

            <?php foreach($deadlines as $key=>$deadline):?>

            <li id="<?php echo $deadline['id']; ?>">

                    <p class="
                    <?php
                    $date = strtotime($deadline['expiredate']);
                        if($date < (time() + 86400 )){
                            echo "rood";
                        }
                    else if($date < (time() + 259200 )){
                        echo "oranje";
                    }
                    else if($date < (time() + 604800 )){
                        echo "geel";
                    }
                    else{
                        echo "nostress";
                    }
                    ?>
                    " id="timeleft">
                        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                        <?php
                        $date = strtotime($deadline['expiredate']);
                        if($date > time()){
                        $remaining = $date - time();
                        $days_remaining = floor($remaining / 86400);
                        $hours_remaining = floor(($remaining % 86400) / 3600);
                            if($days_remaining < 1){
                                echo "$hours_remaining hours left";
                            }
                            else{
                                echo "$days_remaining days and $hours_remaining hours left";}
                        }
                        else{
                            echo "expired";
                        }

                        ?></p>


                    <p class="grijs" id="expiredate">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <?php echo (new \DateTime($deadline['expiredate']))->format('l, jS F, Y'); ?></p>

                    <p class="grijs" id="duration">
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                        <?php echo $deadline['duration']; ?>h</p>

                    <p class="" id="deadline"><?php echo $deadline['deadline']; ?></p>

                    <p class="" id="list"><?php echo $deadline['list']; ?></p>

                    <p class="" id="name">by <?php echo $deadline['firstname']; echo " "; echo $deadline['lastname']; ?></p>

                <form class="remover" method='post' action=''>

                    <input type='hidden' name='action' value='removeDeadline' />

                    <input type='hidden' id='id' name='id' value="<?php echo $deadline['id']; ?>" />

                    <input type='image' src='img/soft_grey_action_delete.png' id="btnRemove <?php echo $deadline['id']; ?>" class="btnRemove" />

                </form>
            </li>
            <?php endforeach; ?>
        </ul>

    </div>

</div>



</body>

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>