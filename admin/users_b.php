<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/configs/db.php";
$page = "users_b";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users_b</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">
          Users_b 
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Options</th>
            </thead>
            <tbody>
                <?php
               //создаём запрос к БД на вывод товаров из таблицы заказов
               $sql = "SELECT * FROM users_b";
                //выполнить sql запрос в базе данных
                $result = $conn->query($sql);
                //ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["phone"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td>
                      <a href="modules/users_b/delete.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Delete</a> 
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