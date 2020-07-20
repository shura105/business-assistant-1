<?php
//очищаем куки с пользователем
setcookie("user_id", "", 0);
//очищаем куки с пользователем
setcookie("user_id_b", "", 0);
//переходим на главную страцину
header("Location: /shop/");
?>

