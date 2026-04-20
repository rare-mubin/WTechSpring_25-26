<?php
include "../Controller/validation.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Registration Log In Form</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form class="form" method ="post" action="viewdata.php">
            <h2>Registration Form</h2>
            <table>
                <tr>
                    <td><p style="color: red;">* required field</p></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input class="input-field" type="text" name="name"></td>
                    <td><p style="color: red;">*</p></td>
                </tr> 

                <tr>
                    <td>Email:</td>
                    <td><input class="input-field" type="email" name="email"></td>
                    <td><p style="color: red;">*</p></td>
                </tr>

                <tr>
                    <td>Website:</td>
                    <td><input class="input-field" type="url" name="website"></td>
                </tr>
                <tr>
                    <td>Comment:</td>
                    <td><textarea class="input-field" id="comment" name="comment"></textarea></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="male"> Male
                        <input type="radio" name="gender" value="female"> Female
                    </td>
                    <td><p style="color: red;">*</p></td>
                </tr>

                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>