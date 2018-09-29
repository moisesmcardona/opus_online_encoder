# Opus Online Encoder
This is a PHP script that features file upload and then executes the opusenc encoder to encode the uploaded file to the specified bitrate.

It uses the opusenc command line tool to perform the encoding. Once the encoding is finished, it will present a one-time only download URL.

* upload.php: This is the upload form,
* encode_to_opus.php: Validates that the file is a FLAC or WAV file and then runs opusenc to perform the encoding. It returns the opus-encoded path and `upload_success` set to `true` if the encoding was successful. Then redirects to upload.php again.
* download.php: if `upload_success` was true, `upload.php` will give you the link to this file. This simply retrieves the `path` session variable which points to the opus file. It will initiate the download and destroy the session, making the URL invalid for further downloads.

# Installation
* You need PHP. This script was tested using PHP 7.
* Change the following variables in `encode_to_opus.php`:
    * `$music_location_path`: The location to store the uploaded file and encoded opus file.
    * `$opus_location_path`: The location to the opusenc command line tool.

This script was made to use my own compiles of opusenc, in which it is not needed to specify the output path in the command-line tool. You'll need to specify the output path in the `exec` line. You can also change the command line arguments to fit your needs.

