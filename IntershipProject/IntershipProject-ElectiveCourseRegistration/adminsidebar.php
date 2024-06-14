<div class="grid-container">

<!-- Header -->
<header class="header">
  <div class="menu-icon" onclick="openSidebar()">
    <span class="material-icons-outlined">menu</span>
  </div>
  <div class="header-left">
    <span class="material-icons-outlined">search</span>
  </div>
  <div class="header-right">
    <span class="material-icons-outlined">notifications</span>
    <span class="material-icons-outlined">email</span>
    <span class="material-icons-outlined">account_circle</span>
  </div>
</header>
<!-- End Header -->

<!-- Sidebar -->
<aside id="sidebar">
  <div class="sidebar-title">
    <div class="sidebar-brand">
      
      <span class="material-icons-outlined">SDMIT</span>
    </div>
    <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
  </div>

  <ul class="sidebar-list">
    <li class="sidebar-list-item">
      <a href="adminhome.php" >
        <span class="material-icons-outlined">dashboard</span> Dashboard
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="add_teacher.php" >
        <span class="material-icons-outlined">inventory_2</span> Add Teacher
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="view_teacher.php" >
        <span class="material-icons-outlined">fact_check</span> View Teacher
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="add_course.php" >
        <span class="material-icons-outlined">add_shopping_cart</span> Add Courses
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="view_course.php" >
        <span class="material-icons-outlined">shopping_cart</span> View Courses
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="registeredstudent.php" >
        <span class="material-icons-outlined">shopping_cart</span> Registered Students
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="addstudent.php" >
        <span class="material-icons-outlined">add_shopping_cart</span> Add Students
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="viewstudent.php" >
        <span class="material-icons-outlined">add_shopping_cart</span> View Students
      </a>
    </li>
    <!-- <li class="sidebar-list-item">
      <a href="#" >
        <span class="material-icons-outlined">poll</span> Reports
      </a>
    </li> -->
    <li class="sidebar-list-item">
      <a href="logout.php">
        <span class="material-icons-outlined">logout</span> Logout
      </a>
    </li>
  </ul>
</aside>
<!-- End Sidebar -->