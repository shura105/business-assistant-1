<?php
$page = "authorization";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
include 'parts/header.php';

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	//зашифровуем пароль
	$password = md5($_POST['password']);
	//делаем запрос в БД - выбираем пользователя
	$sql = "SELECT * FROM users WHERE  `login`='" . $_POST["login"] . "' AND `password`='" . $password . "'";
	//получаем результат
	$result = $conn->query($sql);
	//если пользователь существует
	if($result->num_rows > 0) {
		//очищаем куки с избраным
		setcookie("favorites", "", 0);
		//выбираем пользователя
		$user = mysqli_fetch_assoc($result);
		//проверяем верифицирован ли он
		if($user['verifided'] == '1') {
			//создаем куки для хранения данных пользователя
			setcookie("user_id", $user["id"]);
			header("Location: /shop/");
		} else {
			//если нет, то выводим ссылку на повторную верификацию
			?>
			<a class="btn btn-primary" href="verification.php?id=<?php echo $user['id']; ?>" role="button">Подтвердите свою почту!</a>	
			<?php
		}	
	} else {
		echo "Такого пользователя не существует!";
		var_dump($password);
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
		<a href="register.php" class="btn btn-warning">Регистрация</a>
	</form>
</body>
</html>

<?php include 'parts/footer.php'; ?>