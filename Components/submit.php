<?php
    require_once "Form.php";
    require_once "Preconditions/save_preconditions.php";
    require_once "Preconditions/send_preconditions.php";

    $form = new Form($_POST);

    if ($_SESSION['action'] == 'save')
    {
        $save_preconditions = new Save_preconditions();
        $are_preconditions_fulfilled =  $save_preconditions->check();
        $action;
    }
    else
    {
        $send_preconditions = new Send_preconditions();
        $are_preconditions_fulfilled =  $send_preconditions->check();
        $action
    }

    if (!$are_preconditions_fulfilled)
    {
        echo "Cos tam wyszlo?";
        exit();
    }

    if ()
?>