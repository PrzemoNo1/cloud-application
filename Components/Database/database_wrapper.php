<?php
    class Database_wrapper
    {
        public function remove(array $remove_array)
        {
            require "connect_configuration.php";
            $connection = new mysqli($host, $user, $password, $database);
            if (!$connection)
            {
                echo "Error: Unable to connect to MySQL.";
                echo "Debugging errno: ".mysqli_connect_errno();
                echo "Debugging error: ".mysqli_connect_error();
                exit;
            }
            print_r($remove_array);
            foreach($remove_array as $key => $value)
            {
                $my_sql_query = "DELETE FROM $table WHERE rss.rss = \"$key\" OR rss.rss = \"\"";
                echo "<br/>";
                echo $my_sql_query;
                if($result = $connection->query($my_sql_query))
                {
                    $connection->close();
                }
                else
                {
                    echo "Remove operation cannot be executed due to incorrect MySql statement<br/>";
                    echo "$my_sql_query<br/>";
                    exit;
                }
            }
        }

        public function add(string $new_url)
        {
            require "connect_configuration.php";
            $connection = new mysqli($host, $user, $password, $database);
            if (!$connection)
            {
                echo "Error: Unable to connect to MySQL.";
                echo "Debugging errno: ".mysqli_connect_errno();
                echo "Debugging error: ".mysqli_connect_error();
                exit;
            }
            echo "</br>Dodaj <br/>";
            echo $new_url;
            $my_sql_query = "INSERT INTO $table (id, rss) VALUES (\"\", \"$new_url\")";
            echo $my_sql_query;
            if ($result = $connection->query($my_sql_query))
            {
                $connection->close();
            }
            else
            {
                echo "Add operation cannot be executed due to incorrect MySql statement<br/>";
                echo "$my_sql_query<br/>";
                exit;
            }
        }

        public function select_all()
        {
            require "connect_configuration.php";
            $connection = new mysqli($host, $user, $password, $database);
            if (!$connection)
            {
                echo "Error: Unable to connect to MySQL.";
                echo "Debugging errno: ".mysqli_connect_errno();
                echo "Debugging error: ".mysqli_connect_error();
                exit;
            }
            $my_sql_query = "SELECT rss.rss FROM $table";
            if ($result = $connection->query($my_sql_query))
            {
                $return_array = [];
                while($obj = $result->fetch_object()){
                    $return_array[] = $obj->rss;
                }
                $connection->close();
                return $return_array;
            }
            else
            {
                echo "Select operation cannot be executed due to incorrect MySql statement<br/>";
                echo "$my_sql_query<br/>";
                exit;
            }
        }
    }
?>