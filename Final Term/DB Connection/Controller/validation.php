<?php 
include "../Model/db.php";
session_start();

$name = "";
$email = "";
$website = "";
$comment = "";
$gender = "";

$nameV = false;
$emailV = false;
$genderV = false;


$datafile ="../data.json";

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
        // echo "Name: ".$name ."</br>";
        $nameV = true;
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
        // echo "Email: ".$email ."</br>";
        $emailV = true;
    }


    //website validation
    if (empty($website)) {
        $website = "";
    } 
    elseif(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        $websiteErr = "Invalid URL";
    }
    elseif(!empty($website)){
        // echo "Website: ".$website ."</br>";
    }


    //gender validation
    if (isset($gender) && $gender=="female"){
        // echo "Gender: ".$gender ."</br>";
        $genderV = true;
    }
    elseif (isset($gender) && $gender=="male"){
        // echo "Gender: ".$gender ."</br>";
        $genderV = true;
    }
    else{
        echo "Please select a gender </br>";
    }
    

    //echo comment
    if(!empty($comment)){
        // echo "Comment: ".$comment ."</br>";
    }



    if($nameV && $emailV && $genderV){
        $formdata = array('name' => $name, 'email' => $email,'website' => $website,'comment' => $comment,);

        //check file exist
        if(file_exists($datafile)){
            $existdata = file_get_contents($datafile);
            $tempdata = json_decode($existdata,true);

            // $existdata = file_put_contents($datafile);
        }
        else{
            $tempdata = array();
        }

        if(!is_array($tempdata)){
            $tempdata = array();
        }

        $tempdata [] = $formdata;
        $jesonData = json_encode($tempdata, JSON_PRETTY_PRINT); //JSON_PRETTY_PRINT used for proper structure
        
        if(file_put_contents($datafile,$jesonData)  !== false ){
            // echo "Data Save";
        }
        else{
            echo "Please try again";
        }


        $data = file_get_contents($datafile);
        $mydata = json_decode($data,true);
    }

}
