<?php
session_start();
require_once 'connection.php';
if(empty($_SESSION)){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<title>Blogger</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

    <!-- The Grid -->
    <div class="w3-row-padding">

        <!-- Left Column -->
        <div class="w3-third">

            <div class="w3-white w3-text-grey w3-card-4">
                <div class="w3-display-container">
                    <img src="<?= $_SESSION['filename']?>" style="width:100%" alt="Avatar">

                </div>
                <div class="w3-display w3-container w3-text-black">
                    <h2><?=$_SESSION['username'] ?></h2>
                </div>
                <div class="w3-container">
                    <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Bio</b></p>
                    <p><?=$_SESSION['bio'] ?></p>
                    <br>
                </div><hr>

                <div class="w3-container">
                      <a href="logout.php">  <button class="w3-button w3-block w3-green w3-section w3-padding">Logout</button> </a>
                    <br>
                </div>
                <br><hr>

            </div><br>

            <!-- End Left Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-twothird">



            <div class="w3-container w3-card w3-white">
                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Posts</h2>
                <div class="w3-container">
                    <button onclick="document.getElementById('id21').style.display='block'" class="w3-button w3-block w3-green w3-section w3-padding">Add Post</button>
                    <br>
                </div>


                <!--Post Pop -->
                <div id="id21" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                        <form class="w3-container" method="post" action="blog.php">
                            <div class="w3-section">
                                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Title" name="title" required>
                                <input type="hidden" name="author" value="<?=$_SESSION['username'] ?>">
                                <input type="hidden" name="time" value="<?=date("l jS \of F Y h:i A"); ?>">
                                <label>Post</label>
                                <textarea class="w3-input w3-border w3-margin-bottom" name="post" required rows="4" cols="50">
                             </textarea>
                                <button class="w3-button w3-block w3-green w3-section w3-padding" name="submit" type="submit">Add Post</button>
                            </div>
                        </form>
                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                            <button onclick="document.getElementById('id21').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                        </div>

                    </div>
                </div>

                <?php
                $auth=$_SESSION['username'];
                $sql = "SELECT * FROM blog WHERE author='$auth'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       ?>
                        <hr>
                        <div class="w3-container">
                            <p style="text-align: right;"><?=$row['time'] ?></p>
                            <h5 class="w3-opacity"><b><?= $row["title"]?></b></h5>
                            <p><?=$row['blog'] ?></p>

                            </div>

            <?php        }
                } else {
                    echo "0 Posts";
                }
                ?>



            </div>

            <!-- End Right Column -->
        </div>

        <!-- End Grid -->
    </div>

    <!-- End Page Container -->
</div>


</body>
</html>

