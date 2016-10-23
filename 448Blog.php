<?php

//get values
$username = $_POST["username"];
$isAdmin = false;
$userExists = false;

$mysqli = new mysqli("mysql.eecs.ku.edu", "rmanweiler", "hello", "rmanweiler");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id, isAdmin FROM Users";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        if($username == $row["user_id"]){
            $userExists = true;
            $isAdmin = $row["isAdmin"];
            break;
        }
    }

    if($userExists){
        if($isAdmin) header('Location: https://people.eecs.ku.edu/~rmanweil/448/Lab5/AdminHome.html');
        else header('Location: https://people.eecs.ku.edu/~rmanweil/448/Lab5/CreatePost.html');
    }
    else {
        echo "<style>";
        echo "body{ background-color: azure;}";
        echo "h3{ color: DarkBlue;";
        echo "font-family: Georgia;";
        echo "font-size: 300%}";
        echo "h5{ border-width: thin;";
        echo "border-color: blue;";
        echo "font-family: Georgia;";
        echo "font-size: 100%;}";
        echo "</style>";

        echo "<body>";
        echo "<h3>448Blog</h3>";
        echo "<h5>We could not find that username in our system. What would you like to do?</h5>";
        echo "<p><a href=\"CreateUser.html\">Create a new user</a></p>";
        echo "<p><a href=\"448Blog.html\">Go back to the main page</a></p>";
    }
}
/* free result set */
$result->free();
/* close connection */
$mysqli->close();
?>
