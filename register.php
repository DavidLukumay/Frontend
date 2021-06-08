<?php
    
 if($_SERVER["REQUEST_METHOD"] == "POST"){
   
  $username = test_input($_POST["username"]);
  $email = test_input($_POST["email"]);
  $programme = test_input($_POST["programme"]);
  $password = test_input($_POST["password"]);

  $hash = "$2a$10$";
  $string = "iamacomputersciencestudent";
  $hashString = $hash . $string;
  $password = crypt($password , $hashString);

  $connection = mysqli_connect("localhost" , "root" , "" , "unihub");
  if(!$connection){
      echo "Failed to connect to the Db" . mysqli_error($connection);
  } 

  $query = "INSERT INTO users (username, email, programme ,password)  VALUES ('$username' , '$email' , '$programme' , '$password')"; 

  $insertingData = mysqli_query($connection , $query);

  if(!$insertingData){
      echo "Inserting data to the Db failed";
  } else{
      echo "Yaaay";
  }
  
 }

 function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;

 }