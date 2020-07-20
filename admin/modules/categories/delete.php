<?php
// подключаем базу данных
include $_SERVER["DOCUMENT_ROOT"] . "/admin/configs/db.php";
//если в таблице админки выбран 
if(isset($_GET["id"])) {
  //посылаем запрос в БД на удаление в БД
  $sqlDeleteCategory = "DELETE FROM categories WHERE id= '" . $_GET["id"] . "' ";
}
  //если запрос выполнен то...
  if( $conn->query($sqlDeleteCategory)) {
    //задаём адрес перехода после выполнения запроса
    header("Location: /admin/categories.php");
    //в ином случае показываем ошибку
  } else {
    echo "<h2>ERROR!</h2>";
  }
?>

