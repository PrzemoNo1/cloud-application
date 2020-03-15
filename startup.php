<?php
    require_once "Components/Database/database_wrapper.php";
    require_once "Components/Operations/save_operation.php";
    require_once "Components/Operations/send_operation.php";
    @session_start();

    function setUp() {
        echo "odpalilo sie";
        $database_wrapper = new Database_wrapper();
        $save_operation = new Save_operation($database_wrapper);
        $send_operation = new Send_operation($database_wrapper);
        $_SESSION['database_wrapper'] = serialize($database_wrapper);
        $_SESSION['save_operation'] = serialize($save_operation);
        $_SESSION['send_operation'] = serialize($send_operation);
    }
?>