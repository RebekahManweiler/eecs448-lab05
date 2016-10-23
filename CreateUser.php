<?php

//get values
$username = $_POST["username"];
$usertype = $_POST["usertype"];
$isAdmin = false;
if($usertype == "Admin") $isAdmin = true;

$mysqli = new mysqli("mysql.eecs.ku.edu", "rmanweiler", "hello", "rmanweiler");

				/* check connection */
				if ($mysqli->connect_errno) {
   					 printf("Connect failed: %s\n", $mysqli->connect_error);
    				 exit();
				}

$query = "INSERT INTO Users (user_id, isAdmin) VALUES ('".$username."','".$isAdmin."')";

if ($result = $mysqli->query($query)) {
    if($isAdmin) header('Location: https://people.eecs.ku.edu/~rmanweil/448/Lab5/AdminHome.html');
    else header('Location: https://people.eecs.ku.edu/~rmanweil/448/Lab5/CreatePost.html');
}
else{
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
    echo "<h5>Something went wrong! What would you like to do?</h5>";
    echo "<p><a href=\"CreateUser.html\">Create a new user</a></p>";
    echo "<p><a href=\"448Blog.html\">Go back to the main page</a></p>";
}

$result->free();
$mysql->close();
?>
