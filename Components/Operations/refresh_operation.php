<?php
    @session_start();

    class Refresh_operation
    {
        public function execute()
        {
            $database_wrapper = unserialize($_SESSION['database_wrapper']);
            $array_to_select = $database_wrapper->select_all();

            $new_string = "<br/>";
            foreach($array_to_select as $key => $value)
            {
                if ($value != "" && $value != NULL)
                {
                    $new_string .= "<input type=\"checkbox\" name=\"$value\"/>$value<br/>";
                }
            }
            $_SESSION['rss_list_output'] = $new_string;
        }
    }
?>