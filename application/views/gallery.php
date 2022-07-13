<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="gallery">
            <!--
          for displaying the images in thumbnails
            -->


        </div>
        <div id="upload">
            <!--
          upload form-->
            <?php
            echo form_open_multipart("gallery/do_upload");
            echo '<input type="file" name="userfile" size="20" />';
            echo form_submit("upload", "Upload");
            echo form_close();
            ?>  
            <?php if(isset($error)) print $error;?>
            <?php if(isset($upload_data)):?>
            <ul>
                <?php foreach ($upload_data as $item => $value): ?>
                    <li><?php echo $item; ?>: <?php echo $value; ?></li>
                <?php endforeach; ?>
            </ul>
            <img src="<?php print base_url("images/".$upload_data["file_name"])?>" width="100px">
        <?php endif;?>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
