<?php
    @session_start();

    class Save_operation
    {
        public function execute()
        {
            $this->remove_marked_urls();
            if (isset($_SESSION['url']))
            {
                $this->add_new_url_to_database();
            }
        }

        private function remove_marked_urls()
        {
            $array_to_remove = [];
            $old_array = $_SESSION['rss_list'];
            echo "Save operation <br/>";
            print_r($old_array);
            foreach($old_array as $key => $value)
            {
                if ($value == 'true')
                {
                    $array_to_remove += [$key => $value];
                }
            }
            $database_wrapper = unserialize($_SESSION['database_wrapper']);
            echo "Save operation <br/>";
            print_r($array_to_remove);
            if (count($array_to_remove) != 0)
            {
                $database_wrapper->remove($array_to_remove);
            }
        }

        private function add_new_url_to_database()
        {
            if (!isset($_SESSION['url']) || $_SESSION['url'] == NULL)
            {
                return;
            }
            $url = $_SESSION['url'];

            $database_wrapper = unserialize($_SESSION['database_wrapper']);
            $database_wrapper->add($url);
        }
    }
?>