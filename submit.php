<?php

    require_once "Components/Precondtions/save_preconditions.php";
    require_once "Components/Precondtions/send_preconditions.php";

    $save_preconditions = new Save_preconditions();
    $send_preconditions = new Send_preconditions();

    if (isset($_POST['save']))
    {
        echo "This is save action";
    }
    else if (isset($_POST['send']))
    {
        echo "This is send action";
    }
?>