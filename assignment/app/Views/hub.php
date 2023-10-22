<div class="container">
    <script src="jquery-3.6.0.js" type="text/javascript"></script>
    <script type="text/javascript">
       
    </script>
<?php echo form_open(base_url().'hub/show_filtered');?>
    <div class="form-group">
        <h1>Title</h1>
        <input type="text" class="form-control" placeholder="Click here to enter title" name="title">
        
    </div>
    <div class="form-group">
        <h1>Tags</h1>
        <select name="tag">
        <option value="">All</option>
        <option value="General">General</option>
        <option value="Assignment 1">Assignment 1</option>
        <option value="Assignment 2">Assignment 2</option>
        <option value="Final Exam">Final Exam</option>
        </select>
    </div>
    <div class="auto-complete">
        <h1>Author</h1>
        <input type="text" id="text-search" class="form-control" placeholder="Click here to enter author name" name="author">
        <?php
        foreach($posts as $row) {
            extract($row); 
            echo $title;
            echo "<br>";
        }
        ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Search</button>
    </div>
</form>
<a href="<?php echo base_url().'hub'?>">Reset Search</a>
<br>
<?php
if (empty($posts)) {
    echo "<br>" . "<h1>" . "No results found" . "</h1>";
} else {
    foreach($posts as $row) {
        extract($row);
        echo "<br>";
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
        echo "<p>Date posted: " . $date . "</p>";
    }
}
?>
</div>