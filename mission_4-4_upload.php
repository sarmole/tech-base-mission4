<html>
 <head>
	<title>mission_4</title>
	<meta charset="utf-8">
 </head>
<body>
<?php
 if(!empty($_POST["edit"])){
 $dsn='データベース名';
 $user = 'ユーザー名';
 $password = 'パスワード';
 $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
 $id=$_POST["edit"];
 $sql='SELECT*FROM comment1 where id=:id';
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id,PDO::PARAM_INT);
 $stmt->execute();
 $result=$stmt->fetch();
 $select_password=$result['password'];
 if($_POST["password_edit"]===$select_password){
	$name=$result['name'];
	$comment=$result['comment'];
	$password_edit=$result['password'];
 }else{
 	echo "パスワードが違います".'<br>';
	$name="名前";
	$comment="コメント";
	$password_edit="パスワード";
 }
 }
?>
 <form method = "POST" action = "mission_4-5.php">
	<input type = "text" name = "namae" placeholder = "<?=$name?>">
 <br>
 	<input type = "text" name = "comment" placeholder = "<?=$comment?>">
 <br>
	<input type = "text" name = "password" placeholder = "<?=$password_edit?>">
	<input type = "hidden" name = "edit_number" value = "<?=$_POST['edit']?>">
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
 $sql='SELECT*FROM comment1';
 $stmt=$pdo->query($sql);
 $results=$stmt->fetchAll();
 foreach($results as $row){
	echo $row['id'].',';
	echo $row['name'].',';
	echo $row['comment'].'<br>';
 }
?>
</body>
</html>