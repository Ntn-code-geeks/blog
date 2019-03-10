<?php
require_once 'connection.php';
session_start();
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

        <div class="w3-third">
            <div class="w3-white w3-text-grey w3-card-4">
                <div class="w3-container">
                    <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Blogs</b></p>
                     <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Login</button>
                    <span class="w3-tag w3-teal w3-round"></span>  <br>
                    <hr>
                      <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-green w3-large">Resister</button>
                    <br>
                    <br>
                </div>
            </div><br>
            <!-- End Left Column -->
        </div>

        <!--Login Pop -->
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                <form class="w3-container" method="post" action="login.php">
                    <div class="w3-section">
                        <label><b>Username</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email" name="mail" required>
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pass" required>
                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
                    </div>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                </div>

            </div>
        </div>

        <!--Resgister Pop -->
        <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                <form class="w3-container" method="post" action="register.php" enctype="multipart/form-data">
                    <div class="w3-section">
                        <label><b>Name</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="name" required>
                        <label><b>E-mail</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter E-mail" name="mail" required>
                        <label><b>Profile Image</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="file" name="fil" id="fil" required>
                        <label><b>Bio</b></label>
                        <textarea class="w3-input w3-border w3-margin-bottom" placeholder="Enter Bio" name="bio" required rows="4" cols="50">
                        </textarea>
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pass1" required>
                        <input class="w3-input w3-border" type="password" placeholder="Confirm Password" name="pass2" required>
                        <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Register</button>
                    </div>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                    <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                </div>

            </div>
        </div>

        <!-- Right Column -->
        <div class="w3-twothird">
            <div class="w3-container w3-card w3-white w3-margin-bottom">
                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Blogs</h2>
            <?php
            $sql = "SELECT * FROM blog";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <hr>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b><?= $row["title"]?></b></h5>
                            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?=$row['time'] ?></h6>
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

    </div>

    <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">

</footer>

</body>
</html>