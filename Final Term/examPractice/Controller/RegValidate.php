<?php
include "../model/DB.php";
session_start();

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if($action == "Add") 
{
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if(!$name || !$email || !$password) {
        echo "All fields are required.";
    }
    else {
        $db = new DB();
        $connection = $db->connect();
        $result = $db->insertUser($connection, $name, $email, $password);

        if($result) 
        {
            echo "OK";
            exit;
        }
        else {
            echo "Registration failed.";
        }
    }
}

elseif($action == "LogIn")
{
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    $db = new DB();
    $connection = $db->connect();
    $result = $db->getUser($connection, $email, $password);

    if ($result) {
        $row = $result->fetch_assoc();
        $user = [
            "id" => $row["id"],
            "name" => $row["name"],
            "email" => $row["email"]
        ];
        $_SESSION["user"] = $user;

        echo "OK";
    } else {
        echo "Invalid email or password.";
    }
}

elseif($action == "getUsers")
{
    $db = new DB();
    $connection = $db->connect();
    $sql = "SELECT * FROM users";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        if($result) {
            $users = [];
            while($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            echo json_encode($users);
        } else {
            echo "No users found.";
        }
    } else {
        echo "error";
    }
}

elseif($action == "deleteUser")
{
    $id = $_POST["id"] ?? '';

    if(!$id) {
        echo "User ID is required.";
        exit;
    }

    $db = new DB();
    $connection = $db->connect();
    $sql = "DELETE FROM users WHERE id='$id'";
    $result = $connection->query($sql);

    if ($result === TRUE) {
        echo "OK";
    } else {
        echo "Error deleting user: " . $connection->error;
    }
}

?>