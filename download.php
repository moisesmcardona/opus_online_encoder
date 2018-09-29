<?php
session_start();
if (isset($_SESSION['path'])){
    $file = $_SESSION['path'];
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        session_destroy();
        readfile($file);
        exit;
    }
}
else{
    echo "Download Link Expired";
}
exit;