<?php
    require_once "database_wrapper.php";
    @session_start();

    function setUp() {
        $database_wrapper = new Database_wrapper();
        $_SESSION['database_wrapper'] = $database_wrapper;
    }

?>