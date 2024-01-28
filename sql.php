<?php
$dbHost = "localhost";
$dbDatabase = "web_mysql";
$dbPasswrod = "329897";
$dbUser = "youyu";
$conn = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
$name=$_POST['username'];
$id=$_POST['id'];
$password=$_POST['password'];
$age=$_POST['age'];
$add="INSERT INTO user(id,name,password,age) VALUES ($id,'$name','$password','$age')";
$result= mysqli_query($conn, $add);
echo"<script>alert('提交成功');location.href='sql_main.php';</script>";
?>