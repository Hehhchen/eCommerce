<?php
    $db_connection = pg_connect("host=localhost dbname=postgresql-clean-91968 user=rp2zd@virginia.edu password=R@gnar0k98");


    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $hashpass=password_hash($pass, PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];


    if(pg_fetch_array(pg_query($db_connection,"select * from Users where username = '$username'"))){
        echo "<script>alert('username taken');window.location.href='index.html'</script>";
    } else{
        $sqlinsert="insert into Users(Full_Name,Email,Username,Password,Address,City,State,Zip) values('{$fullname}','{$email}','{$username}','{$hashpass}','{$address}','{$city}','{$state}','{$zip}')";

        if(!(pg_query($sqlinsert))){
            echo "<script>alert('failed');window.location.href='index.html'</script>";
        }else{
            echo "<script>alert('Success!'')</script>";
        }
    }

    pg_connect($db_connection);
?>
