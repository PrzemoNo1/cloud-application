<?php
    @session_start();

    class Send_operation
    {
        private $_database_wrapper;
        public function __construct($database_wrapper)
        {
            $_database_wrapper = $database_wrapper;
        }
        public function execute()
        {
            $rss_to_send = $this->get_urls_from_rss_list();
            $htmls = [];
            foreach($rss_to_send as $rss)
            {
                $htmls += [$this->convert_xml_to_html($rss)];
                $htmls += ["<br><br><br><br><br><br><br><br><br><br><br><br><br><br>"];
            }

            $this->publish_email_view($htmls);
/*            $this->send_email($htmls);*/
        }

        private function get_urls_from_rss_list()
        {
            $urls = $this->get_rss_list_from_database();

            return $urls;
        }

        private function get_rss_list_from_database()
        {
            $database_wrapper = unserialize($_SESSION['database_wrapper']);
            return $database_wrapper->select_all();
        }

        private function convert_xml_to_html(string $url)
        {
            $xml = file_get_contents($url);
            $xml = simplexml_load_string($xml);
            $output = "";
            $i=0;
            if($xml){
                $site = $xml->channel->title;
                $sitelink = $xml->channel->link;

                $output .= "<h1>".$site."</h1></br>";
                foreach ($xml->channel->item as $item) {
                    $title = $item->title;
                    $link = $item->link;
                    $description = $item->description;
                    $postDate = $item->pubDate;
                    $pubDate = date('D, d M Y',strtotime($postDate));
                    $output .= "<br/>$title";
                    $output .= "<br/>$link";
                    $output .= "<br/>$description";
                    $output .= "<br/>$postDate";
                    $output .= "<br/>$pubDate";
                    $output .= "<br/><br/><br/>";
                }
            }

            return $output;
        }

        private function publish_email_view(array $array_to_publish)
        {
            $output = "";
            foreach($array_to_publish as $publish)
            {
                $output .= $publish;
            }
            $_SESSION['email_view'] = $output;
        }

        private function send_email(array $array_to_sent)
        {

        }
    }
?>