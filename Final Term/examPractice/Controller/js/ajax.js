function AddUser() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            if (xhttp.responseText.trim() === "OK") {
                window.location.href = "../View/LogIn.php";
            } else {
                alert(xhttp.responseText);
            }
        }
    };
    xhttp.open("POST", "../Controller/RegValidate.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("action=Add&name=" + name + "&email=" + email + "&password=" + password);
}

function LogIn() 
{
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            if (xhttp.responseText.trim() === "OK") {
                window.location.href = "../View/Welcome.php";
            } else {
                alert(xhttp.responseText);
            }
        }
    };
    xhttp.open("POST", "../Controller/RegValidate.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("action=LogIn&email=" + email + "&password=" + password);
}

function getUsers() 
{
    console.log("Fetching users...");
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            if(xhttp.responseText.trim() === "error") 
            {
                alert("Error fetching users");
            }
            else
            {
                var users = JSON.parse(xhttp.responseText);
                
                let Html = "";
                
                for (var i = 0; i < users.length; i++)
                {
                    Html += `<tr>
                                <td>${users[i].name}</td>
                                <td>${users[i].email}</td>
                                <td>${users[i].password}</td>
                                <td><button onclick="deleteUser(${users[i].id})">Delete</button></td>
                            </tr>`;
                }
                document.getElementById("Table").innerHTML = Html;
            }
        }
    };
    xhttp.open("POST", "../Controller/RegValidate.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("action=getUsers");
}

function deleteUser(id)
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            if(xhttp.responseText.trim() === "OK")
            {
                getUsers();
            }   
            else{
                alert("Error deleting user");
            }
        }
    };
    xhttp.open("POST", "../Controller/RegValidate.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("action=deleteUser&id=" + id);
}