<?php
                session_start();
                include_once '../PRJ_Library/connect_DB.php';
                    $acc = $_SESSION["username"];
                    $con_feed = $_POST["txtcontent"];                    
                    $title = $_POST["txttitle"];
                    $theme = $_POST["txttheme"];
                    $email = $_POST["txtmail"];
                    $fullname = $_POST["txtname"];
                    $date_feed = $_POST["txtdate"];
                    $query = "INSERT INTO feed_back(acc,con_feed, title, theme, email, fullname, date_feed) values ('$acc','$con_feed','$title','$theme','$email','$fullname','$date_feed')";
                $result = mysqli_query($link, $query);
                if ($result) {
                    echo 1;
                   exit();
                }
                echo 0;
                exit();

                
              
              ?>