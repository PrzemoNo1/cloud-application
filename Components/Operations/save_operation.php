<?php
    @session_start();

    class Save_operation
    {
        private $_database_wrapper;
        public function __construct($database_wrapper)
        {
            $_database_wrapper = $database_wrapper;
        }
        public function execute()
        {
            $this->remove_marked_urls();
            $this->add_new_url_to_database();
        }

        private function remove_marked_urls()
        {
            $array_to_remove = [];
            $old_array = $_SESSION['rss_list'];
            foreach($old_array as $key => $value)
            {
                if ($value == 'true')
                {
                    $array_to_remove += [$key => $value];
                }
            }
            $database_wrapper = unserialize($_SESSION['database_wrapper']);
            $database_wrapper->remove($array_to_remove);
        }

        private function add_new_url_to_database()
        {
            if (!isset($_SESSION['url']))
            {
                return;
            }

            $url = $_SESSION['url'];

            $database_wrapper = unserialize($_SESSION['database_wrapper']);
            $database_wrapper->add($url);
        }
    }
?>