<?php
    $dbHost = "localhost";
    $dbDatabase = "web_mysql";
    $dbPasswrod = "329897";
    $dbUser = "youyu";
    
    $mysql = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
    if ($mysql->connect_error) {
		die("连接失败: " . $mysql->connect_error);
	}
    //$updateSql = "UPDATE user SET name='张四' WHERE id=$id";
    //$result_update = mysqli_query($conn, $updateSql);
    //var_dump($result_update);
    if($_SERVER['REQUEST_METHOD']=='GET'){
    $id=$_GET['id'];
    $sql_select_id="SELECT * FROM user WHERE id=$id";
    $res = $mysql->query($sql_select_id);
    $row = mysqli_fetch_assoc($res);
    }
    else if($_SERVER['REQUEST_METHOD']== "POST"){
    $id=$_POST["id"];
    $name=$_POST['username'];
    $password=$_POST['password'];
    $age=$_POST['age'];
    $sql_update="UPDATE user SET name='$name',password='$password',age=$age WHERE id=$id";
    $res = $mysql->query($sql_update);
    if($res){
        echo "<script>alert('更新成功');location.href='sql_main.php';</script>";
    }else{
        echo "<script>alert('更新失败');</script>";
    }}
    mysqli_close($mysql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="inf_edite.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        姓名：<input type="text" name="username" value="<?php echo $row['name'] ?>">
        密码：<input type="text" name="password" value="<?php echo $row['password'] ?>">
        年龄：<input type="" name="age" value="<?php echo $row['age'] ?>">
        <input type="submit" value="更新">
    </form>
</body>