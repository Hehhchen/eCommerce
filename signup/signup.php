<?php
<<<<<<< HEAD
    $db_connection = pg_connect("host=ec2-54-83-55-125.compute-1.amazonaws.com dbname=d3h17gvrd6hlhs user=kpccbqhujjcixk password=c732048928370d49a64e4be8718393111f3a0508e07ca095eda8e7a3ade16110");
    //echo "<script>alert('username taken');window.location.href='index.html'</script>";


=======
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP; 
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    $db_connection = pg_connect("host=ec2-54-83-55-125.compute-1.amazonaws.com dbname=d3h17gvrd6hlhs user=kpccbqhujjcixk password=c732048928370d49a64e4be8718393111f3a0508e07ca095eda8e7a3ade16110");
    
>>>>>>> cc3359bed43b063b16ebb1ad39084330bf2d0f8e
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $hashpass=password_hash($pass, PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
<<<<<<< HEAD


    if(pg_fetch_array(pg_query($db_connection,"select * from Users where username = '$username'"))){
=======
    $mail=new PHPMailer(true);
    
    if(pg_fetch_array(pg_query($db_connection,"SELECT * FROM Users where username = '$username'"))){
>>>>>>> cc3359bed43b063b16ebb1ad39084330bf2d0f8e
        echo "<script>alert('username taken');window.location.href='index.html'</script>";
    }else if(pg_fetch_array(pg_query($db_connection,"SELECT * FROM Users where email = '$email'"))){
        echo "<script>alert('email taken');window.location.href='index.html'</script>";
    } else{
<<<<<<< HEAD
        $sqlinsert="insert into Users(address, city, email, name, pass, state, username, zip) values('{$address}','{$city}','{$email}','{$fullname}','{$hashpass}','{$state}','{$username}','{$zip}')";

=======
        $sqlinsert="INSERT INTO table Users(Full_Name,Email,Username,Password,Address,City,State,Zip) values('$fullname','$email','$username','$hashpass','$address','$city','$state','$zip')";
        try{
            $mail->IsSMTP();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; // or 587
            $mail->IsHTML(true);
            $mail->Username = "boardhubzz@gmail.com";
            $mail->Password = "boardhub478";
            
            $mail->SetFrom("boardhubzz@gmail.com");
            $mail->Subject = "Account Creation";
            $mail->Body = "Hello Your Account to BoardHub! has been Created!";
            $mail->AddAddress($email);
            $mail->Send();
            #echo "Message has been sent!";
        }
        catch(Exception e){
            echo "Mail Error: " . $mail->ErrorInfo;
        }
>>>>>>> cc3359bed43b063b16ebb1ad39084330bf2d0f8e
        if(!(pg_query($sqlinsert))){
            echo "<script>alert('failed');window.location.href='index.html'</script>";
        }else{
            echo "<script>alert('Success!');window.location.href='../homepage/index.html'</script>";
        }
    }

    pg_connect($db_connection);
?>
