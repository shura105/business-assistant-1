<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/configs/db.php";
$page = "serv_orders";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Service orders</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">
          Service orders 
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>User</th>
              <th>Category</th>
              <th>Title</th>
              <th>Description</th>
              <th>Content</th>
              <th>Data</th>
              <th>Data_start</th>
              <th>Phone</th>
              <th>Town</th>
              <th>Street</th>
              <th>House</th>
              <th>Flat</th>
              <th>Status</th>
              <th>Image</th>
              <th>Data_stop</th>
              <th>Options</th>
            </thead>
            <tbody>
                <?php
               //создаём запрос к БД на вывод товаров из таблицы заказов
               $sql = "SELECT * FROM serv_orders";
                //выполнить sql запрос в базе данных
                $result = $conn->query($sql);
                //ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["user_b_id"] ?></td>
                    <td><?php echo $row["cat_id"] ?></td>
                    <td><?php echo $row["title"] ?></td>
                    <td><?php echo $row["description"] ?></td>
                    <td><?php echo $row["content"] ?></td>
                    <td><?php echo $row["data"] ?></td>
                    <td><?php echo $row["data_start"] ?></td>
                    <td><?php echo $row["phone"] ?></td>
                    <td><?php echo $row["addr_town"] ?></td>
                    <td><?php echo $row["addr_street"] ?></td>
                    <td><?php echo $row["addr_house"] ?></td>
                    <td><?php echo $row["addr_flat"] ?></td>
                    <td><?php echo $row["status"] ?></td>
                    <td><?php echo $row["image"] ?></td>
                    <td><?php echo $row["data_stop"] ?></td>
                    <td>
                      <a href="modules/serv_orders/edit.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">EDIT</a> 
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