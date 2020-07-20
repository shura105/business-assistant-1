<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/configs/db.php";
$page = "serv_categories";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Service categories</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">
          Service categories
          <a href="modules/serv_categories/add.php" class="btn btn-primary">ADD</a>
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
               //создаём запрос к БД 
               $sql = "SELECT * FROM serv_category";
                //выполнить sql запрос в базе данных
                $result = $conn->query($sql);
                //ложим в перемеенную $row преобразованные в массив полученные из БД данные  
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <!-- Выводим в таблицу данные  -->
                  <td><?php echo $row["serv_cat_id"] ?></td>
                  <td><?php echo $row["serv_cat_name"] ?></td>
                  <td>
                    
                      <a href="modules/serv_categories/edit.php?id=<?php echo $row["serv_cat_id"] ?>" class="btn btn-primary">EDIT</a>
                      <a href="modules/serv_categories/delete.php?id=<?php echo $row["serv_cat_id"] ?>"class="btn btn-primary">DELETE</a>
                    
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