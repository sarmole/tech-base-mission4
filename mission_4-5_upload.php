<html>
 <head>
	<title>mission_4</title>
	<meta charset="utf-8">
 </head>
<body>
 <form method = "POST" action="mission_4-2.php">
	<input type="text" name="namae" placeholder="名前">
 <br>
	<input type="text" name="comment" placeholder="コメント">
 <br>
	<input type="text" name="password" placeholder="パスワード">
	<input type="submit" name="btn" value="送信">
 </form>
 <br>
 <form method = "POST" action="mission_4-3.php">
	<input type = "text" name="delete" placeholder="削除対象番号">
 <br>
	<input type="text" name="password_delete" placeholder="パスワード">
	<input type="submit" name="btn" value="削除">
 </form>
 <br>
 <form method ="POST" action="mission_4-4.php">
	<input type="text" name="edit" placeholder="編集対象番号">
 <br>
	<input type="text" name="password_edit" placeholder="パスワード">
	<input type="submit" name="btn" value="編集">
 </form>
 <?php
  if(!empty($_POST["edit_number"])){
	$dsn='データベース名';
 	$user = 'ユーザー名';
 	$password = 'パスワード';
 	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	$id=$_POST["edit_number"];
	$name=$_POST["namae"];
	$comment=$_POST["comment"];
	$password_de=$_POST["password"];
	$sql='update comment1 set name=:name,comment=:comment,password=:password where id=:id';
	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(':name',$name,PDO::PARAM_STR);
	$stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
	$stmt->bindParam(':password',$password_de,PDO::PARAM_STR);
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
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