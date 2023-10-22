<h1 class="text-center">Writing new question</h1>
<div class="container">
<?php echo form_open(base_url().'post/post_question'); ?>
    <div class="form-group">
        <h1>Title</h1>
        <input type="text" class="form-control" placeholder="Click here to enter title" required="required" name="title">
        <br>
    </div>
    <div class="form-group">
        <h1>Tags</h1>
        <select name="tag">
        <option value="General">General</option>
        <option value="Assignment 1">Assignment 1</option>
        <option value="Assignment 2">Assignment 2</option>
        <option value="Final Exam">Final Exam</option>
        </select>
        <br><br>
    </div>
    <div class="form-group">
        <h1>Write question</h1>
        <input type="text" class="form-control" required="required" name="content">
        <br>
    </div>
    <div class="form-group">
        <input type="file" name="userfile" multiple="multiple" size="20">
        <br><br>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Post</button>
    </div>
</form>
</div>