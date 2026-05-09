<?php
include "../Model/DB.php";

session_start();

$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $connection = new DB();
    $result = $connection->getUser($connection->getConnection(), $email, $password);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $user = [
                "id" => $row["id"],
                "name" => $row["name"],
                "email" => $row["email"]
            ];
        }
        $_SESSION["user"] = $result;
        header("Location: ../View/Welcome.php");
        echo "Login successful.";
    } else {
        echo "Invalid email or password.";
    }
}
?>