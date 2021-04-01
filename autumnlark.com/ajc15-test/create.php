<!DOCTYPE html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1 class="heading">Create</h1>

    <!--Set up a form to POST variables to searchdb.php-->
    <form action="create.php" method="post" enctype="multipart/form-data">        
        
        <label for="userid">User ID:</label><br>
        <input type="text" id="userid" name="userid" autocomplete="off"><br><br>
        
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br><br>
        
        <label for="caption">Caption:</label><br>
        <textarea name="caption" rows="5" cols="40"></textarea><br><br>
        
        <label for="hashtags">Hashtags (Use Comma Separated List):</label><br>
        <textarea name="hashtags" rows="5" cols="40"></textarea><br><br>
        
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" autocomplete="off"><br><br>
        
        <label for="post_type">Post Type:</label><br>
        <label for="post_type">Post</label>
        <input type="radio" id="post" name="posttype" value="Post"><br>
        
        <label for="post_type">Challenge</label>
        <input type="radio" id="challenge" name="posttype" value="Challenge"><br><br>
        
        <label for="privacy">Privacy:</label><br>
        <label for="privacy">Public</label>
        <input type="radio" id="public" name="privacy" value="Public"><br>
        
        <label for="privacy">Private</label>
        <input type="radio" id="private" name="privacy" value="Private"><br>
        
        <label for="privacy">Hidden</label>
        <input type="radio" id="hidden" name="privacy" value="Hidden"><br>
        
        <input class="submit" type="submit" value="submit">
        
    </form>
    
    <br>
    <a href="dashboard.php">
        <button type="button">Dashboard</button>
    </a>
</body>