<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Profile</title>
</head>
<body>
<div class='container'>
<?php echo form_open(base_url().'edit_profile/change_profile'); ?>
<div class="form-group">
    <h1>First Name: <?php 
            foreach($profile as $row) {
                extract($row);
                echo $first_name;
            }
        ?></h1>
</div>
<h1> Last Name:
<?php 
        foreach($profile as $row) {
            extract($row);
            echo $last_name;
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
    <button type="submit" class="btn btn-primary btn-block">Change</button>
</div>
<?php echo form_close(); ?>