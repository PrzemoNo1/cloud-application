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
            else if (isset($_SESSION['url']) && $this->is_url_correct($_SESSION['url']))
            {
                return true;
            }
            return false;
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

        private function is_url_correct(string $url)
        {
            try
            {
                file_get_contents($url) !== false;
            }
            catch (Exception $e)
            {
                return false;
            }
            return true;
        }
    }
?>