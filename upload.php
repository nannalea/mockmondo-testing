<?php

$target_dir = 'uploaded-images/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']); //uploaded-images/circle.pdf
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // pdf
$random_image_name = bin2hex(random_bytes(5)); // gives random number
$random_image_name = $random_image_name . '.' . $imageFileType;

$tmp_name = $_FILES['fileToUpload']['tmp_name']; // circle.pdfC:\xampp\tmp\php1859.tmp
move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "uploaded-images/$random_image_name");

header('Location: upload');
exit();
