<?php

    require_once "Form.php";
    require_once "Preconditions/save_preconditions.php";
    require_once "Preconditions/send_preconditions.php";

    $save_preconditions = new Save_preconditions();
    $send_preconditions = new Send_preconditions();
    $form = new Form($_POST);

    if (isset($_POST['save']))
    {
        echo "This is save action";
    }
    else if (isset($_POST['send']))
    {
        echo "This is send action";
    }
?>