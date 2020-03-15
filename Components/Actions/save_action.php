<?php
    session_start();
    class Save_action
    {
        public function execute()
        {
            if (isset($_SESSION['url']))
            {
                $new_url = new new_url();
                $new_url->add_to_rss_list();
            }

            if (is_remove_operation_called())
            {
                $old_url = new old_url();
                $old_url->remove_from_rss_list();
            }
        }

        private function is_remove_operation_called()
        {
            return false;
        }
    }
?>