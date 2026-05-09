<?php
include "../model/DB.php";

$name = "";
$email = "";
$password = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!$name || !$email || !$password) {
        echo "All fields are required.";
    }
    else {
        $db = new DB();
        $connection = $db->connect();
        $result = $db->insertUser($connection, $name, $email, $password);

        if($result) 
        {
            header("Location: ../View/LogIn.php");
            echo "Registration successful.";
        }
        else {
            echo "Registration failed.";
        }
    }
}

?>