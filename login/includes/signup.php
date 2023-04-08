<?php

include_once 'dbh.php';

        $Username = $_POST['Username'];
        $Email = $_POST['Email'];
        $Password =$_POST['Password'];


        $sql = "INSERT INTO login(Username, Email, Password) VALUES ('$Username','$Email','$Password');";
        $result = mysqli_query($con, $sql);

        header("Location: ../index.php?signup=success");

?>