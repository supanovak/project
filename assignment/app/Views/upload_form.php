<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Form</title>

    <style type="text/css">
    #drop-file-zone {
        background-color: #EEE;
        border: #999 5px dashed;
        width: 290px;
        height: 200px;
        padding: 8px;
        font-size: 18px;
    }
    </style>

</head>

<body>

<!-- <?= form_open_multipart(base_url() . 'upload/upload_file') ?>
<div id="drop-file-zone" ondrop="upload_file(event)" ondragover="return false">
    <div>
        <p>Drop file here</p>
        <p>or</p>
        <input type="file" name="userfile" multiple="multiple" size="20">
        <input type="submit" value="Upload">
    </div>
</div> -->

</form>
<div>
    <h1>Single Upload</h1>
<?= form_open_multipart(base_url() . 'upload/upload_file') ?>
    <input type="file" name="userfile" multiple="multiple" size="20">
    <br><br>
    <input type="submit" value="Upload">
</form>
<br>
</div>

<!-- <div>
    <h1>Multi-upload</h1>
<?= form_open_multipart(base_url() . 'upload/upload_multiple') ?>
    <input type="file" name="userfile[]" multiple="multiple" size="20">
    <br><br>
    <input type="submit" value="Upload">
</form>
</div> -->

</body>
</html>


