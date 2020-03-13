<?php
    @session_start();

    class Send_operation
    {
        private $_database_wrapper;
        public function __construct($database_wrapper)
        {
            $_database_wrapper = $database_wrapper;
        }
        public function execute()
        {

        }
    }
?>