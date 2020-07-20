<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/configs/db.php";
$page = "categories";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categories</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">
          Categories
          <a href="modules/categories/add.php" class="btn btn-primary">ADD</a>
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Title</th>
              <th>Options</th>
            </thead>
            <tbody>
              <?php
               //создаём запрос к БД на вывод товаров из таблицы products
               $sql = "SELECT * FROM categories";
                //выполнить sql запрос в базе данных
                $result = $conn->query($sql);
                //ложим в перемеенную $row преобразованные в массив полученные из БД данные о товаре 
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <!-- Выводим в таблицу данные товара  -->
                  <td><?php echo $row["id"] ?></td>
                  <td><?php echo $row["title"] ?></td>
                  <td>
                    
                      <a href="modules/categories/edit.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">EDIT</a>
                      <a href="modules/categories/delete.php?id=<?php echo $row["id"] ?>"class="btn btn-primary">DELETE</a>
                    
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