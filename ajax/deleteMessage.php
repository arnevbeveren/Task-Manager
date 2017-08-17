<?php
spl_autoload_register(function ($class) {
    include '../classes/' . $class . '.php';
});


$deadline = new Deadlines();
if(!empty($_POST['id']))
{
    $deadline->setId($_POST['id']);
    try
    {
        $deadline->removeDeadline();
        $response['status'] = 'removed';
        $response['message'] = 'removed succesfully';
    }
    catch (Exception $e)
    {
        $feedback = $e->getMessage();
        $response['status'] = "error";
        $response['message'] = $feedback;
    }
    header('Content-type: application/json');
    echo json_encode($response);
}