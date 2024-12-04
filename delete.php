<?php
include("connection.php");

$name = $_GET['name'];

// First, delete from fime_time where there's a matching id in movies with the specified name
$query1 = "DELETE f FROM fime_time f 
           JOIN movies m ON f.id = m.id 
           WHERE m.name = '$name'";

// Execute the first delete query
$data1 = mysqli_query($conn, $query1);

// Then, delete from the movies table
$query2 = "DELETE FROM movies WHERE name = '$name'";
$data2 = mysqli_query($conn, $query2);

if($data1 && $data2) {
    echo "<script>alert('Record deleted');</script>";
    echo '<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost/web/insert%20data/display.php">';
} else {
    echo "<font color='red'>Failed to delete record</font>";
}
?>
