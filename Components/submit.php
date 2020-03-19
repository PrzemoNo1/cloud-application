<?php
    require_once "Form.php";
    require_once "../startup.php";
    require_once "Preconditions/save_preconditions.php";
    require_once "Preconditions/send_preconditions.php";
    require_once "Operations/save_operation.php";
    require_once "Operations/send_operation.php";

    $form = new Form($_POST);

    $operation = NULL;

    if ($_SESSION['action'] == 'save')
    {
        $save_preconditions = new Save_preconditions();
        $are_preconditions_fulfilled =  $save_preconditions->check();
        $operation = unserialize($_SESSION['save_operation']);
    }
    else
    {
        $send_preconditions = new Send_preconditions();
        $are_preconditions_fulfilled =  $send_preconditions->check();
        $operation = unserialize($_SESSION['send_operation']);
    }

    if (!$are_preconditions_fulfilled)
    {
        unset($_SESSION['email_view']);
        header("Location: ../index.php?is_runtime=true");
        exit();
    }

    $operation->execute();
    $refresh_operation = unserialize($_SESSION['refresh_operation']);
    $refresh_operation->execute();
    header("Location: ../index.php?is_runtime=true");
?>