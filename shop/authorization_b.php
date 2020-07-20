<?php
$page = "authorization_b";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
include 'parts/header.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//зашифровуем пароль
	$password = md5($_POST['password']);
	//делаем запрос в БД - выбираем пользователя
	$sql = "SELECT * FROM `users_b` WHERE  `login`='" . $_POST["login"] . "' AND `password`='" . $password . "'";
	//получаем результат
	$result = $conn->query($sql);
	//если пользователь существует
	if($result->num_rows > 0) {
		//выбираем пользователя
		$user = mysqli_fetch_assoc($result);
		//проверяем верифицирован ли он
		if($user['verifided'] == '1') {
			//создаем куки для хранения данных пользователя
			setcookie("user_id_b", $user["id"]);
			header("Location: /shop/account_b.php");
		} else {
			//если нет, то выводим ссылку на повторную верификацию
			?>
			<a class="btn btn-primary" href="verification_b.php?id=<?php echo $user['id']; ?>" role="button">Подтвердите свою почту!</a>	
			<?php
		}	
	} else {
		echo "Такого пользователя не существует!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Authorization</title>
</head>
<body>
	<form method="POST">
		<p>Логин</br>
			<input type="text" name="login">
		</p>
		<p>Пароль</br>
			<input type="password" name="password">
		</p>
		<button type="submit" class="btn btn-warning">Войти</button>
		<a href="register_b.php" class="btn btn-warning">Регистрация</a>
	</form>
</body>
</html>

<?php include 'parts/footer.php'; ?>