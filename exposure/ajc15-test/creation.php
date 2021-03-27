<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Dashboard%20Template/dashboard.css">
</head>
<body>
<?php include "NavBar.html" ?>
     <h1 class="heading">Create Your Brand New Post</h1>
    <div class="btn-container">
        <div class="container">
            <div class="tab-row row">
                <div class="col-6">
                    <button id="show-tab-1" class="tab-button active">Create Post</button>
                </div>
                <div class="col-6">
                    <button id="show-tab-2" class="tab-button">Create Challenge</button>
                </div>
            </div>
        </div>
    </div>
    <!--Set up a form to POST variables to searchdb.php-->
    <div class="tabs-container">
        <div id="tabs">
            <div class="container">
                <div class="row">
                    <div id="tab-1" class="col-12 tab">
                        <div class="row">
                            <div class="col-6">
                                <form action="create.php" method="post" enctype="multipart/form-data">

                                    <label for="userid">User ID:</label><br>
                                    <input type="text" id="userid" name="userid" autocomplete="off"><br><br>

                                    <label for="image">Image:</label><br>
                                    <input type="file" id="image" name="image"><br><br>

                                    <label for="caption">Caption:</label><br>
                                    <textarea id="caption" name="caption" rows="5" cols="40"></textarea><br><br>

                                    <label for="hashtags">Hashtags (Use Comma Separated List):</label><br>
                                    <textarea id="hashtags" name="hashtags" rows="5" cols="40"></textarea><br><br>

                                    <label for="location">Location:</label><br>
                                    <input type="text" id="location" name="location" autocomplete="off"><br><br>

                                    <label for="post_type">Post Type:</label><br>
                                    <label for="post_type">Post</label>
                                    <input id="post_type" type="radio" id="post" name="posttype" value="Post"><br>

                                    <label for="post_type">Challenge</label>
                                    <input type="radio" id="challenge" name="posttype" value="Challenge"><br><br>

                                    <label for="privacy">Privacy:</label><br>
                                    <label for="public">Public</label>
                                    <input type="radio" id="public" name="privacy" value="Public"><br>

                                    <label for="private">Private</label>
                                    <input type="radio" id="private" name="privacy" value="Private"><br>

                                    <label for="hidden">Hidden</label>
                                    <input type="radio" id="hidden" name="privacy" value="Hidden"><br>

                                    <input class="submit" type="submit" value="submit">

                                </form>

                            </div>
                            <div class="col-6">
                                <h2>Post Preview</h2>

                                <div class="post-preview">
                                    <img src="#" id="preview-img" alt="Your uploaded image.">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    
    <br>
    <a href="posts.php">
        <button type="button">View all Posts</button>
    </a>
    
    <br>
    <a href="dashboard.php">
        <button type="button">Dashboard</button>
    </a>
    
    <br>
    <a href="index.html">
        <button type="button">Home</button>
    </a>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script src="Dashboard%20Template/dashboard.js"></script>
</body>
</html>