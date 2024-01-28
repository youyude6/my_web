<?php
	$dbHost = "localhost";
	$dbDatabase = "web_mysql";
	$dbPasswrod = "329897";
	$dbUser = "youyu";
    $mysql = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
    if ($mysql->connect_error) {
		die("连接失败: " . $mysql->connect_error);
	} 
    $sql = "SELECT * FROM user";
    $result = mysqli_query($mysql, $sql);
    $inf_list=[];
    while ($row = mysqli_fetch_assoc($result)) {
        $inf_list[]=$row;
    }
    mysqli_close($mysql);
?>
<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
	<title>sql测试</title>
    <link rel="stylesheet" type="text/css" href="table.css">三
</head>
<body>
    <div>
        <form action="sql.php" method="post">
            ID: <input type="" name="id"><br>
            姓名：<input type="text" name="username"><br>
            密码：<input type="password" name="password"><br>
            年龄：<input type="" name="age"><br>
            <input type="submit">
        </form>
        <table width="500" border = "1" cellspacing = "0" id="table-1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>姓yyu名</th>
                    <th>密码</th>
                    <th>年龄</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inf_list as $value){?>
                <tr>
                    <th><?php echo $value['id']?></th>
                    <th><?php echo $value['name']?></th>
                    <th><?php echo $value['password']?></th>
                    <th><?php echo $value['age']?></th>
                    <th><a href="inf_edite.php?id= <?php echo $value['id']?>" >编辑</th>
                </tr>
                <?php } ?>
            </tbody>
            
        </table>
    </div>
</body>