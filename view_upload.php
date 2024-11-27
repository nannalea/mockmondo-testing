<?php
$_title = 'Upload profile picture';
$_page = 'Upload profile picture';
require_once __DIR__ . '/comp_header.php'
?>

<main id="main-upload">
    <div id="profile-card">
        <div id="profile-picture">
            <?php
            $files = glob("uploaded-images/*.*");
            // Get latest file upload
            foreach($files as $file)
            {
                if (is_file($file) && filectime($file) > $latest_ctime) {
                        $latest_ctime = filectime($file);
                        $latest_filename = $file;
                }
            }
            if (isset($latest_filename)) {
                echo '<img src="' . $latest_filename . '" alt="profile picture" />';
            }
            // Show default profile picture if no picture is uploaded
            else {
                echo '<img src="img-unknown-user.svg" alt="profile picture" />';
            }
            ?>
        </div>

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <p> Change profile picture:</p>

            <input class="edit-picture" type="file" name="fileToUpload" id="fileToUpload">
            <input id="submit-picture" type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</main>
<?php
require_once __DIR__ . '/comp_footer.php'
?>