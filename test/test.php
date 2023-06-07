<?php
$servername = "localhost";
$username = "digidcor_rusr";
$password = "}[)mxW_^u[R2";
$dbname = "digidcor_rick_app";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
    
    echo "connected";
}

mysqli_close($conn);
?>