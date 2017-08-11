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
<div class="row">
<div id="profile" class="col-md-3">
    <h3 id="name" class="text-center">Arne Van Beveren</h3>

        <div class="col-md-10 col-md-offset-1">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
        </div><!-- /input-group -->
        </div>
</div>

    <div id="date" class="col-md-9">


        <h4> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            <?php echo (new \DateTime())->format('l, jS F, Y'); ?></h4>
    </div>

</div>

</body>
</html>