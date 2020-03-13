<?php
    require_once "Components/Database/database_wrapper.php";
    require_once "save_operation.php";
    @session_start();

    function setUp() {
        $database_wrapper = new Database_wrapper();
        $save_operation = new Save_operation($database_wrapper);
        $_SESSION['database_wrapper'] = $database_wrapper;
        $_SESSION['save_operation'] = $save_operation;
    }
?>