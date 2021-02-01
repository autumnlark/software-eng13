<?php /*
 Exposure Homepage

 Author: James Lee
 Version: 1.0
 */ ?>

<?php /* Components variable declarations */

$html_page_title = 'Welcome | Exposure';
$css_global = 'css/site.css';

?>

<!DOCTYPE html>
<html lang="en">
<?php include('html/components/head.php'); ?>
<body>
<header class="container-fluid">
    <?php include('html/components/navigation.php'); ?>
</header>
<div class="jumbotron-fluid jumbotron">
    <div class="container">
        <div id="exposure-title" class="text-center mb-5">
            <h1>EXPOSURE</h1>
        </div>
        <div class="bg-black p-4">
            <h3>
                What is Exposure?
            </h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis euismod egestas. Curabitur auctor
                purus sapien, ut viverra enim venenatis sed. Vivamus vel velit nec leo semper semper. In interdum, augue
                ut dapibus pellentesque, urna augue sodales enim, in ultricies odio libero eget risus. Curabitur
                consequat mauris lectus.
            </p>
        </div>
    </div>
</div>
<div id="showcase" class="container">
    <div class="row">
        <div id="top-posts" class="col-4 py-2">
            <div>
                <h2>
                    Top Posts
                </h2>

                <div class="showcase-item">
                    <div class="user-info-div">
                        <img class="user-icon" src="assets/default-avatar-blue.png">
                        <h4 class="user-display">James</h4>
                    </div>
                    <div class="post-info-div">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis euismod egestas. Curabitur auctor
                            purus sapien, ut viverra enim venenatis sed. Vivamus vel velit nec leo semper semper. In interdum, augue
                            ut dapibus pellentesque, urna augue sodales enim, in ultricies odio libero eget risus. Curabitur
                            consequat mauris lectus.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div id="top-users" class="col-4 py-2">
            <div>
                <h2>
                    Top Users
                </h2>

                <div class="showcase-item">
                    <div class="user-info-div">
                        <img class="user-icon" src="assets/default-avatar-blue.png">
                        <h4 class="user-display">James</h4>
                    </div>
                </div>
                <div class="showcase-item">
                    <div class="user-info-div">
                        <img class="user-icon" src="assets/default-avatar-orange.png">
                        <h4 class="user-display">Andrew</h4>
                    </div>
                </div>
                <div class="showcase-item">
                    <div class="user-info-div">
                        <img class="user-icon" src="assets/default-avatar-yellow.png">
                        <h4 class="user-display">Aimee</h4>
                    </div>
                </div>
                <div class="showcase-item">
                    <div class="user-info-div">
                        <img class="user-icon" src="assets/default-avatar-purple.png">
                        <h4 class="user-display">Hannah</h4>
                    </div>
                </div>
                <div class="showcase-item">
                    <div class="user-info-div">
                        <img class="user-icon" src="assets/default-avatar-green.png">
                        <h4 class="user-display">Autumn</h4>
                    </div>
                </div>
            </div>
        </div>

        <div id="top-challenges" class="col-4 py-2">
            <div>
                <h2>
                    Top Competitions
                </h2>

                <div class="showcase-item">
                    <div class="user-info-div">
                        <img class="user-icon" src="assets/default-avatar-blue.png">
                        <h4 class="user-display">James</h4>
                    </div>
                    <div class="post-info-div">
                        <h4>Cat competition</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut venenatis euismod egestas. Curabitur auctor
                            purus sapien, ut viverra enim venenatis sed. Vivamus vel velit nec leo semper semper. In interdum, augue
                            ut dapibus pellentesque, urna augue sodales enim, in ultricies odio libero eget risus. Curabitur
                            consequat mauris lectus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                This is a footer
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
