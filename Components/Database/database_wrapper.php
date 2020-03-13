<?php
    class Database_wrapper
    {
        private $connection = NULL;
        function __construct() {
            require_once "Components/Database/connect_configuration.php";
            $this->connection = new mysqli($host, $user, $password, $database);
        }

        function __destruct() {
            $this->connection->close();
        }
    }
?>