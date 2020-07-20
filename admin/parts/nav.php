<ul class="nav">
  <li class="nav-item <?php if($page == "home"){echo'active';}?>">
    <a class="nav-link" href="/admin">
      <i class="material-icons">dashboard</i>
      <p>Home</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "users"){echo'active';}?>">
    <a class="nav-link" href="/admin/users.php">
      <i class="material-icons">person</i>
      <p>Users</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "products"){echo'active';}?>">
    <a class="nav-link" href="/admin/products.php">
      <i class="material-icons">content_paste</i>
      <p>Products</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "categories"){echo'active';}?>">
    <a class="nav-link" href="/admin/categories.php">
      <i class="material-icons">format_list_numbered_rtl</i>
      <p>Categories</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "orders"){echo'active';}?>">
    <a class="nav-link" href="/admin/orders.php">
      <i class="material-icons">moped</i>
      <p>Orders</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "users_b"){echo'active';}?>">
    <a class="nav-link" href="/admin/users_b.php">
      <i class="material-icons">person</i>
      <p>Users_b</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "products_maps"){echo'active';}?>">
    <a class="nav-link" href="/admin/products_map.php">
      <i class="material-icons">content_paste</i>
      <p>Products_maps</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "orders_maps"){echo'active';}?>">
    <a class="nav-link" href="/admin/orders_maps.php">
      <i class="material-icons">moped</i>
      <p>Orders_maps</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "serv_categories"){echo'active';}?>">
    <a class="nav-link" href="/admin/serv_categories.php">
      <i class="material-icons">format_list_numbered_rtl</i>
      <p>Service categories</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "serv_orders"){echo'active';}?>">
    <a class="nav-link" href="/admin/serv_orders.php">
      <i class="material-icons">moped</i>
      <p>Service orders</p>
    </a>
  </li>
  <li class="nav-item <?php if($page == "log out"){echo'active';}?>">
    <a class="nav-link" href="/admin">
      <i class="material-icons">open_in_new</i>
      <p>Log out</p>
    </a>
  </li>
</ul>