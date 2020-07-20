<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/configs/db.php";
$page = "orders_maps";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Orders_maps</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">
          Orders_maps 
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>User</th>
              <th>Title</th>
              <th>Data</th>
              <th>Data_start</th>
              <th>Email</th>
              <th>Address</th>
              <th>Status</th>
              <th>Data_stop</th>
              <th>Options</th>
            </thead>
            <tbody>
                <?php
               //создаём запрос к БД на вывод товаров из таблицы заказов
               $sql = "SELECT * FROM orders_maps";
                //выполнить sql запрос в базе данных
                $result = $conn->query($sql);
                //ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["user_b_id"] ?></td>

                    <td><?php 
                              //делаем запрос в БД - получаем заказы авторизованого пользователя
                              $sql1 = "SELECT * FROM products_maps WHERE `id`=" . $row['product_id'];
                              //получаем результат
                            $result1 = $conn->query($sql1);
                            $product = mysqli_fetch_assoc($result1);
                            echo $product['title'];
                            ?></td>
                    <td><?php echo $row["data"] ?></td>
                    <td><?php echo $row["data_start"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php echo $row["adress"] ?></td>
                    <td><?php echo $row["status"] ?></td>
                    <td><?php echo $row["data_stop"] ?></td>
                    <td>
                      <a href="modules/orders_maps/edit.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">EDIT</a> 
                  </td>
                </tr>
              <?php     
              } 
              ?>    
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>  
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>      