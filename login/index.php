<?php

    include_once 'includes/dbh.php';
    
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://kit.fontawesome.com/5de828bce5.js"
     crossorigin="anonymous"></script>
    <title>Sign In & Sign Up Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <?php
                
                    if(isset($_POST['LOGIN'])){
                        $Username = $_POST['Username'];
                        $Password =$_POST['Password'];

                        include_once 'includes/dbh.php';
                        $sql = "SELECT * FROM loginsystem WHERE Eamil= '$Email'";
                        $result = mysqli_query($con, $sql);
                        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        if($user){
                            if(password_verify($Password, $user['Password'])){
                                header("Location: ../includes/open.php");
                                echo "<script>
                                alert('Login Successfilly.');
                                </script>";
                            }
                        }
                        else{
                            echo "<script>
                            alert('Invalid User');
                            </script>";
                        }
                    }
                
                ?>
                <form action="" class="sign-in-form">
                    <h2 class="title">Sign In</h2>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>                        
                        <input type="text" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>                        
                        <input type="password" placeholder="Password">
                    </div>
                    <input type="submit" name="LOGIN" value="Login" class="btn solid">

                    <p class="social-text">Or Sign in with social Media</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-facebook-f"></i>                        
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-twitter"></i>                        
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-linkedin-in"></i>                       
                        </a>
                    </div>
                </form>


            <?php
        
            if(isset($_POST['REGISTER'])){

                $Username = $_POST['Username'];
                $Email = $_POST['Email'];
                $Password =$_POST['Password'];
            
                $errors = array();
            
                if(empty($Username) || empty($Email) || empty($Password)){
                    array_push($errors,"Some fields are required");
                }
                if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
                    array_push($errors,"Email is not valid");
                }
                if(strlen($Password)<8){
                    array_push($errors,"Password must be at least 8 characters long");
                }

                // include_once 'includes/dbh.php';
                // $sql = "SELECT * FROM loginsystem WHERE EMAIL ='$Email'";
                // $result = mysqli_query($con, $sql);
                // $rowcount = mysqli_num_rows($result);
                
                // if($rowcount > 0){
                //     array_push($errors,"Email already exist!");
                // }

                if(count($errors)>0){
                    foreach($errors as $error){
                        echo "<script>
                            alert('$error');
                            </script>";
                    }
                }
                else{

                    include_once 'includes/dbh.php';

                    $Username = $_POST['Username'];
                    $Email = $_POST['Email'];
                    $Password =$_POST['Password'];


                    $sql = "INSERT INTO login(Username, Email, Password) VALUES ('$Username','$Email','$Password');";
                    $result = mysqli_query($con, $sql);

                    echo "<script>
                            alert('Registered Successfully.');
                            </script>";

                    // header("Location: ../index.php?signup=success");
                                
                            }
                        }

            ?>

                <form method="Post" class="sign-up-form">
                    <h2 class="title">Sign Up</h2>
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>                        
                        <input type="text" name="Username" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="Email" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>                        
                        <input type="password" name="Password" placeholder="Password">
                    </div>
                    <input type="submit" name="REGISTER" value="Register" class="btn solid">

                    <p class="social-text">Or Sign Up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-facebook-f"></i>                        
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-twitter"></i>                        
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-linkedin-in"></i>                       
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                <p>If you haven't complete your Registration then Sign Up Now
                </p>
                <button class="btn trasparent" id="sign-up-btn">
                    Sign up
                </button>
                </div>
                <img src="images/rocket.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                <p> Already Register your Information ! </p>
                <p>Then Sign In for Login</p>
                <button class="btn trasparent" id="sign-in-btn">
                    Sign in
                </button>
                </div>
                <img src="images/laptop.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>
