<?php

class DB {
    
    function connect() {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "Practice";

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }

    function insertUser($connection, $name, $email, $password) {

        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

        $result = $connection->query($sql);
        
        if ($result === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        
        return $result;
    }

    function getUser($connection, $email, $password) {
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
}

?>