<?php
session_start();
if ($_FILES['musicfile']['name'] != "") {
    $music_location_path = "path_to_store_music_files";
    $opus_location_path = "path_to_opusenc";
    $file_parts = pathinfo($_FILES['musicfile']['name']);
    $file_parts['extension'];
    if (in_array($file_parts['extension'], Array('flac', 'wav'))) {
        $random_token = bin2hex(random_bytes(16));
        $path = $music_location_path . $random_token;
        mkdir($path);
        $input_path = $path . "\\" . $_FILES["musicfile"]["name"];
        if (move_uploaded_file($_FILES["musicfile"]["tmp_name"], $input_path)) {
            echo(exec($opus_location_path . " --music --bitrate " . $_POST['bitrate'] . " \"" . $input_path . "\""));
            $_SESSION['path'] = $path . "\\" . $file_parts['filename'] . ".opus";
            $_SESSION['upload_success'] = true;
        } else
            $_SESSION['upload_success'] = false;
        $_SESSION['error'] = "An internal error occurred while encoding your file.";
    } else {
        $_SESSION['upload_success'] = false;
        $_SESSION['error'] = "The audio file is not a FLAC or WAV file.";
    }
} else {
    $_SESSION['upload_success'] = false;
    $_SESSION['error'] = "No audio file was selected";
}
header("Location: upload.php");
exit;