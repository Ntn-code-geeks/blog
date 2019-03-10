<?php
require_once 'connection.php';
                    $post=$_POST['post'];
                    $title=$_POST['title'];
                    $author=$_POST['author'];
                    $time=$_POST['time'];
                    if($post=='' || $title==''){
                        echo '<script language="javascript">';
                        echo 'alert("All fields are mandatory")';
                        echo '</script>';
                    }
                    else{
                        $sql = "INSERT INTO blog (title,blog,time,author)  VALUES ('$title','$post','$time','$author')";
                        if ($conn->query($sql) === TRUE) {
                            header("location:profile.php");
                        }else {
                             "Error: " . $sql . "<br>" . $conn->error;
                        }

                    }



                ?>