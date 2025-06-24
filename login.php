<?php
include 'connection.php';

if(isset($_POST['login'])){
    $name= $_POST['fname'];
    $password= $_POST['password'];
    echo "Data received";
    $password1= md5($password);
    
    $sql= "SELECT * FROM user WHERE firstname='$name'  and password='$password1'";
    $result= $connection-> query($sql);
    if($result==false)
    {
        echo "There is occuring an error .$connection->error";

    }
elseif($result->num_rows > 0){
header("Location:home.html");

}
    else{
        echo '<script> alert("Invalid username or password"); </script>';
        echo "Why is nothing coming";
    }
}