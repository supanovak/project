<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Profile</title>
</head>
<body>
<div class='container'>
    <h1>Favourites</h1>
<?php 
foreach($user_favourites as $row) {
    extract($row);
    echo "<h2>" . $title . "</h2>";
    echo "<h3>Tag: " . $tag . "</h3>";
    echo "<p>Author: " . $first_name . " " . $last_name . "<?>";
    echo "<p>" . $content . "</p>";
    if (empty($filename)) {
        echo "<p>No files attached</p>";
    } else {
        echo "<p>Files attached: " . $filename . "</p>";
    } 
    echo "<p>Views: " . $views . "</p>";
    echo "<p>Likes: " . $likes . "</p>";
    echo "<p>Date posted: " . $date . "</p>" . "<br>";
}
?>
</div>