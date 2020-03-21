<?php
    class Send_preconditions
    {
        public function check()
        {
            if (!isset($_SESSION['mail_address']))
            {
                return false;
            }

            if (!isset($_SESSION['rss_list']) || count($_SESSION['rss_list']) == 0)
            {
                return false;
            }

            return true;
        }
    }
?>