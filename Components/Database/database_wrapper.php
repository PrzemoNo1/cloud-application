<?php
    class Database_wrapper
    {
        function __construct() {
            require "connect_configuration.php";
            $connection = new mysqli($host, $user, $password, $database);
        }

        public function remove(array $remove_array)
        {
            require "connect_configuration.php";
            $connection = new mysqli($host, $user, $password, $database);
            echo "<br/>Usun <br/>";
            print_r($remove_array);
            foreach($remove_array as $key => $value)
            {
                $my_sql_query = "DELETE FROM rss WHERE rss.rss = \"$key\"";
                echo "<br/>";
                echo $my_sql_query;
                $connection->query($my_sql_query);
            }
            $connection->close();
        }

        public function add(string $new_url)
        {
            require "connect_configuration.php";
            $connection = new mysqli($host, $user, $password, $database);
            echo "</br>Dodaj <br/>";
            echo $new_url;
            $my_sql_query = "INSERT INTO rss (id, rss) VALUES (\"\", \"$new_url\")";
            echo $my_sql_query;
            $connection->query($my_sql_query);
            $connection->close();
        }
    }
?>