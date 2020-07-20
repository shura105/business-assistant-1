<?php //вносим отзывы в БД 
// подключаем базу данных
include $_SERVER['DOCUMENT_ROOT'] . '/services/configs/db.php';

if(isset($_POST['servRviewText'])){

	// подготовим запрос в БД на внесение новой записи в таблицу отзывов
	$sql = "INSERT INTO `review` (`id`, `modificator`, `unit_id`, `user_id`, `date_time`, `reviewText`) VALUES (NULL, '1', '3', '" . $_POST['unit_id'] . "', '" . date("Y-m-d H:i:s") . "', '" . $_POST['servRviewText'] . "')";

	echo $sql;


		if( !($result = $conn->query($sql) ) ){
			echo "Error (servReviewDB_1)";
		}else{
			//переходим на страницу с сообщениями 
			header('Location: http://business-assistant.local/services/allServices.php');
		}

}
?>