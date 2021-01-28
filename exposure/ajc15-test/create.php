<?php
$userid = $_POST['userid'];
$directory = "Images/";
$image_file = basename($_FILES['image']['name']);
$image_filetype = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));
$new_image_path = $directory . md5(time() . $image_file) . '.' . $image_filetype;
$caption = $_POST['caption'];
$hashtags_whole = $_POST['hashtags'];
$hashtag_array = explode(',', $hashtags_whole);
$location = $_POST['location'];
$post_type = $_POST['posttype'];
$privacy = $_POST['privacy'];
$upload_date = date("Y-m-d H:i:s");
$success = 1;

/*Execute the code to connect to the database*/
require("dbconnect.php");

error_reporting(E_ALL);
ini_set('display_errors',1);
echo exec('whoami');

define ('SITE_ROOT', realpath(dirname(__FILE__)));

//Ensure image uploaded is an image (and not other filetype)
if(isset($_POST['submit']) && $_POST['submit'] == 'submit' && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
  $type_check = getimagesize($_FILES['image']['tmp_name']);
  if($type_check !== false) {
    echo "File is an image - " . $type_check['mime'] . ".";
    $success = 1;
  } else {
    echo "File is not an image.";
    $success = 0;
  }
}

//Check if uploaded filename is already taken
if (file_exists($image_file)) {
  echo "Sorry, file already exists.";
  $success = 0;
}

////Limit file size to reduce strain on server storage space
//if ($_FILES["image"]["size"] > 500000) {
//  echo "Sorry, your file is too large.";
//  $success = 0;
//}

//Only allow specific file types
if($image_filetype != "jpg" && $image_filetype != "png" && $image_filetype != "jpeg") {
  echo "This is not a valid file type, only JPG, JPEG and PNG files can be uploaded.";
  $success = 0;
}

//Check if $success is set to 0, meaning an error uploading has occurred
if ($success == 0) {
  echo "File has failed to upload";
//if no errors have occurred, try to upload file
} else {
  if (move_uploaded_file($_FILES['image']['tmp_name'], SITE_ROOT . "/" . $new_image_path)) {
    echo "The file ". htmlspecialchars(basename($_FILES['image']['name'])). " has been uploaded successfully, new file name: " . $new_image_path;
      
    /*Create a query to be used*/
    $insert_post = "INSERT INTO Posts (user_id, image, caption, view_count, location, post_type, privacy, num_likes, upload_date) 
                    VALUES ('" . $userid . "', '" . $new_image_path . "', '" . $caption . "', 0, '" . $location . "', '" . $post_type . "', '" . $privacy . "', 0, '" . $upload_date . "')";

    //$query_string = "INSERT INTO Hashtags (post_id, hashtag) VALUES (3, 'hashtag_test')";

    if($mysqli->query($insert_post)){
        echo "<br>Record successfully inserted";
    } else {
        echo "<br>Failed to insert record";
    }

    $find_post_id = "SELECT post_id FROM Posts WHERE upload_date = '" . $upload_date . "'";

    if($found_post_id = $mysqli->query($find_post_id)){
        if ($found_post_id->num_rows > 0){
            $new_post_id = $found_post_id->fetch_object();
            echo "<br>Post ID Found " . $new_post_id->post_id . " using date: " . $upload_date;
        }
    } else {
        echo "<br>Could not find post id";
    }

    foreach($hashtag_array as $hashtag){
        $hashtag_post = $new_post_id->post_id;
        $insert_hashtags = "INSERT INTO Hashtags (post_id, hashtag) VALUES (". $hashtag_post . ", '" . $hashtag . "')";
        if($mysqli->query($insert_hashtags)){
            echo "<br>Hashtags successfully inserted";
        } else {
            echo "<br>Failed to insert Hashtags";
        }
    }
  } else {
    echo "An unknown error has occurred and file has failed to upload, new file name: " . $new_image_path;
  }
}

echo "<br> User ID: " . $userid . "<br> Directory: " . $directory . "<br> Image File: " . $image_file . "<br> Image Filetype: " . $image_filetype . "<br> Caption: " . $caption . "<br> Location: " . $location . "<br> Post Type: " . $post_type . "<br> Privacy: " . $privacy . "<br> Success: " . $success . "<br> Date: " . $upload_date . "<br> _FILES val: " . $_FILES['image']['tmp_name'];

echo "<br> Hashtags: <br>";

foreach($hashtag_array as $hashtag_display){
    echo $hashtag_display . "<br>";  
}

//Place inside file upload success if statement once it is working


?>