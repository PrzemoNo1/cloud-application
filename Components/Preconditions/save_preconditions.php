<?php
    class Save_preconditions
    {
        public function check()
        {
            if (!isset($_SESSION['mail_address']))
            {
                return false;
            }
            else if (isset($_SESSION['rss_list']) && $this->isRemoveOperation())
            {
                return true;
            }
            else if (isset($_SESSION['url']))
            {
                return true;
            }

            return true;
        }

        private function isRemoveOperation()
        {
            $rss_list = $_SESSION['rss_list'];
            foreach($rss_list as $key => $value)
            {
                if($value == 'true')
                {
                    return true;
                }
            }
            return false;
        }
    }
?>