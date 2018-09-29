<?php
/**
 * Created by PhpStorm.
 * User: Moises Cardona
 * Date: 9/28/2018
 * Time: 8:03 PM
 */
session_start();
?>
<form action="encode_to_opus.php" method="post" enctype="multipart/form-data">
    <p>
        <input name="MAX_FILE_SIZE" value="268435456" type="hidden"/>
        Browse for a .FLAC or .WAV file to encode to Opus:<br/>
        <input name="musicfile" type="file"/><br/><br/>
        Choose a Bitrate:<br/>
        <select title="Choose a Bitrate:" name='bitrate'>
            <option value='32'>32</option>
            <option value='64' selected="selected">64</option>
            <option value='96'>96</option>
            <option value='128'>128</option>
            <option value='256'>256</option>
            <option value='320'>320</option>
        </select> kbit/s<br/><br/>
        <input name="encode" type="submit" value="Encode"/>
    </p>
</form>
<?php
if (isset($_SESSION['upload_success'])){
    if ($_SESSION['upload_success'] == true){
        echo "<p>Encoding was successful! <a href='download.php'>Click here to download your music file.</a>. Once the download has started, this link will become invalid.</p>";
    }
    else{
        echo $_SESSION['error'];
    }
}