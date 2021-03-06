<?php

    session_start();

    class Form
    {
        public function __construct(array $request)
        {
            $_SESSION['mail_address'] = isset($request['mail_address']) ? $request['mail_address'] : NULL;
            $_SESSION['url'] = isset($request['url_to_verify']) ? $request['url_to_verify'] : NULL;
            $_SESSION['action'] = isset($request['save']) ? 'save' : 'send';
            $_SESSION['rss_list'] = isset($_SESSION['rss_list_output']) ? $this->convert_to_array($_SESSION['rss_list_output'], $request) : array();
        }

        private function convert_to_array(string $rss_list_output, array $request)
        {
            $rss_list = $rss_list_output;
            $converted = explode("<br/>", $rss_list);
            $size = count($converted);
            $return_array = [];
            for ($i = 1; $i < $size - 1; $i++) {
                $name = $this->pull_name($converted[$i]);
                $checkbox_status = $this->pull_checkbox($converted[$i], $request);
                echo "<br/>";
                echo $name;
                echo "<br/>";
                echo $checkbox_status;
                $return_array += [$name => $checkbox_status];
            }
            return $return_array;
        }

        private function pull_name(string $single_checkbox)
        {
            $tmp_single_checkbox = $single_checkbox;
            $converted_for_name = explode("/>", $tmp_single_checkbox);
            $name = isset($converted_for_name[1]) ? $converted_for_name[1] : NULL;
            return $name;
        }

        private function pull_checkbox(string $single_checkbox, array $request)
        {
            echo "<br/><br/>PULL CHECKBOX<br/><br/>";
            $tmp_single_checkbox = $this->change_dot_to_underscore($single_checkbox);
            echo "<br/>$tmp_single_checkbox<br/>";
            $converted_for_checkbox_name = explode("\"/>", $tmp_single_checkbox);
            print_r($converted_for_checkbox_name);
            echo "<br/>";
            $checkbox_name = $converted_for_checkbox_name[0];
            echo $checkbox_name;
            $converted_for_checkbox_name_again = explode("name=\"", $checkbox_name);
            echo "<br/>";
            print_r($converted_for_checkbox_name_again);
            $final_checkbox_name = isset($converted_for_checkbox_name_again[1]) ? $converted_for_checkbox_name_again[1] : NULL;
            return isset($request[$final_checkbox_name]) ? 'true' : 'false';
        }

        private function change_dot_to_underscore(string $original_request)
        {
            $return_request = $original_request;
            for ($i = 0; $i < strlen($original_request); $i++)
            {
                if ($return_request[$i] == ".")
                {
                    $return_request[$i] = "_";
                }
            }
            return $return_request;
        }
    }
?>