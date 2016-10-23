<?php

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
    echo "<h3>448Blog</h3>";

    $mysqli = new mysqli("mysql.eecs.ku.edu", "rmanweiler", "hello", "rmanweiler");

    if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
    }
    if(!empty($_POST['posts'])){
        echo "<h5>Successful Deletion!</h5>";
	foreach($_POST['posts'] as $delete){
		$query = "DELETE FROM Posts WHERE post_id='".$delete."'";
		if ($result = $mysqli->query($query)) {
			echo "<p>Post number ".$delete." was successfully deleted</p><br/>";
		}
	}
        echo "<br/>";
        echo "<p><a href=\"AdminHome.html\">Back to Admin Home page</a></p>";
    }
    else{
     echo "<p>Nothing was selected to be deleted</p>";
     echo "<br/>";
     echo "<p><a href=\"AdminHome.html\">Back to Admin Home page</a></p>";
    }
    
    $mysqli->close();

?>
