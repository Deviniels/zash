<?php
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $man = $_POST['man'];
  $woman = $_POST['woman'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phoneNumber'];
  $Address = $_POST['Address'];
  $indexate = $_POST['index'];

  //Database connection//
  
  $conn = new mysqli('localhost', 'root', '', 'regtest');
  if($conn->connect_error){
    die('Connection failed : '-$conn->connect_error);
  }else{
    $stmt = $conn->prepare("insert into registration(firstName, lastName, man, woman, email, phoneNumber, Address, indexate)
    values(?, ?, ?, ?, ?, ?, ?, ?,)");
    $stmt->bind_param("sssssisi", $firstName, $lastName, $man, $woman, $email, $phoneNumber, $Address, $indexate);
    $stmt->execute();
    echo "registation success";
    $stmt->close();
    $conn->close();
  }
?>