<?php
require_once 'connection.php';
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        </head>
        <body>
 <?php
$data=$_POST;
$name= isset($data['name']) ? $data['name'] : null;
$email= isset($data['mail']) ? $data['mail'] : null;
$bio= isset($data['bio']) ? $data['bio'] : null;
$pass1= isset($data['pass1']) ? $data['pass1'] : null;
$pass2= isset($data['pass2']) ? $data['pass2'] : null;
if($pass1 != $pass2){ ?>

    <div class="container">
        <p></p>
        <div class="alert alert-danger">
            <strong>Failed!</strong> Password Not matched.
        </div>
        <a href="index.php"> <button type="button" class="btn btn-primary btn-lg btn-block">Home</button> </a>
    </div>
   <?php
}else{
    $password=$pass1;
    $filename=$_FILES['fil']['name'];
    if($name!='' || $email!='' || $bio!='' || $pass1!='' || $pass2!='' || $filename!='' ){
        if (move_uploaded_file($_FILES['fil']['tmp_name'], 'profileImages/'.$filename)) {
            $filepath='profileImages/'.$filename;

            $sql = "INSERT INTO user (username,email,password,bio,filename)  VALUES ('$name','$email','$pass1','$bio','$filepath')";
            if ($conn->query($sql) === TRUE) { ?>

                <div class="container">
                    <p></p>
                    <div class="alert alert-success">
                        <strong>Success!</strong> Your Profile has been created Successfully.
                    </div>
                    <a href="index.php"> <button type="button" class="btn btn-primary btn-lg btn-block">Login</button> </a>
                </div>


            <?php   } else { ?>

                <div class="container">
                    <p></p>
                    <div class="alert alert-danger">
                        <strong>Failed!</strong> Database Error. <?= "Error: " . $sql . "<br>" . $conn->error; ?>
                    </div>
                    <a href="index.php"> <button type="button" class="btn btn-primary btn-lg btn-block">Home</button> </a>
                </div>

<?php     }

        }

    }
    else
    {
        echo '<script language="javascript">';
        echo 'alert("All fields are mandatory")';
        echo '</script>';
    }
}

?>
</body>
</html>