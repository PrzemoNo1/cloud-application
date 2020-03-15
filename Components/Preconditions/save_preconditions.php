<?php
    class Save_preconditions
    {
        public function check()
        {
            if (isset($_SESSION['email_address']))
            {
                return false;
            }

            if ($this->isRemoveOperation())
            {
                return true;
            }
            else if (isset($_SESSION['rss_list']) && count($_SESSION['rss_list']) != $this->counter)
            {
                return false;
            }

            return true;
        }

        private function isRemoveOperation()
        {
            return true;
        }

        private $counter;
    }
?>