<html>
 <head>
	<title>mission_4</title>
	<meta charset="utf-8">
 </head>
<body>
 <form method = "POST" action = "mission_4-2.php">
	<input type = "text" name = "namae" placeholder = "名前">
 <br>
 	<input type = "text" name = "comment" placeholder = "コメント">
 <br>
	<input type = "text" name = "password" placeholder = "パスワード">
	<input type = "submit" name = "btn" value = "送信">
 </form>
 <br>
 <form method = "POST" action = "mission_4-3.php">
	<input type = "text" name = "delete" placeholder = "削除対象番号">
 <br>
	<input type = "text" name = "password_delete" placeholder = "パスワード">
	<input type = "submit" name = "btn" value = "削除">
 </form>
 <br>
 <form method = "POST" action = "mission_4-4.php">
	<input type = "text" name = "edit" placeholder = "編集対象番号">
 <br>
	<input type = "text" name = "password_edit" placeholder = "パスワード">
	<input type = "submit" name = "btn" value = "編集">
 </form>
<?php
 if(!empty($_POST["namae"]) && !empty($_POST["comment"]) && !empty($_POST["password"])){
 $dsn='データベース名';
 $user = 'ユーザー名';
 $password = 'パスワード';
 $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
 $sql="CREATE TABLE IF NOT EXISTS comment1"
 ."("
 ."id INT,"
 ."name char(32),"
 ."comment TEXT,"
 ."password TEXT"
 .");";
 $stmt=$pdo->query($sql);
 $sql='SELECT*FROM comment1';
 $stmt=$pdo->query($sql);
 $stmt->execute();
 $count=$stmt->rowCount();
 $sql=$pdo->prepare("INSERT INTO comment1 (id,name,comment,password) VALUES (:id,:name,:comment,:password)");
 $sql -> bindParam(':id',$id,PDO::PARAM_INT);
 $sql -> bindParam(':name',$name,PDO::PARAM_STR);
 $sql -> bindParam(':comment',$comment,PDO::PARAM_STR);
 $sql -> bindParam(':password',$password_de,PDO::PARAM_STR);
 $id=$count+1;
 $name=$_POST["namae"];
 $comment=$_POST["comment"];
 $password_de=$_POST["password"];
 $sql -> execute();
 $sql='SELECT*FROM comment1';
 $stmt=$pdo->query($sql);
 $results=$stmt->fetchAll();
 foreach($results as $row){
	echo $row['id'].',';
	echo $row['name'].',';
	echo $row['comment'].'<br>';
 }
 }
?>
</body>
</html>