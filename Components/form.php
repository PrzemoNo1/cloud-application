<?php

    session_start();

    class Form
    {
        public function __construct(array $request)
        {
            $_SESSION['mail_address'] = isset($request['mail_address']) ? $request['mail_address'] : NULL;
            $_SESSION['url'] = isset($request['url']) ? $request['url'] : NULL;
            $_SESSION['action'] = isset($request['save']) ? 'save' : 'send';
            $_SESSION['rss_list'] = isset($request['rss_list']) ? convert_to_array() : array();
        }

        private function convert_to_array()
        {
            return array();
        }
    }
?>