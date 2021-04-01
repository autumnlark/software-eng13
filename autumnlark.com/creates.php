<?php
ob_start();
require 'connect_db.php';
session_start();
$userid = $_SESSION[ 'user_id' ];//take user id
$directory = "Images/" . $userid;

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
$success =0;
/*Execute the code to connect to the database*/

error_reporting(E_ALL);
ini_set('display_errors',1);


define ('SITE_ROOT', realpath(dirname(__FILE__)));
if(!file_exists($directory)){
    mkdir($directroy, 0777, true);
}
//Ensure image uploaded is an image (and not other filetype)
if(isset($_POST['submit']) && $_POST['submit'] == 'submit' && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    echo 'hi';
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
    $insert_post = "INSERT INTO Posts (user_id, image, caption, location, type, privacy, num_likes, upload_date, points) 
                    VALUES ('" . $userid . "', '" . $new_image_path . "', '" . $caption . "', '" . $location . "', '" . $post_type . "', '" . $privacy . "', 0, '" . $upload_date . "', 0)";

    //$query_string = "INSERT INTO Hashtags (post_id, hashtag) VALUES (3, 'hashtag_test')";

    if($link->query($insert_post)){
        echo "<br>Record successfully inserted";
        include 'login_tools.php';
        $_SESSION['profile_user'] = $_SESSION['user_id'];
        load('profile.php');
    } else {
        echo "<br>Failed to insert record, Only numbers 1 - 4 inclusive are valid user ID's";
    }

    $find_post_id = "SELECT post_id FROM Posts WHERE upload_date = '" . $upload_date . "'";
    
    if($found_post_id = $link->query($find_post_id)){
        if ($found_post_id->num_rows > 0){
            $new_post_id = $found_post_id->fetch_object();
            echo "<br>Post ID Found " . $new_post_id->post_id . " using date: " . $upload_date;
            
            foreach($hashtag_array as $hashtag){
                //$hashtag_post = $new_post_id;
                $insert_hashtags = "INSERT INTO Hashtags (post_id, hashtag) VALUES (". $new_post_id . ", '" . $hashtag . "')";
                if($link->query($insert_hashtags)){
                    echo "<br>Hashtags successfully inserted";
                } else {
                    echo "<br>Failed to insert Hashtags";
                }
            }
        }
    } else {
        echo "<br>Could not find post id";
    }

    
  } else {
    echo "An unknown error has occurred and file has failed to upload, new file name: " . $new_image_path;
  }
}




?>