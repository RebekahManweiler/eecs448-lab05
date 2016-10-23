<?php

//get values
$username = $_POST["username"];
$posttext = $_POST["posttext"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "rmanweiler", "hello", "rmanweiler");

				/* check connection */
				if ($mysqli->connect_errno) {
   					 printf("Connect failed: %s\n", $mysqli->connect_error);
    				 exit();
				}

$query = "INSERT INTO Posts (content, author_id) VALUES ('".$posttext."','".$username."')";

if ($result = $mysqli->query($query)) {
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
    echo "<h5>Post Successful!</h5>";
    echo "<p><a href=\"CreatePost.html\">Create another post</a></p>";
    echo "<p><a href=\"448Blog.html\">Go back to the main page</a></p>";
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
    echo "<p><a href=\"CreatePost.html\">Create a new post</a></p>";
    echo "<p><a href=\"448Blog.html\">Go back to the main page</a></p>";
}

$result->free();
$mysql->close();
?>
