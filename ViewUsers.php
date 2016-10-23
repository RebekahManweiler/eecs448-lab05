<?php
        
$mysqli = new mysqli("mysql.eecs.ku.edu", "rmanweiler", "hello", "rmanweiler");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
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
    echo "<h5>Users</h5><br/>";

    $query = "SELECT user_id, isAdmin FROM Users";

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
        
            $isAdmin = "Regular User";
            if($row["isAdmin"] == true) $isAdmin = "Admin";
            
            echo $row["user_id"]." (".$isAdmin.")";
            echo "<br/>";
        }

        $result->free();
    }

    echo "<p><a href=\"AdminHome.html\">Back to Admin Home</a></p>";
    
}

$mysqli->close();
?>
