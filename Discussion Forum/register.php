<?php
include('db.php');
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];  
    $profession=$_POST['profession'];
    $password=$_POST['password'];
    

    $query="INSERT INTO `user_data`(`username`, `First Name`, `Last Name`, `email ID`,`Profession`, `password`) VALUES ('$username','$firstname','$lastname','$email','$profession','$password')";
    $run=mysqli_query($con,$query);

    if($run){
        header("Location: login.html");
    }
    else{
        
        echo mysqli_error($con);
    }

}
?>