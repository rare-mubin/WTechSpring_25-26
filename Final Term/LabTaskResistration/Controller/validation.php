<?php 

$name = "";
$email = "";
$website = "";
$comment = "";
$gender = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];
    $gender = $_POST["gender"];

    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $website = $_REQUEST["website"];
    $comment = $_REQUEST["comment"];
    $gender = $_REQUEST["gender"];


    //name validation
    if(empty($name)){
        echo "Name is required </br>";
    }
    elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        echo "Only letters and white space allowed</br>";
    }
    elseif(!empty($name) && strlen($name)>3){
        echo "Name: ".$name ."</br>";
    }
    else{
        echo "UserName must be greater than 3 char </br>";
    }


    //email validation
    if (empty($email)) {
        echo "Email is required </br>";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format </br>";
    }
    elseif(!empty($email)){
        echo "Email: ".$email ."</br>";
    }


    //website validation
    if (empty($website)) {
        $website = "";
    } 
    elseif(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        $websiteErr = "Invalid URL";
    }
    elseif(!empty($website)){
        echo "Website: ".$website ."</br>";
    }


    //gender validation
    if (isset($gender) && $gender=="female"){
        echo "Gender: ".$gender ."</br>";
    }
    elseif (isset($gender) && $gender=="male"){
        echo "Gender: ".$gender ."</br>";
    }
    else{
        echo "Please select a gender </br>";
    }
    

    //echo comment
    if(!empty($comment)){
        echo "Comment: ".$comment ."</br>";
    }


}
