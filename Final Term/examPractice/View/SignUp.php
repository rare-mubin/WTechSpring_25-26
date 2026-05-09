
<!DOCTYPE html>
<html>
<head>
    <title> Sign Up Form</title>
</head>
<body style="background-color: #000000; color: white;">
    <form onsubmit="event.preventDefault(); AddUser();" style="width: 100%; height: 100vh; display: flex; align-items: center; justify-content: center;">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" id="name" name="name"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" id="email" name="email"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Sign Up"></td>
                <td><button><a href="LogIn.php">Log In</a></button></td>
            </tr>
        </table>
    </form>

    <script src="../Controller/js/ajax.js"></script>
</body>
</html>