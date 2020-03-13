<?php
    class Form
    {
        private $mail_address;
        private $url;

        public function __construct(array $request)
        {
            $this->mail_address = isset($request['mail_address']) ? $request['mail_address'] : NULL;
            $this->url = isset($request['url']) ? $request['url'] : NULL;
        }
    }
?>