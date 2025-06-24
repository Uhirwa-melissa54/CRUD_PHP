<?php
include 'connection.php';
 if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $firstname=  $_POST['fname'];
    $lastname=  $_POST['lname'];
    $email=  $_POST['email'];
    $password=  $_POST['pass'];
    $password=md5($password);
    $gender=  $_POST['gender'];
    $sql=  "INSERT INTO user(id, firstName, lastname, email, password, gender) values ('$id', '$firstname', '$lastname','$email', '$password', '$gender')";
    $result= $connection-> query($sql);
    if($result== true){
        header('Location:login.html');
    }
    else{
        echo "Error, " .$sql.  '<br>' . $connection->error ;
    }
    $connection->close();

 }
 ?>