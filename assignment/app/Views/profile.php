<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Profile</title>
</head>
<body>
<div class='container'>
<h1>Name: 
    <?php 
        foreach($profile as $row) {
            extract($row);
            echo $first_name . " " . $last_name;
        }
    ?>
</h1>
<h1>Email: 
<?php 
        foreach($profile as $row) {
            extract($row);
            echo $email;
        }
    ?>
</h1>

<div class="form-group">
    <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Reset password</button>
    <form action="<?php echo base_url(); ?>edit_profile">
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Edit details</button>
    </form>
    </div>

<h1>Your questions</h1>
<div class="form-group">
<?php 
    foreach($user_posts as $row) {
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
    <form action="<?php echo base_url(); ?>hub">
        <button type="submit" class="btn btn-primary btn-block">See more></button>
    </form>
</div>
</div>
<body>
</html>