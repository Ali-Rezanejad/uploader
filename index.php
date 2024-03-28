<?php session_start();?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader</title>
        <link rel="stylesheet" href="assets/css/style.css">

    
</head>
<body>

     <div class="container">
        <?php
            if ( isset($_SESSION['msg']) && $_SESSION['msg'] ):?>
                <p class="msg"><?php echo $_SESSION['msg'] ?> </p>
                <?php unset($_SESSION['msg']);?>
        <?php endif ?>
    <form method="POST" action="upload.php" enctype ="multipart/form-data">
    <div class="upload-wrapper">
      <span class="file-name">Choose a file...</span>
      <label for="file-upload">Browse
        <input type="file" id="file-upload" name="uploadedFile" ></label>
    </div>
    <input type="submit" name="uploadBtn" value="Upload" />
  </form>
  </div>
</body>
</html>