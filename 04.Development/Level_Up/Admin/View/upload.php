<?php
$file = $_FILES['fileupload']['name'];
$location = $_FILES['fileupload']['select_file'];
$extension = pathinfo($file)['extension'];
$filename = pathinfo($file)['filename'];
if (move_uploaded_file($location, "upload/" . $file . "." . $extension)) {
	echo 'File is successfully uploaded.';
} else {
	echo 'There was some error moving the file to upload directory.';
}
