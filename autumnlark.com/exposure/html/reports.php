<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="studenaddmodle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="reports.php" method="post">
                <div class="modal-body">
                        <div class="form-group">
                            <label>post</label>
                            <input type="text" class="form-control" name="post">
                        </div>

                        <div class="form-group">
                            <label >user</label>
                            <input type="text" class="form-control" name="user" >
                        </div>

                        <div class="form-group">
                        <label >Inappropriate conduct</label>
                            <textarea class="form-control" rows="3" name="report"></textarea>
                        </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="send" class="btn btn-primary" >Send</button>
                        </div>
            </form>
        </div>
    </div>
</div>


        <div class="container">
            <div class="jumbostron">

                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studenaddmodle">
                                Add Data
                            </button>
                        </div>
                    </div>
                </div>

        </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>


<?php
require("connect_db.php");

if(isset($_POST["send"])) {
    $post = $_POST["post"];
    $user = $_POST["user"];
    $report = $_POST["report"];

    if ($report == "") {
        echo '<script>alert("Please write a report");</script>';
        exit;
    }
    else {
        $sql_insert = "insert into reports(post_id,user_id,content) values('$post','$user','$report')";
        $ret = mysqli_query($link, $sql_insert);
        $row = mysqli_fetch_array($ret);
        echo '<script>alert("Send");</script>';
        echo '<script>window.location="reports.php"</script>';
    }
}


?>
