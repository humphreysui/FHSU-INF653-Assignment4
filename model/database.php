<?php 

  $dsn = 'mysql:host=localhost;dbname=todolist2';
  $username = 'root';
  $password = 'sesame';
  try{
    $db = new PDO ($dsn, $username, $password);
  }catch (PDOException $e){
    $errorMessage = $e->getMessage();
    include('database_error.php');
    exit();
  }