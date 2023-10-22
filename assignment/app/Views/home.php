<div class="container">
<h1>Most popular posts</h1>
<br>
<?php
foreach($popular as $row) {
    extract($row);
    echo "<h2>" . $title . "</h2>";
    echo "<h3>" . $tag . "</h3>";
    echo "<p>Author: " . $first_name . " " . $last_name . "<?>";
    echo "<p>" . $content . "</p>";
    echo "<p>Views: " . $views . "</p>";
    echo "<p>Likes: " . $likes . "</p>";
    echo "<p>" . $date . "</p>" . "<br>";
}
?>
<form action="<?php echo base_url(); ?>hub">
<button type="submit" class="btn btn-primary btn-block">See more>></button>
</form>
<br>
</div>

<div class="container">
<h1>Most recent posts</h1>
<br>
<?php
foreach($recent as $row) {
    extract($row);
    echo "<h2>" . $title . "</h2>";
    echo "<h3>Tag: " . $tag . "</h3>";
    echo "<p>Author: " . $first_name . " " . $last_name . "<?>";
    echo "<p>" . $content . "</p>";
    // if (empty($filename)) {
    //     echo "<p>No files attached</p>";
    // } else {
    //     echo "<p>Files attached: " . $filename . "</p>";

    // }
    //echo "<p>Files attached: " . $filename . "</p>";
    echo "<p>Views: " . $views . "</p>";
    echo "<p>Likes: " . $likes . "</p>";
    echo "<p>Date posted: " . $date . "</p>" . "<br>";
}
?>
<form action="<?php echo base_url(); ?>hub">
<button type="submit" class="btn btn-primary btn-block">See more>></button>
</form>
</div>