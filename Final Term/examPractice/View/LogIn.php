<!DOCTYPE html>
<html>
<head>
    <title> Log In Form</title> 
</head>
<body style="background-color: #000000; color: white;">
    <form onsubmit="event.preventDefault(); LogIn();" style="width: 100%; height: 100vh; display: flex; align-items: center; justify-content: center;">
        <table>
            <tr>
                <td>Email:</td>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Log In"></td>
                <td><button><a href="SignUp.php">Sign Up</a></button></td>
            </tr>
        </table>
    </form>
    <script src="../Controller/js/ajax.js"></script>
</body>
</html>