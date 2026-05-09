<?php
include "../Controller/RegValidate.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
</head>
<body onload="event.preventDefault(); getUsers();" style="background-color: #000000; color: white;">
    <h1>Welcome, <?php echo $_SESSION["user"]["name"]; ?>!</h1>
    <p>Your email: <?php echo $_SESSION["user"]["email"]; ?></p>

    </br>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody id="Table">
        </tbody>
    </table>
    <script src="../Controller/js/ajax.js"></script>
</body>
</html>