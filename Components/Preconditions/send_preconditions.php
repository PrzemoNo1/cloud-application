<?php
    class Send_preconditions
    {
        public function check()
        {
            if (isset($_SESSION['email_address']))
            {
                return false;
            }

            if (count($_SESSION['rss_list']) == 0)
            {
                return false;
            }

            return true;
        }
    }
?>