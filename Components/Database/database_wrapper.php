<?php
    class Database_wrapper
    {
        public function remove(array $remove_array)
        {
            require "connect_configuration.php";
            $connection = new mysqli($host, $user, $password, $database);
            echo "<br/>Usun <br/>";
            print_r($remove_array);
            foreach($remove_array as $key => $value)
            {
                $my_sql_query = "DELETE FROM rss WHERE rss.rss = \"$key\" OR rss.rss = \"\"";
                echo "<br/>";
                echo $my_sql_query;
                if($result = $connection->query($my_sql_query))
                {
                    echo "Works";
                }
                else{
                    echo "Doesn't work";
                }
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

        public function select_all()
        {
            require "connect_configuration.php";
            $connection = new mysqli($host, $user, $password, $database);
            $my_sql_query = "SELECT rss.rss FROM rss";
            echo $my_sql_query;
            $result = $connection->query($my_sql_query);
            $return_array = [];
            while($obj = $result->fetch_object()){
                $return_array[] = $obj->rss;
            }
            $connection->close();
            return $return_array;
        }
    }
?>